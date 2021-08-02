@extends('layouts.main')

@section('container')

 <!-- Start Checkout Area -->
        <section class="our-checkout-area ptb--120 bg__white">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-lg-8">
                        <div class="ckeckout-left-sidebar">
                            <!-- Start Checkbox Area -->
                            <div class="checkout-form">
                                <h2 class="section-title-3">Profile</h2>
                                <div class="checkout-form-inner">
                                <form id="input" method="post" action="{{url('/updateprofile')}}">
                                    {{csrf_field()}}
                                    <div class="single-checkout-box">
                                         @foreach($data as $dt)
                                        <input type="text" name="nama" value="{{$dt->nama}}">
                                        <input type="text" name="email" value="{{$dt->email}}">
                                         @endforeach
                                    </div>
                                    <div class="single-checkout-box">
                                         @foreach($data as $dt)
                                        <input type="text" name="alamat" value="{{$dt->alamat}}">
                                        <input type="text" name="no_hp" value="{{$dt->no_hp}}">
                                         @endforeach
                                    </div>
                                    <div class="single-checkout-box select-option mt--40">
                                         @foreach($data as $dt)
                                        <select name="jenis_kelamin">
                                            <option value="{{$dt->jenis_kelamin}}" disabled="">{{$dt->jenis_kelamin}}</option>
                                            <option>Pria</option>
                                            <option>Wanita</option>
                                        </select>
                                        <input type="text" name="password" value="{{$dt->password}}">
                                         @endforeach
                                    </div>
                                    
                                </form>
                                </div>
                            <!-- End Checkbox Area -->
                            <!-- Start Payment Way -->
                            
                            <!-- End Payment Way -->
                        </div>
                    </div>
                   <div class="buttons-cart">
                    <div class="col-md-4 col-lg-4">
                        <!-- <div class="checkout-right-sidebar"> -->
                            
                                <input type="submit" name="submit"onclick=success() id="btnn" form="input" style="width: 200px; height: 40px" value="submit">
                            
                            <!-- </div> -->
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Checkout Area -->
        <script type="text/javascript">
            function success() {
                alert("success!");
              }
        </script>

@endsection

@section('footer')
        

@endsection
</body>

</html>