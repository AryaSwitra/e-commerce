<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Tmart-Minimalist eCommerce HTML5 Template</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- Place favicon.ico in the root directory -->
    <link rel="shortcut icon" type="image/x-icon" href="{{url('images/favicon.ico')}}">
    <link rel="apple-touch-icon" href="{{url('apple-touch-icon.png')}}">
    

    <!-- All css files are included here. -->
    <!-- Bootstrap fremwork main css -->
    <link rel="stylesheet" href="{{url('../css/bootstrap.min.css')}}">
    <!-- Owl Carousel main css -->
    <link rel="stylesheet" href="{{url('../css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{url('../css/owl.theme.default.min.css')}}">
    <!-- This core.css file contents all plugings css file. -->
    <link rel="stylesheet" href="{{url('../css/core.css')}}">
    <!-- Theme shortcodes/elements style -->
    <link rel="stylesheet" href="{{url('../css/shortcode/shortcodes.css')}}">
    <!-- Theme main style -->
    <link rel="stylesheet" href="{{url('../css/style.css')}}">
    <!-- Responsive css -->
    <link rel="stylesheet" href="{{url('../css/responsive.css')}}">
    <!-- User style -->
    <link rel="stylesheet" href="{{url('../css/custom.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('../css/select.css')}}">

    <!-- production -->
    <!-- <script type="text/javascript"
            src="https://app.midtrans.com/snap/snap.js"
            data-client-key="Mid-client-RD0k40wvUAFMvCtJ"></script> -->
    <!-- sandbox -->
    <!-- <script type="text/javascript"
            src="https://app.sandbox.midtrans.com/snap/snap.js"
            data-client-key="SB-Mid-client-Fnnmy5ULzslQBJi-"></script> -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <!-- Modernizr JS -->
    <script src="{{url('../js/vendor/modernizr-2.8.3.min.js')}}"></script>
    
<style type="text/css">   
.preloader {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  z-index: 9999;
  background-color: #fff;
}
.preloader .loading {
  position: absolute;
  left: 50%;
  top: 50%;
  transform: translate(-50%,-50%);
  font: 14px arial;
}

</style>     
    
</head>

<body>
    <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->  
<script type="text/javascript" src="{{url('js/jquery-3.3.1.min.js')}}"></script>
    

    <!-- Body main wrapper start -->
    <div class="wrapper fixed__footer">
    
        <!-- Start Header Style -->
        <header id="header" class="htc-header header--3 bg__white">
            <!-- Start Mainmenu Area -->
            <div id="sticky-header-with-topbar" class="mainmenu__area sticky__header">
                <div class="container">
                    <div class="row">
                        <div class="col-md-2 col-lg-2 col-sm-3 col-xs-3">
                            <div class="logo">
                                <a href="index.html">
                                    <img src="{{url('images/logo/logo-company.png')}}" width="200px" height="46px" alt="logo">
                                </a>
                            </div>
                        </div>
                        <!-- Start MAinmenu Ares -->
                        <div class="col-md-8 col-lg-8 col-sm-6 col-xs-6">
                            <nav class="mainmenu__nav hidden-xs hidden-sm">
                                <ul class="main__menu">
                                    
                                    <li><a href="{{url('/')}}">Home</a></li>
                                    <li><a href="{{url('/katalog')}}">Katalog</a></li>
                                    <li><a href="{{url('/testimoni')}}">Testimonial</a></li>
                                    <li><a href="{{url('/invoice')}}">Invoice</a></li>
                                    <li><a href="{{url('/about')}}">about</a></li>
                                    <li><a href="{{url('/contact')}}">contact</a></li>
                                </ul>
                            </nav>
                            <div class="mobile-menu clearfix visible-xs visible-sm">
                                <nav id="mobile_dropdown">
                                    <ul>
                                        <li><a href="{{url('/')}}">Home</a></li>
                                        <li><a href="{{url('/katalog')}}">Katalog</a></li>
                                        <li><a href="{{url('/testimoni')}}">Testimonial</a></li>
                                        <li><a href="{{url('/invoice')}}">Invoice</a></li>
                                        <li><a href="{{url('/about')}}">About</a></li>
                                        <li>
                                            <div class="offset__single">
                                               <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                    
                                                        @if( $tes = auth()->user() == true)
                                                        <div>
                                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                                           onclick="event.preventDefault();
                                                                         document.getElementById('logout-form').submit();">
                                                                         Log Out
                                                        </a>
                                                        </div>
                                                            @csrf
                                                            @endif

                                                </form>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="offset__single">
                                                 <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                    
                                                        @if( $tes = auth()->user() == true)
                                                        <div>
                                                        <a class="dropdown-item" href="/public/profile">
                                                           Edit Profile
                                                        </a>
                                                        </div>
                                                            @csrf
                                                            @endif

                                                </form>
                                            </div>
                                        </li>
                                    </ul>
                                </nav>
                            </div>                          
                        </div>
                        <!-- End MAinmenu Ares -->
                        <div class="col-md-2 col-sm-4 col-xs-3">  
                            <ul class="menu-extra">
                                @if(Request::is('katalog'))
                                <li class="search search__open hidden-xs"><span class="ti-search"></span></li>
                               
                                @endif
                               
                               
                                <li>
                                    @if( $tes = auth()->user() == true)

                                        {{auth()->user()->name}}
                                        
                                    @else
                                        
                                        <a href="{{url('/login2')}}"><span class="ti-user"></span></a>
                                    @endif
                                </li>
                                @if(session('cart') == true)
                                <li>
                                    <div class="row">
                                    <a href="/cart">
                                    <span class="ti-shopping-cart"></span>
                                    <span style="font-size: 12px;font-weight: 700;line-height:1.6; text-align: center;color: rgb(255, 0, 0); ">{{count(session('cart'))}}</span>
                                    </a>
                                    </div>
                                </li>
                                @else
                                @endif
                                <li class="toggle__menu hidden-xs hidden-sm"><span class="ti-menu"></span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="mobile-menu-area"></div>
                </div>
            </div>
            <!-- End Mainmenu Area -->
        </header>
        <!-- End Header Style -->
        
        
        <div class="body__overlay"></div>
        <!-- Start Offset Wrapper -->
        <div class="offset__wrapper">
            <!-- Start Search Popap -->
            <div class="search__area">
                <div class="container" >
                    <div class="row" >
                        <div class="col-md-12" >
                            <div class="search__inner">
                                <form action="/data" method="get">
                                    <input name="keyword" placeholder="Search here... " type="text" id="keyword">
                                    <button type="submit" id="tombol-cari"></button>
                                </form>
                                <div id="mydata"><b>Informasi produk cari disini...</b></div>
                                <div class="search__close__btn">
                                    <span class="search__close__btn_icon"><i class="zmdi zmdi-close"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Search Popap -->
             <!-- Start Offset MEnu -->
            <div class="offsetmenu">
                <div class="offsetmenu__inner">
                    <div class="offsetmenu__close__btn">
                        <a href="#"><i class="zmdi zmdi-close"></i></a>
                    </div>
                    <div class="off__contact">
                        <div class="logo">
                            <a href="{{url('/')}}">
                                <img src="{{url('images/logo/logo-company.png')}}" width="200px" height="46px" alt="logo">
                            </a>
                        </div>
                        <p>Selamat Datang, Selamat Berbelanja di Toko Kami</p>
                    </div>
                    <div class="offset__widget">
                        <div class="offset__single">
                            <!-- <h4 class="offset__title">Language</h4> -->
                           <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                
                                    @if( $tes = auth()->user() == true)
                                    <div>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <!-- {{ __('Logout') }} -->
                                    <!-- <span class="ti-import" style="width: 50px"></span> -->
                                    <h4 class="offset__title">Log Out</h4>
                                    </a>
                                    </div>
                                        @csrf
                                        @endif

                            </form>
                        </div>
                        <div class="offset__single">
                            <!-- <h4 class="offset__title">Currencies</h4> -->
                             <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                
                                    @if( $tes = auth()->user() == true)
                                    <div>
                                    <a class="dropdown-item" href="/profile">
                                       
                                    <!-- <span class="ti-import" style="width: 50px"></span> -->
                                    <h4 class="offset__title">Edit Profile</h4>
                                    </a>
                                    </div>
                                        @csrf
                                        @endif

                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Offset MEnu -->
           
     
            @yield('container')

            
             <!-- Start Footer Area -->
        <footer class="htc__foooter__area gray-bg">
            <div class="container">
                <!-- Start Copyright Area -->
                <div class="htc__copyright__area">
                    <div class="row">
                        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                            <div class="copyright__inner">
                                <div class="copyright">
                                    <p>© 2021
                                    RGC</p>
                                </div>
                                <ul class="footer__menu">
                                    <li><a href="{{url('/')}}">Home</a></li>
                                    <li><a href="{{url('/katalog')}}">Katalog</a></li>
                                    <!-- <li><a href="contact.html">Contact Us</a></li> -->
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Copyright Area -->
            </div>
        </footer>
        <!-- End Footer Area -->
       
    </div>
    <!-- Body main wrapper end -->
    <!-- Placed js at the end of the document so the pages load faster -->

    <!-- jquery latest version -->
   
    <script src="{{url('js/vendor/jquery-1.12.0.min.js')}}"></script>
    <!-- Bootstrap framework js -->
    <script src="{{url('js/bootstrap.min.js')}}"></script>
    <!-- All js plugins included in this file. -->
    <script src="{{url('js/plugins.js')}}"></script>
    <script src="{{url('js/slick.min.js')}}"></script>
    <script src="{{url('js/owl.carousel.min.js')}}"></script>
    <!-- Waypoints.min.js. -->
    <script src="{{url('js/waypoints.min.js')}}"></script>
    <!-- Main js file that contents all jQuery plugins activation. -->
    <script src="{{url('js/main.js')}}"></script>
    <script type="text/javascript" src="{{url('js/select.js')}}"></script>
    <script type="text/javascript" src="{{url('js/cari.js')}}"></script>
 @yield('footer')