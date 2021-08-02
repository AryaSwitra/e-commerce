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
    <!-- Main content -->
  <div id="isi">
    <section class="content">
      <div class="container-fluid">
       
          <!-- table -->
        <table class="table table-hover">
          <thead class="thead-dark">
            <tr>
              <th scope="col">No</th>
              <th scope="col">Nama</th>
              <th scope="col">User_Id</th>
              <th scope="col">Email</th>
              <th scope="col">Jenis Kelamin</th>
              <th scope="col">Alamat</th>
              <th scope="col">Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach($dts as $data)
            <tr>
              <th scope="row">{{$loop->iteration}}</th>
              <td>{{$data->nama}}</td>
              <td>{{$data->user_id}}</td>
              <td>{{$data->email}}</td>
              <td>{{$data->jenis_kelamin}}</td>
              <td>{{$data->alamat}}</td>
              <td>
                <a href="/superadmin/edit_data_pelanggan/{{$data->id}}" class="badge badge-success">edit</a>
                <a href="/superadmin/delete_data_pelanggan/{{$data->user_id}}" class="badge badge-danger">delete</a>
                <!-- <button data-id="{{$data->id}}" class="deleteRecord" data-token="{{ csrf_token() }}">delete</button> -->
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


