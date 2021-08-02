@extends('layouts.main')

@section('container')   

   <section class="our-checkout-area ptb--120 bg__white">
  <div class="container">

        <br>
        <div class="card">
            <div class="card-body">
                <form action="{{url('/cek_ongkir')}}" method="get">
                    {{csrf_field()}}
                    <div class="row">
                        <div class="col-sm-6">
                            <h6>Nama Anda</h6>
                            <div class="form-group">
                            	@if($name == true)
                            	<input value="{{$name}}" name="name" type="text" class="form-control" required>
                            	@else
                                <input value="{{Auth::user()->name}}" name="name" type="text" class="form-control" required>
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-6">
                        	<h6>Alamat Anda</h6>
                        	<div class="form-group">
                        		@if($alamat == true)
                        		<input value="{{$alamat}}" type="text" name="alamat" class="form-control" required>
                        		@else
                        		<input value="{{$alamat_sekarang->alamat}}" type="text" name="alamat" class="form-control" required>
                        		@endif
                        	</div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <h6>Kirim Ke</h6>
                            <div class="form-group">
                                <select name="province_destination" id="province" class="form-control">
                                    <option value="" holder>Pilih Provinsi</option>
                                    @foreach($provinces as $province)
                                    <option value="{{$province->id}}">{{$province->province}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6" style="top: 16px">
                            <div class="form-group">
                                <select name="destination" id="destination" class="form-control" required>
                                    <option value="" holder>Pilih Kota</option>
                                </select>
                            </div>
                        </div>
                        
                    </div>
                    <?php $totalberat = 0; ?>
                    @foreach($cart as $val)
                    <?php 
                    
                    $berat = $val['berat']; 
                    $totalberat += $berat;

                    ?>
                    @endforeach
                    <div class="row">
                        <div class="col-sm-12">
                            <h6>Kurir</h6>
                            <div class="form-group">
                                @foreach($cart as $val)
                                <input name="weight" type="text" class="form-control" value="{{$val['berat']}}">
                                @endforeach
                            <select name="courier" required class="form-control">
                                <option value="" holder>Pilih Kurir</option>
                                <option value="jne">JNE</option>
                                <option value="tiki">TIKI</option>
                                <option value="pos">POS</option>
                                <option value="idl">Cargo</option>
                            </select>
                                
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <button type="submit" class="btn btn-info btn-block">Cek Ongkir</button>
                        </div>
                    </div>
                    </form>
                    @if($result_cost)
                    <br>
                    <div class="row">
                        <div class="col-sm-6">
                            <table>
                                <tr>
                                    <td width="30%">Nama</td>
                                    <td>: {{$name}}</td>
                                </tr>
                                <tr>
                                    <td width="30%">Alamat</td>
                                    <td>: {{$alamat}}</td>
                                </tr>
                                <tr>
                                    <td width="30%">berat</td>
                                    <td>: {{$data_weight}} gram</td>
                                </tr>
                                <tr>
                                    <td>Kirim Dari</td>
                                    <td>: {{$origin_name->type}} {{$origin_name->city_name}}</td>
                                </tr>
                                <tr>
                                    <td>Kirim Ke</td>
                                    <td>: {{$province_name->province}}, {{$origin_name->type}} {{$destination_name->city_name}}</td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-sm-6">
                            <table>
                                <!-- <tr>
                                    <td width="30%">Berat</td>
                                    <td>: {{$data_weight}} Gram</td>
                                </tr> -->
                                <tr>
                                    <td>Kurir</td>
                                    <td>: {{ ucwords($data_courier) }}</td>
                                </tr>                                     
                            </table>
                        </div>
                    </div>
                    <br>
                    
                    
                    <div class="row">
                        <div class="col-sm-12">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                    	<th>No</th>
                                        <th>Nama Service</th>
                                        <th>Deskripsi</th>
                                        <th>Harga</th>
                                        <th>Estimasi Pengiriman</th>
                                        <th>Note</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($result_cost as $result)
                                    <form method="post" action="{{url('/pilihpaket')}}">
                    				{{csrf_field()}}
                                    <tr>
                                    	<input type="hidden" name="kurir" value="{{ ucwords($data_courier) }}">
                                    	<input type="hidden" name="dari" value=" {{$origin_name->type}} {{$origin_name->city_name}}">
                                    	<input type="hidden" name="ke" value="{{$province_name->province}}, {{$origin_name->type}} {{$destination_name->city_name}}">
                                    	<input type="hidden" name="nama" value="{{$name}}">
                                    	<input type="hidden" name="alamat_tujuan" value="{{$alamat}}">
                                    	<input type="hidden" name="berat" value="{{$data_weight}} Gram">
                                    	<input type="hidden" name="no" value="{{$loop->iteration}}">
                                    	<input type="hidden" name="service" value="{{$result['service']}}">
                                    	<input type="hidden" name="description" value="{{$result['description']}}">
                                    	<input type="hidden" name="harga" value="{{$result['cost'][0]['value']}}">
                                    	<input type="hidden" name="estimasi" value="{{$result['cost'][0]['etd']}}">
                                    	<input type="hidden" name="note" value="{{$result['cost'][0]['note']}}">
                                    	
                                    	<th scope="row">{{$loop->iteration}}</th>
                                        <td>{{$result['service']}}</td>
                                        <td>{{$result['description']}}</td>
                                        <td>{{$result['cost'][0]['value']}}</td>
                                        <td>{{$result['cost'][0]['etd']}} hari</td>
                                        <td>{{$result['cost'][0]['note']}}</td>
                                        <td><button>Pilih</button></td>
                                    </tr>
                                    </form>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    
                    @else

                    @endif

            </div>
        </div>

    </div>
</section>
    <script src="https://code.jquery.com/jquery-3.4.1.js"
        integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>

    <script type="text/javascript">
        $(document).ready(function () {
            $('select[name="province_destination"]').on('change', function () {
                var cityId = $(this).val();
                if (cityId) {
                    $.ajax({
                        url: 'getCity/ajax/' + cityId,
                        type: "GET",
                        dataType: "json",
                        success: function (data) {
                            $('select[name="destination"]').empty();
                            $.each(data, function (key, value) {
                                $('select[name="destination"]').append(
                                    '<option value="' +
                                    key + '">' + value + '</option>');
                            });
                        }
                    });
                } else {
                    $('select[name="destination"]').empty();
                }
            });
        });
    </script> <br> <br> <br>
@endsection

@section('footer')
        

@endsection
</body>

</html>
