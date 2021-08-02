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

   </nav>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Tambah Slider</h1>
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
      
    <form method="post" action="/postslider" enctype="multipart/form-data">
		{{csrf_field()}}
		<label>title</label>
		<br>
		<br>
		<input type="text" name="title">
		<br>
		<br>
		<label>foto</label>
		<br>
		<br>
		<input type="file" name="foto">
		<br>
		<br>
		<button type="submit">submit</button>
	</form>

	<br><br>
	<a href="{{url('/superadmin')}}">kembali</a>
      
        <!-- /.table -->
       
      </div><!-- /.container-fluid -->
    </section>
    </div>
    <!-- /.content -->
  </div>

@endsection

@section('container2')

@endsection

</body>
</html>
