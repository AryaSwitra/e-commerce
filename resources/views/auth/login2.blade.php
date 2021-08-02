@if(Auth::check())
 <script type="text/javascript">
    window.alert("you are already logged");
    window.location.href = "/";
</script>

@else

@extends('layouts/main')

@section('container')
<body>

       
        <!-- Start Login Register Area -->
        <div class="htc__login__register bg__white ptb--130" style="background: rgba(0, 0, 0, 0) url(images/bg/5.jpg) no-repeat scroll center center / cover ;">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <ul class="login__register__menu" role="tablist">
                            <li role="presentation" class="login active"><a href="#login" role="tab" data-toggle="tab">Login</a></li>
                            <li role="presentation" class="register"><a href="#register" role="tab" data-toggle="tab">Register</a></li>
                        </ul>
                    </div>
                </div>
                <!-- Start Login Register Content -->
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <div class="htc__login__register__wrap">
                            <!-- Start Single Content -->
                            <div id="login" role="tabpanel" class="single__tabs__panel tab-pane fade in active">
                                 <form id="masuk" class="login" method="POST" action="{{ route('login') }}">
                                        @csrf

                                               <!--  <input id="name" type="text" class=" @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="nama">

                                                @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror -->

                                                 <input id="email" type="email" class=" @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="email">

                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror

                                                <input id="password" type="password" class=" @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="password">

                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            
                                                
                                    </form>

                                        <div class="form-group row mb-0">
                                            
                                                <div class="htc__login__btn">
                                                <button form="masuk" type="submit" class="buttonn buttonn1" name="login">
                                                    {{ __('Login') }}
                                                </button>
                                                </div>
                                        </div>
                            </div>
                            <!-- End Single Content -->

                            <!-- Start Single Content -->
                            <div id="register" role="tabpanel" class="single__tabs__panel tab-pane fade">
                                <form id="registrasi" class="login" action="/postregister" method="post">
                                    {{csrf_field()}}
                                    <input type="text" name="nama" placeholder="Name*">
                                    <input type="email" name="email" placeholder="Email*">
                                    <input type="text" name="alamat" placeholder="Alamat*">
                                    <input type="text" name="no_hp" placeholder="Nomor Handphone*">
                                    <input type="password" name="password" placeholder="Password*">
                                    <br>
                                        <div class="row" style="margin-bottom: -50px;">
                                            <div class="col-md-6 col-md-offset-3">
                                                <ul style="display: flex; margin: 0 auto 51px; max-width: 370px; padding-left: 4%;" role="tablist">
                                                    <li role="presentation">pria</li>
                                                    <input required="" style="border: 0px;width: 20%;height: 1em;" type="radio" name="jenis_kelamin" value="pria">

                                                    <li role="presentation">wanita</li>
                                                     <input required="" style="border: 0px;width: 20%;height: 1em; margin-top: 5px;" type="radio" name="jenis_kelamin" value="wanita">
                                                </ul>
                                            </div>
                                        </div> <br>
                                    
                                </form>
                                <div class="htc__login__btn">
                                    <button form="registrasi" type="submit" class="buttonn buttonn1" style="">register</button>
                                    
                                </div>
                            </div>
                            <!-- End Single Content -->
                        </div>
                    </div>
                </div>
                <!-- End Login Register Content -->
            </div>
        </div>
        <!-- End Login Register Area -->

@endsection

@section('footer')

@endsection

</body>

</html>


@endif