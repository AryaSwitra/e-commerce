@extends('layouts/admin')

@section('container')
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{url('/superadmin')}}" class="nav-link">Home</a>
      </li>
    
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3" method="get" action="/superadmin/produk">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search" id="keyword" name="keyword">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit" id="tombol-cari">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>
  </nav>
  <!-- /.navbar -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Slider</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/superadmin/addSlider">add slider</a></li>
              <li class="breadcrumb-item active">Slider</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
  <div id="isi">
    <section class="content">
      <div class="container-fluid">
       
          <!-- table -->
        <table class="table table-hover">
          <thead class="thead-dark">
            <tr>
              <th scope="col">No</th>
              <th scope="col">Title</th>
              <th scope="col">Foto</th>
              <th scope="col">Active</th>
              <th scope="col">Uploader</th>
              <th scope="col">Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach($datas as $dt)
            <tr>
              <th scope="row">{{$loop->iteration}}</th>
              <td>{{$dt->title}}</td>
              <td><img width="80px" src="{{ url('../images/'.$dt->foto) }}"></td>
              <td>{{$dt->active}}</td>
              <td>{{$dt->uploader}}</td>
              <td>
                <a href="{{url('/superadmin/active_slider/'.$dt->id)}}" class="badge badge-primary">On</a>
                <a href="{{url('/superadmin/unactive_slider/'.$dt->id)}}" class="badge badge-warning">Off</a>
                <a href="{{url('/superadmin/edit_data_slider/'.$dt->id)}}" class="badge badge-success">Edit</a>
                <a href="{{url('/superadmin/delete_data_slider/'.$dt->id)}}" class="badge badge-danger">Delete</a>
              </td>
            </tr>
          </tbody>
          @endforeach
        </table>
        <!-- /.table -->
       
      </div><!-- /.container-fluid -->
    </section>
  </div>
    <!-- /.content -->
  </div>

@endsection

@section('footer')

@endsection

</body>
</html>

