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
  </nav>
  <!-- /.navbar -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Edit Data Pelanggan</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div id="isi">
    <section class="content">
      <div class="container-fluid">
    <form action="/admin/update_data_pelanggan" method="post">
     {{csrf_field()}}
    <div class="row">
        <!-- left column -->
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-body">
                @foreach($datas as $data)
                <input hidden="" name="id" value="{{$data->id}}">
                <input hidden="" name="user_id" value="{{$data->user_id}}"> <br>
                <label>Nama</label>
                <input type="text" class="form-control" name="nama" value="{{$data->nama}}"> <br>
                <label>Email</label>
                <input type="text" class="form-control" name="email" value="{{$data->email}}"> <br>
                <label>Alamat</label>
                <input type="text" class="form-control" name="alamat" value="{{$data->alamat}}"> <br>
                <label>Jenis Kelamin</label>
                <select class="form-control" name="jenis_kelamin">
                  <option disabled="">{{$data->jenis_kelamin}}</option>
                  <option value="pria">Pria</option>
                  <option value="wanita">Wanita</option>
                </select> <br>
                <label>Password</label>
                <input type="text" class="form-control" name="password" value="{{$data->password}}">
                @endforeach

              </div>
              <br>
              <div class="box-footer" style = "position:relative; left:20px; bottom:12px;">
                  <input type="submit" name="submit" class="btn btn-success">
                  <!-- <button type="submit" name="submit" class="btn btn-success">Submit</button> -->
                  <a href="{{url('/admin')}}" class="btn btn-primary">Kembali</a>
                </div>
            </div><!-- /.box-body -->
            
          </div><!-- /.box -->
          <!-- left column -->
        </div>
      </div>
  </form>
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
