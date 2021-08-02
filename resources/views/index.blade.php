@extends('layouts.main')

@section('container')

        <!-- Start Feature Product -->
        <section class="categories-slider-area bg__white">
            <div class="container">
                <div class="row">
                    <!-- Start Left Feature -->
                    <div class="col-lg-12 col-sm-8 col-xs-12 float-left-style">
                        <!-- Start Slider Area -->
                        <div class="slider__container slider--one">
                            <div class="slider__activation__wrap owl-carousel owl-theme">
                                <!-- Start Single Slide -->
                                @foreach($sliders as $sl)
                                <div class="slide slider__full--screen slider-height-inherit slider-text-right" style="background: rgba(0, 0, 0, 0) no-repeat scroll center center / cover ;">
                                    <img src="{{url('/images/'.$sl->foto)}}" style="width: 300px; height: 320px; " >
                                    <div class="container">                
                                        <div class="row">
                                            <div class="col-md-10 col-lg-8 col-md-offset-2 col-lg-offset-4 col-sm-12 col-xs-12">
                                                <div class="slider__inner">
                                                    <h1>New Product <span class="text--theme">Collection</span></h1>
                                                    <div class="slider__btn">
                                                        <a class="htc__btn" href="cart.html">shop now</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                <!-- End Single Slide -->
                            </div>
                        </div>
                        <!-- Start Slider Area -->
                    </div>
                    
                </div>
            </div>
        </section>
        <!-- End Feature Product -->
        <div class="only-banner ptb--100 bg__white">
          
        </div>
        <!-- Start Our Product Area -->
        <section class="htc__product__area bg__white">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <div class="product-categories-all" align="center" style="width: 270px height: 232px">
                            <div class="product-categories-title">
                                <h3>Best Seller</h3>
                            </div>     
                            <marquee direction="up" height="175" width="160" scrollamount="3" scrolldelay="1" onmouseout="this.start()" onmouseover="this.stop()">
                                @foreach($produks as $tl)
                                
                                <div class="product-categories-menu">
                                <ul>
                                    <li><img alt="{{url('/images/'.$tl['gambar'])}}" id="image" src="{{url('/images/'.$tl['gambar'])}}" title="Lensa Tele Zoom 12x" alt="Lensa Tele Zoom 12x" style="width:150px; height:150px;" valign="top"></li>
                                </ul>
                                </div>
                                <br>
                                
                                @endforeach
                            </marquee>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="product-style-tab">
                            <div class="product-tab-list">
                                <!-- Nav tabs -->
                                <ul class="tab-style" role="tablist">
                                    <li>

                                            <div class="tab-menu-text">
                                                <h4>Produk Terlaris</h4>
                                            </div>
                                        
                                    </li>
                                </ul>
                            </div>
                            <!-- <div id="isi"> -->
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
                                                                <!-- 
                                                                <li><a title="Add TO Cart" href="{{url('/cart/tambah/'.$prd->id_produk)}}"><span class="ti-shopping-cart"></span></a></li> -->
                                                                
                                                                
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="product__details">
                                                        
                                                        <h2><a href="product-details.html">{{$prd->title}}</a></h2>
                                                        <ul class="product__price">
                                                            <li class="new__price">{{$prd->harga}}</li>
                                                        </ul>
                                                        <br>
                                                    </div>                                              
                                                </div>
                                            </div>
                                            
                                            @endif
                                            @endforeach

                                            <br> <br>
                                            
                                         
                                    </div>      
                                </div>
                             </div>
                          <!-- </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Our Product Area -->
        <!-- Start Blog Area -->
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
                            <!-- <div id="isi"> -->
                             <div class="tab-content another-product-style jump">
                                <div class="tab-pane active" id="home1">
                                    <div class="row">
                                        
                                            @foreach($produk as $prd)
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
                                                                
                                                                <!-- <li><a title="Add TO Cart" href="{{url('/cart/tambah/'.$prd->id_produk)}}"><span class="ti-shopping-cart"></span></a></li> -->
                                                                
                                                                
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
                                            
                                         
                                    </div>      
                                </div>
                             </div>
                          <!-- </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Blog Area -->

@endsection

@section('footer')
        

@endsection
</body>

</html>