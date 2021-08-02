@extends('layouts.main')

@section('container')
        <!-- Start Bradcaump area -->
        <div class="ht__bradcaump__area" style="background: rgba(0, 0, 0, 0) url(images/bg/2.jpg) no-repeat scroll center center / cover ;">
            <div class="ht__bradcaump__wrap">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="bradcaump__inner text-center">
                                <h2 class="bradcaump-title">Invoice</h2>
                                <nav class="bradcaump-inner">
                                  <a class="breadcrumb-item" href="index.html">Home</a>
                                  <span class="brd-separetor">/</span>
                                  <span class="breadcrumb-item active">Invoice</span>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Bradcaump area -->
        <!-- wishlist-area start -->
        <div class="wishlist-area ptb--120 bg__white">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="wishlist-content">
                            
                                <div class="wishlist-table table-responsive">
                                    
                                    <a href="/menunggu_pembayaran"><p>Menunggu pembayaran <span style="color: red; font-weight: 700">{{DB::table('detail_transaksi')->where('email', Auth::user()->email)->where('status','pending')->groupBy('id_header_transaksi')->count()}} </span></p></a>
                                    <br>
                                    
                                    @if(empty($data) || count($data) == 0)
                                    <p>Transaksi Masih Kosong</p>
                                    @else
                                    <table>
                                        <thead>
                                            <tr>
                                                <th><span class="nobr">No</span></th>
                                                <th><span class="nobr">Nama</span></th>
                                                <th><span class="nobr">Email</span></th>
                                                <th><span class="nobr">ID Transaksi</span></th>
                                                <th><span class="nobr">Title</span></th>
                                                <th><span class="nobr">Jumlah</span></th>
                                                <th><span class="nobr">Alamat</span></th>
                                                <th><span class="nobr">Waktu</span></th>
                                                <th><span class="nobr">Status</span></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($data as $dt)
                                        <form action="{{url('/detail_invoice')}}" method="post">
                                            {{csrf_field()}}
                                            
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{$dt->nama}}</td>
                                                <td>{{$dt->email}}</td>
                                                <td>{{$dt->id_header_transaksi}}</td>
                                                <td>{{$dt->title}}</td>
                                                <td>{{$dt->jumlah}}</td>
                                                <td>{{$dt->alamat}}</td>
                                                <td>{{$dt->created_at}}</td>
                                                <td><button>cek status</button></td>
                                            </tr>
                                            <input type="hidden" name="nama" value="{{$dt->nama}}">
                                            <input type="hidden" name="email" value="{{$dt->email}}">
                                            <input type="hidden" name="id_header_transaksi" value="{{$dt->id_header_transaksi}}">
                                            <input type="hidden" name="title" value="{{$dt->title}}">
                                            <input type="hidden" name="jumlah" value="{{$dt->jumlah}}">
                                            <input type="hidden" name="alamat" value="{{$dt->alamat}}">
                                            <input type="hidden" name="created_at" value="{{$dt->created_at}}">
                                            <input type="hidden" name="status" value="{{$dt->status}}">

                                            
                                        </form>
                                        @endforeach
                                        </tbody>
                                        
                                        
                                        <tfoot>
                                            <tr>
                                                <td colspan="9">
                                                    
                                                    <div class="wishlist-share">
                                                        <h4 class="wishlist-share-title">Share on:</h4>
                                                        <div class="social-icon">
                                                            <ul>
                                                                <li><a href="#"><i class="zmdi zmdi-rss"></i></a></li>
                                                                <li><a href="#"><i class="zmdi zmdi-vimeo"></i></a></li>
                                                                <li><a href="#"><i class="zmdi zmdi-tumblr"></i></a></li>
                                                                <li><a href="#"><i class="zmdi zmdi-pinterest"></i></a></li>
                                                                <li><a href="#"><i class="zmdi zmdi-linkedin"></i></a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                    @endif
                                </div>  
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- wishlist-area end -->
        
@endsection

@section('footer')
        

@endsection
</body>

</html>
