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

      <div class="input-group input-group-sm">
        <form class="form-inline ml-3" method="get" action="/superadmin/produk">
      {{csrf_field()}}
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search" name="keyword">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
          </form>
        </div>
      </div>
    
  </nav>
  <!-- /.navbar -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Produk</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/superadmin/addProduk">add produk</a></li>
              <li class="breadcrumb-item active">Produk</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div id="containerisi">
    <section class="content">
      <div class="container-fluid">
       
          <!-- table -->
      
        <table class="table table-hover">
          <thead class="thead-dark">
            <tr>
              <th scope="col">No</th>
              <th scope="col">Title</th>
              <th scope="col">Deskripsi</th>
              <th scope="col">Kategori</th>
              <th scope="col">Jumlah</th>
              <th scope="col">Harga</th>
              <th scope="col">Berat</th>
              <th scope="col">Minimal Pemesanan</th>
              <th scope="col">Terjual</th>
              <th scope="col">Gambar</th>
              <th scope="col">Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach($produks as $prd)
            <tr>
              <th scope="row">{{$loop->iteration}}</th>
              <td>{{$prd->title}}</td>
              <td>{{$prd->deskripsi}}</td>
              <td>{{$prd->kategori}}</td>
              <td>{{$prd->jumlah}}</td>
              <td>{{$prd->harga}}</td>
              <td>{{$prd->berat}}</td>
              <td>{{$prd->minimal_pemesanan}}</td>
              <td>{{$prd->terjual}}</td>
              
              <td><img width="80px" src="{{ url('../images/'.$prd->gambar) }}"></td>
              <td>
                <a href="{{url('/superadmin/edit_data_produk/'.$prd->id_produk)}}" class="badge badge-success">edit</a>
                <a href="{{url('/superadmin/delete_data_produk/'.$prd->id_produk)}}" class="badge badge-danger">delete</a>
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


