@extends('layouts/admin2')

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
        <a href="{{url('/admin')}}" class="nav-link">Home</a>
      </li>
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3" method="get" action="/admin/produk">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search" id="keyword" name="keyword">
        <div class="input-group-append">
          <button class="btn btn-navbar" id="tombol-cari" type="submit">
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
            <h1 class="m-0">Dashboard</h1>
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
              <th scope="col">Nama</th>
              <th scope="col">Email</th>
              <th scope="col">ID Transaksi</th>
              <th scope="col">Title</th>
              <th scope="col">Jumlah</th>
              <th scope="col">Waktu</th>
              <th scope="col">Status</th>
              <th scope="col">Message</th>
              <th scope="col">Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach($data as $dt)
            <tr>
              <td>{{$dt->nama}}</td>
              <td>{{$dt->email}}</td>
              <td>{{$dt->id_header_transaksi}}</td>
              <td>{{$dt->title}}</td>
              <td>{{$dt->jumlah}}</td>
              <td>{{$dt->created_at}}</td>
              <td>{{$vt->status($dt->id_header_transaksi)->transaction_status}}</td>
              <td>{{$dt->status_pesan}}</td>
              <td>
                <form action="{{url('/admin/detail_pesanan/'.$dt->id_header_transaksi)}}" method="post">
                  {{csrf_field()}}
                  <input class='btn btn-success' type="submit" name="submit" value="Selengkapnya">
                  <!-- <button type='submit' class='btn btn-success'>Selengkapnya</button> -->
                </form>
            </tr>
          </tbody>
          @endforeach
        </table>
      
        <!-- /.table -->
       
      </div><!-- /.container-fluid -->
      <div align="center">{{$data->links()}}</div>
    </section>
    </div>
    <!-- /.content -->
  </div>


@endsection

@section('footer')

@endsection

</body>
</html>

