@extends('layouts.main')

@section('container')
        <!-- End Header Style -->

       
        <!-- End Offset Wrapper -->
        <!-- Start Bradcaump area -->
        <div class="ht__bradcaump__area" style="background: rgba(0, 0, 0, 0) url(images/bg/2.jpg) no-repeat scroll center center / cover ;">
            <div class="ht__bradcaump__wrap">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="bradcaump__inner text-center">
                                <h2 class="bradcaump-title">Checkout</h2>
                                <nav class="bradcaump-inner">
                                  <a class="breadcrumb-item" href="index.html">Home</a>
                                  <span class="brd-separetor">/</span>
                                  <span class="breadcrumb-item active">Cart</span>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Bradcaump area -->


         <!-- Start Checkout Area -->
        <section class="our-checkout-area ptb--120 bg__white">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-lg-8">
                        <div class="ckeckout-left-sidebar">
                            <!-- Start Checkbox Area -->
                            <div class="checkout-form">
                                <h2 class="section-title-3">Checkout</h2>
                                <br>
                                @if(empty($cart) || count($cart) == 0)
                                <h1>tidak ada produk</h1>
                                @else
                               <form id="payment-form" action="postfinish" method="post">
                                <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                              <input type="hidden" name="result_type" id="result-type" value="">
                              <input type="hidden" name="result_data" id="result-data" value="">
                                   
                                   <p>Waktu pemesanan : <?php echo date("Y-m-d H:i:s"); ;?></p>
                                   <br>
                                   <p style="font-weight: bold ">Rincian Pemesan</p>
                                   <br>
                                   @if($paket == true)
                                   <p>Nama : {{$paket['nama']}}</p>
                                   <p>Alamat : {{$paket['alamat_tujuan']}}</p>
                                   @else
                                   <p>Nama : {{Auth::user()->name}}</p>
                                   <p>Alamat : {{$alamat->alamat}}</p>
                                   @endif
                                   <p>Email : {{Auth::user()->email}}</p>

                                   <br>
                                   <p style="font-weight: bold ">Rincian Pemesanan</p>
                                   <?php
                                        $grandtotal = 0;
                                        $grandtotal2 = 0;
                                        $totalberat = 0;
                                    ?>
                                   @foreach($cart as $val)

                                   <?php 
                                       
                                        $total = $val['harga'] * $val['jumlah'];
                                        // dd($val['berat']);
                                        $berat = $val['berat'];
                                        // dd($berat);
                                        
                                    ?>
                                   <div>
                                    <br>
                                   <p>Nama Produk : {{$val['title']}}</p>
                                   <p>Jumlah pesanan : {{$val['jumlah']}} barang ({{$val['berat']}} gram)</p>
                                   <p>Keterangan : {{$val['keterangan']}}</p>
                                   
                                   
                                   <p>Harga : {{$total}}</p>
                                   <input hidden="" type="text" name="harga" value="{{$total}}">
                                   </div>

                                   
                                   <?php
                                        $totalberat += $berat;
                                        // dd($totalberat);
                                        $grandtotal += $total ;
                                        if ($paket == true) {
                                          $grandtotal2 = $grandtotal +  $paket['harga'];
                                        }
                                        
                                        // dd($grandtotal);
                                    ?>
                                   
                                   @endforeach
                                   <br>
                                   <div>
                                    <p style="font-weight: bold ">Rincian Pengiriman</p>
                                   <br>
                                   @if(empty($paket) || count($paket) == 0)
                                   <a class="btn btn-primary" href="{{url('/cek_ongkir')}}"> Pilih Pengiriman</a>
                                   <br>
                                   <p>silahkan pilih pengiriman terlebih dahulu</p>
                                   <div></div>
                                   @else
                                    <a class="btn btn-primary" href="{{url('/cek_ongkir')}}"> Pilih Pengiriman</a>
                                   <br> <br>
                                   <p>Kirim dari : {{$paket['dari']}}</p>
                                   <p>Kirim ke : {{$paket['ke']}}</p>
                                   <p>Kurir pengiriman : {{$paket['kurir']}}</p>
                                   <p>Service code : {{$paket['service']}}</p>
                                   <p>Estimasi Pengiriman : {{$paket['estimasi']}} Hari</p>
                                   <p>Biaya pengiriman : {{$paket['harga']}}</p>
                                   </div>
                                   
        
                                   <input hidden="" type="text" name="nama" value="{{$paket['nama']}}">
                                   <input hidden="" type="text" name="alamat" value="{{$paket['alamat_tujuan']}}">
                                   <input hidden="" type="text" name="total" value="{{$grandtotal2}}">
                                   <input hidden="" type="email" name="email" value="{{Auth::user()->email}}">
                                   <input type="hidden" name="tltbelanja" value="{{$grandtotal}}">
                                   <input type="hidden" name="tltongkir" value="{{$paket['harga']}}">
                                   <input type="hidden" name="tlttagihan" value="{{$grandtotal2}}">
                            </form>

                          

                            <!-- End Checkbox Area -->
                        </div>
                    </div>
                  </div>


                    <div class="col-md-4 col-lg-4">
                        <div class="checkout-right-sidebar">
                            <div class="our-important-note">
                                <h2 class="section-title-3">Note :</h2>
                                <p style="font-weight: bold ">Ringkasan Belanja</p>
                                <ul class="important-note">
                                    <li><i class="zmdi zmdi-caret-right-circle"></i>Total Belanja : Rp.{{$grandtotal}}</li>
                                    <li><i class="zmdi zmdi-caret-right-circle"></i>Total Ongkos Kirim : Rp {{$paket['harga']}}</li>
                                </ul>
                                <p style="font-weight: bold ">Total Tagihan : Rp {{$grandtotal2}}</p>

                            </div>
                            <button id="pay-button" style="background-color: #303030; color: white; width: 200px; height: 40px">Checkout</button>
                            <div class="puick-contact-area mt--60">
                                <h2 class="section-title-3">Quick Contact</h2>
                                <a href="#">+621355821891 </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        @endif
        @endif
        <!-- production -->
        <script type="text/javascript"
                src="https://app.midtrans.com/snap/snap.js"
                data-client-key="Mid-client-RD0k40wvUAFMvCtJ"></script>
        <!-- sandbox -->
       <!--  <script type="text/javascript"
                src="https://app.sandbox.midtrans.com/snap/snap.js"
                data-client-key="SB-Mid-client-Fnnmy5ULzslQBJi-"></script> -->
        <script type="text/javascript">
            function myFunction(){
                var result = confirm('Pastikan anda ingin melanjutkan pembayaran');
                if (result) {
                    document.getElementById('payment-form').submit();
                }
                else{
                    return false;
                }
            }
        </script>
        <script type="text/javascript">
  
        $('#pay-button').click(function (event) {
          event.preventDefault();
          $(this).attr("disabled", "disabled");
        
        $.ajax({
          
          url: './token',
          cache: false,

          success: function(data) {
            //location = data;

            console.log('token = '+data);
            
            var resultType = document.getElementById('result-type');
            var resultData = document.getElementById('result-data');

            function changeResult(type,data){
              $("#result-type").val(type);
              $("#result-data").val(JSON.stringify(data));
              //resultType.innerHTML = type;
              //resultData.innerHTML = JSON.stringify(data);
            }

            snap.pay(data, {
              
              onSuccess: function(result){
                changeResult('success', result);
                console.log(result.status_message);
                console.log(result);
                $("#payment-form").submit();
              },
              onPending: function(result){
                changeResult('pending', result);
                console.log(result.status_message);
                $("#payment-form").submit();
              },
              onError: function(result){
                changeResult('error', result);
                console.log(result.status_message);
                $("#payment-form").submit();
              }
            });
          }
        });
      });

      </script>
        <!-- End Checkout Area -->
@endsection
