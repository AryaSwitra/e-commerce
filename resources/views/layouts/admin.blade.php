<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<!--   <meta name="csrf-token" content="{{ csrf_token() }}"> -->
  <title>AdminLTE 3 | Dashboard</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="{{url('https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback')}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{url('../plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{url('https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css')}}">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{url('../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{url('../plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{url('../plugins/jqvmap/jqvmap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{url('../dist/css/adminlte.min.css')}}">

  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{url('../plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{url('../plugins/daterangepicker/daterangepicker.css')}}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{url('../plugins/summernote/summernote-bs4.min.css')}}">

  <!-- <script type="{{url('../../js/cari_produk.js')}}"></script> -->
  

  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<!-- <script>$.widget.bridge('uibutton', $.ui.button);</script> -->
<!-- Bootstrap 3.3.4 -->
<!-- <link href="{{url('/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />     -->
<!-- FontAwesome 4.3.0 -->
<!-- <link href="{{url('/font-awesome4.3.0/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css" /> -->
<!-- Theme style -->
<!-- <link href="{{url('/dist/css/skins/skin-blue.min.css')}}" rel="stylesheet" type="text/css" /> -->
<!-- Slimscroll -->
<!-- <script src="{{url('/plugins/slimScroll/jquery.slimscroll.min.js')}}" type="text/javascript"></script> -->
<!-- FastClick -->
<!-- <script src="{{url('/plugins/fastclick/fastclick.min.js')}}"></script> -->
<!-- AdminLTE App -->
<!-- <script src="{{url('/dist/js/app.min.js')}}" type="text/javascript"></script> -->

<style type="text/css">
  @media print
{    
    .no-print, .no-print *
    {
        display: none !important;
    }
}
</style>

</head>



 <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{url('dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Superadmin</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{url('dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{Auth::user()->name}}</a>
        </div>

        <div>
          <a style="color: #bb2d3a" class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{url('/superadmin')}}" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{url('/superadmin/produk')}}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Produk
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{url('/superadmin/kategori')}}" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Kategori
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{url('/superadmin/data_admin')}}" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Data Admin
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{url('/superadmin/data_pelanggan')}}" class="nav-link">
              <i class="nav-icon fas fa-tree"></i>
              <p>
                Data Pelanggan
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Testimonial
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
             <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('/superadmin/testimonial_baru')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Testimonial Baru</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('/superadmin/testimonial')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Total Testimonial</p>
                </a>
              </li>
            </ul>
          </li>
  
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

@yield('container')



  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2021 <a href="https://adminlte.io">RGC</a></strong>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<!-- <script src="{{asset('../plugins/jquery/jquery.min.js')}}"></script> -->
<!-- <script src="http://chicfrog.com/admin8169/..http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script> -->
<script src="{{asset('plugins/jquery/jquery-3.6.0.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- ChartJS -->
<script src="{{asset('plugins/chart.js/Chart.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{asset('plugins/sparklines/sparkline.js')}}"></script>
<!-- JQVMap -->
<script src="{{asset('plugins/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{asset('plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{asset('plugins/jquery-knob/jquery.knob.min.js')}}"></script>
<!-- daterangepicker -->
<script src="{{asset('plugins/moment/moment.min.js')}}"></script>
<script src="{{asset('plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<!-- Summernote -->
<script src="{{asset('plugins/summernote/summernote-bs4.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('dist/js/adminlte.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('dist/js/demo.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset('dist/js/pages/dashboard.js')}}"></script>

<script>
            function tampilkanPreview(gambar,idpreview){
//                membuat objek gambar
                var gb = gambar.files;
//                loop untuk merender gambar
                for (var i = 0; i < gb.length; i++){
//                    bikin variabel
                    var gbPreview = gb[i];
                    var imageType = /image.*/;
                    var preview=document.getElementById(idpreview);
                    var reader = new FileReader();
                    if (gbPreview.type.match(imageType)) {
//                        jika tipe data sesuai
                        preview.file = gbPreview;
                        reader.onload = (function(element) {
                            return function(e) {
                                element.src = e.target.result;
                            };
                        })(preview);
    //                    membaca data URL gambar
                        reader.readAsDataURL(gbPreview);
                    }else{
//                        jika tipe data tidak sesuai
                        alert("Type file tidak sesuai. Khusus image.");
                    }
                }
            }
        </script>


@yield('footer')
