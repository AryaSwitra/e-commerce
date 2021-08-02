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
  <!-- /.navbar -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Tambah Produk</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div id="isi">
    <section class="content">
      <div class="container-fluid">
       
      
        <!-- /.table -->
  <form action="/superadmin/tambahProduk" method="post" enctype="multipart/form-data">
    {{csrf_field()}}
        <div class="row">
    <!-- left column -->
    <div class="col-md-6">
      <!-- general form elements -->
      <div class="box box-primary">
        <div class="box-body">
          <div class="form-group"><label>Judul Produk</label>
            <input class="form-control" type="text" name="title"  id="nama_produk" size="30" placeholder="Huruf besar diawal lalu kecil"/>
          </div>
          <div class="form-group"><label>Deskripsi</label>
            <input class="form-control" type="text" name="deskripsi" id="seo_deskripsi" size="30" placeholder="Deskripsi singkat produk"/>
          </div>
          <div class="form-group"><label>Keterangan</label>
            <input class="form-control" name="keterangan" type="text" id="seo_keywords" size="30" placeholder="Isi dgn huruf kecil semua"/>
          </div>
           <div class="form-group"><label>Harga</label>
              <input class="form-control" name="harga" type="text" id="b" size="30" placeholder="Isi angka saja" />
            </div>
            <div class="form-group"><label>Jumlah</label>
              <input class="form-control" name="jumlah" type="text" id="a" size="30" placeholder="Isi angka saja"/>
            </div>
            <div class="form-group"><label>Berat</label>
              <input class="form-control" name="berat" type="text" id="d" size="30" />
            </div>
        </div><!-- /.box-body -->
      </div><!-- /.box -->
      <!-- left column -->
    </div>

    <!-- right column -->
    <div class="col-md-6">
      <!-- general form elements -->
      <div class="box box-primary">
        <div class="box-body">
          <div class="row">
            <div class="col-xs-4"><label>Kategori</label>
              <br/>
              <select name="kategori" class="form-control">
                <option disabled="">-pilih ketegori-</option>
                @foreach($kategori as $kategoris)
                <option >{{$kategoris->nama_kategori}}</option>
                @endforeach
              </select>
              <img src="" width="18" id="imgLoad" style="display:none;" />
            </div>
           
          </div><br/>
          <div class="row">
            <div class="col-xs-3"><label>Minimal Pemesanan</label>
              <input class="form-control" name="minimal_pemesanan" type="text" id="warna" size="30"/>
            </div>
          </div><br/>
          <div class="form-group"><label>* Foto Baru</label><br/>
            <input type="file" name="gambar" id="img" onchange="tampilkanPreview(this,'preview')" required/>
            <br><b>Preview Gambar</b><br>
            <img id="preview" src="{{url('../images/spinner.gif')}}" alt="" width="35%" height="150px" />
          </div>
        </div><!-- /.box-body -->
        <div style = "position:relative; left:40px; top:2px;">
          <button  type="submit" name="submit" class="btn btn-success">Submit</button>
          <a href="{{url('/superadmin')}}" class="btn btn-primary">kembali</a>
        </div>
        <br>
      </div><!-- /.box -->
      <!-- right column -->
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
