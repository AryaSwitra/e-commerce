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
            <h1 class="m-0">Detail Pemesanan</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

       

        <section style="min-height: 250px;padding: 15px;margin-right: auto;margin-left: auto;padding-left: 15px;padding-right: 15px;">
          <div class="no-print" style="margin: 10px; padding: 10px;">
            <div style="margin-bottom: 0!important; background-color: #00c0ef !important; padding: 15px 30px 15px 15px; border-left: 5px solid #0097bc; color: #fff !important; font-size: 14px;">                        
              <h4><i class="fa fa-info"></i> Note:</h4>
              Halaman ini bisa langsung diprint dengan menekan tombol (ctrl + p) pada keyboard
            </div>
          </div>

          <!-- Main content -->
          <section style="position: relative; background: #fff; border: 1px solid #f4f4f4; padding: 20px; margin: 10px 25px;">
            <!-- title row -->
            <div class="row">
              <div class="col-xs-12">
                <h2 class="page-header" style="margin: 10px 0 20px 0; font-size: 22px; padding-bottom: 9px; border-bottom: 1px solid #eee; display: block; margin-block-start: 0.83em; margin-block-end: 0.83em; margin-inline-start: 0px; margin-inline-end: 0px;">
                  <i class="fa fa-globe"></i> RGC Store
                </h2>
              </div><!-- /.col -->
            </div>
            <!-- info row -->
            <div style="margin-right: -15px; margin-left: -15px;">
              <div style="width: 33.33333333%; float: left; position: relative;min-height: 1px; padding-right: 15px; padding-left: 15px;">
                Dari
                <address>
                  <strong>RGC Store</strong><br>
                  <p style="font-size: 15px">RGC Store Alamat: Jl. Purnawirawan Blok I No. 07 Perum Metro Palu Regency</p>
                </address>
              </div><!-- /.col -->
              <div style="width: 33.33333333%; float: left; position: relative;min-height: 1px; padding-right: 15px; padding-left: 15px;">
                Kepada
                <address>
                  @foreach($data2 as $dt)
                  <strong>{{$dt['nama']}}</strong><br>
                  @endforeach
                  @foreach($data2 as $dt)
                 <p style="font-size: 15px"> {{$dt['alamat']}}, {{$dt['tujuan']}} , 301312</p>
                 @endforeach
                </address>
              </div><!-- /.col -->
              <div style="width: 33.33333333%; float: left; position: relative;min-height: 1px; padding-right: 15px; padding-left: 15px;">
                <b style="font-size: 15px">No.Invoice: #{{$dt['id_header_transaksi']}}</b><br/>
                <b style="font-size: 15px">Tanggal Pemesanan: {{$dt['created_at']}} </b><br/>
              </div><!-- /.col -->
            </div><!-- /.row -->

            <!-- Table row -->
            <div style="margin-right: -15px; margin-left: -15px;">
              <div style="min-height: .01%; overflow-x: auto; width: 100%; position: relative;min-height: 1px;padding-right: 15px;padding-left: 15px;">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>No.</th>
                      <th>Nama Barang</th>
                      <th>Berat</th>
                      <th>Jumlah Berat</th>
                      <th>Harga</th>
                      <th>Keterangan</th>
                      <th>Qty</th>
                      <th>Subtotal</th>
                    </tr>
                  </thead>
                  <?php
                   
                    $totalberat = 0;
                  ?>
                  @foreach($data as $dt)
                  <?php
                   $totalberat += $dt['total_berat'];
                  ?>
                  <tbody>
                     <tr>
                        <td align='center'>{{$loop->iteration}}</td>
                        <td align='left'>{{$dt['title']}}</td>
                        <td style='text-align: center; font-size: 15px;'>{{$dt['berat']}}</td>
                        <td style='text-align: center; font-size: 15px;'>{{$dt['total_berat']}}</td>
                        <td style='text-align: center; font-size: 15px;'>{{$dt['harga']}}</td>
                        <td style='text-align: center; font-size: 15px;'>{{$dt['keterangan']}}</td>
                        <td style='text-align: center; font-size: 15px;'>{{$dt['jumlah']}}</td>
                        <td style='text-align: center; font-size: 15px;'>{{$dt['subharga']}}</td>
                      </tr>
                      
                  </tbody>
                  @endforeach
                </table>
              </div><!-- /.col -->
            </div><!-- /.row -->
            <br>
            <div style="margin-right: -15px; margin-left: -15px;">
              <div style="width: 100%; padding-right: 15px; padding-left: 15px;">
                <div style="min-height: .01%; overflow-x: auto;">
                  <table style="width: 100%; max-width: 100%; margin-bottom: 20px; background-color: transparent; border-spacing: 0; border-collapse: collapse;">
                    <tr>
                      <th style="font-size: 15px">Paket Pengiriman</th>
                      <td style="font-size: 15px" align="right">VIA {{$dt['kurir']}} {{$dt['service']}} ke {{$dt['tujuan']}} </td>
                      <td></td>
                      <td align="right">
                    
                      </td>
                    </tr>
                    <tr>
                      <th style="font-size: 15px">Total Berat</th>
                      <td></td>
                      <td></td>

                      <td style="font-size: 15px" align="right">
                       {{$totalberat}} Gram
                      </td>
                    </tr>
                    <tr>
                      <th style="font-size: 15px">Total Ongkir</th>
                      <td align="right">
                     
                      </td>
                      <td style="font-size: 15px" align="right">Rp.{{$dt['ongkir']}}.00</td>
                      <td align="right">
                     
                      </td>
                    </tr>
                    <tr>
                      <th style="font-size: 15px">Grand Total</th>
                      <td></td>
                      <td style="font-size: 15px" align="right">Rp.{{$dt['total']}}</td>
                      <td align="right">
                       <b></b>
                         
                      </td>
                    </tr>
                    <tr>
                      <th style="font-size: 15px">Status</th>
                      <td></td>
                      <td style="font-size: 15px" align="right">{{$dt['status_pesan']}}</td>
                      <td align="right">
                       <b></b>
                         
                      </td>
                    </tr>
                  </table>
                
                  @if($dt['status_pesan'] == 'Transaksi sedang diproses')
                  <a class="no-print" href="{{url('/admin/acc_pembayaran/'.$dt->id_header_transaksi)}}"><button type='submit' class='btn btn-primary'>Terima</button></a>
                  
                  @elseif($dt['status_pesan'] == 'Transaksi Telah di terima')
                    <a class="no-print" href="{{url('/admin/cancel_pembayaran/'.$dt->id_header_transaksi)}}"><button type='submit' class='btn btn-warning'>Cancel</button></a>
                  <br> <br>
                  <form class="no-print" method="post" action="{{url('/admin/detail_pesanan/'.$dt['id_header_transaksi'])}}">
                    {{csrf_field()}}
                    <input type="text" name="resi" placeholder="Masukan Resi*">
                    <button>submit</button>
                  </form>
                  @else
                  @endif
                  @if($resi)
                  @foreach($resi as $rs)
                  <p>date : {{$rs['date']}}</p>
                  <p>desc :{{$rs['desc']}}</p>
                  @endforeach
                  @endif
                </div>
              </div><!-- /.col -->
            </div><!-- /.row -->
          </section><!-- /.content -->
        </section> 
      
@endsection

@section('footer')

@endsection

  </body>
</html>
