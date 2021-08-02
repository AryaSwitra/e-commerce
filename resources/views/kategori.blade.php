@extends('layouts.main')

@section('container')

 <section class="htc__blog__area bg__white pb--130">
             <div class="container">
                <div class="row">
                    <div class="col-md-3">
                         <div class="product-categories-all" align="center" style="width: 270px height: 232px">
                            <div class="product-categories-title">
                                <h3>Kategori</h3>
                            </div>     
                            <div class="category-menu-list">
                                <ul>
                                    @foreach($kategori as $kat)
                                    <li><a id="keyword" href="{{url('/kategori/'.$kat['nama_kategori'])}}">{{$kat['nama_kategori']}}</a></li>
                                    @endforeach
                                  
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="product-style-tab">
                            <div class="product-tab-list">
                                <!-- Nav tabs -->
                                <ul class="tab-style" role="tablist">
                                   
                                    <li>
                                        
                                            <div class="tab-menu-text">
                                                <h4>Produk</h4>
                                            </div>
                                        
                                    </li>
                                </ul>
                            </div>
                            <div id="isi">
                             <div class="tab-content another-product-style jump">
                                <div class="tab-pane active" id="home1">
                                    <div class="row">
                                        
                                            @foreach($produks as $prd)
                                            @if($prd['jumlah'] == 0)
                                            @else
                                            <div class="col-md-4 single__pro col-lg-4 cat--1 col-sm-4 col-xs-12">
                                                <div class="product">
                                                    
                                                    <div class="product__inner">
                                                        <div class="pro__thumb">
                                                            <input type="hidden" name="id_prd" value="{{$prd->id_produk}}">
                                                            <a href="#">
                                                                <img width="270" height="270" src="{{ url('../images/'.$prd->gambar) }}" alt="product images">
                                                            </a>
                                                        </div>
                                                        <div class="product__hover__info">
                                                            <ul class="product__action">
                                                                <li><a data-toggle="modal" title="Quick View" class="quick-view modal-view detail-link" href="{{url('/'.$prd->id_produk)}}"><span class="ti-plus"></span></a></li>
                                                                
                                                                <li><a title="Add TO Cart" href="{{url('/cart/tambah/'.$prd->id_produk)}}"><span class="ti-shopping-cart"></span></a></li>
                                                                
                                                                
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="product__details">
                                                        
                                                        <h2><a href="product-details.html">{{$prd->title}}</a></h2>
                                                        <ul class="product__price">
                                                            <li class="old__price">$16.00</li>
                                                            <li class="new__price">{{$prd->harga}}</li>
                                                        </ul>
                                                    </div>                                              
                                                </div>
                                            </div>
                                            @endif
                                            @endforeach
                                            
                                         <div align="center">{{$produks->links()}}</div>
                                    </div>      
                                </div>
                             </div>
                          </div>
                        </div>
                        
                        
                    </div>
                </div>
            </div>
        </section>

@endsection

@section('footer')
        

@endsection
</body>

</html>
