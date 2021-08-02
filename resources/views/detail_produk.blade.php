@extends('layouts.main')

@section('container')

	

	 <!-- Start Bradcaump area -->
        <div class="ht__bradcaump__area" style="background: rgba(0, 0, 0, 0) url(images/bg/2.jpg) no-repeat scroll center center / cover ;">
            <div class="ht__bradcaump__wrap">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="bradcaump__inner text-center">
                                <h2 class="bradcaump-title">Product Details</h2>
                                <nav class="bradcaump-inner">
                                  <a class="breadcrumb-item" href="index.html">Home</a>
                                  <span class="brd-separetor">/</span>
                                  <span class="breadcrumb-item active">Product Details</span>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Bradcaump area -->

	<!-- QUICKVIEW PRODUCT -->
    <section class="categories-slider-area bg__white">
            <div class="container">
   
                    <div class="modal-body">
                        <div class="modal-product">
                            <!-- Start product images -->
              @foreach($details as $dtl)

                            <div class="product-images">
                                <div class="main-image images" style=" position: absolute;top: 8px; left: 200px; font-size: 18px;">
                                    <img alt="big images" height="350" width="400" src="{{ url('/images/'.$dtl['gambar']) }}">
                                </div>
                            </div>
                        @endforeach
                            <!-- end product images -->
              @foreach($details as $dtl)

                            <div class="product-info">
                                <h1>{{$dtl['title']}}</h1>
                                <div class="price-box-3">
                                    <div class="s-price-box">
                                        <span class="new-price">Rp.{{$dtl['harga']}}</span>
                                        <span class="old-price">$45.00</span>
                                    </div>
                                </div>
                                <div class="quick-desc">
                                    <p>Tersisa : {{$dtl['jumlah']}}</p>
                                </div>
                                <div class="quick-desc">
                                    {{$dtl['deskripsi']}}
                                </div>
                                <div class="quick-desc">
                                    {{$dtl['keterangan']}}
                                    <form id="kirim" method="post" action="{{url('/cart/tambah/'.$dtl['id_produk'])}}">
                                        {{csrf_field()}}
                                        <input type="text" name="keterangan">
                                    </form>
                                </div>
                                
                                <div class="buttons-cart">
                                    <input type="submit" form="kirim">
                                    <!-- <a href="{{url('/cart/tambah/'.$dtl['id_produk'])}}">Add to cart</a> -->
                                </div>
                            </div><!-- .product-info -->
                        </div><!-- .modal-product -->
                    </div><!-- .modal-body -->
                 @endforeach
                </div>
                <br><br><br>
            </section>
    <!-- END QUICKVIEW PRODUCT -->

</body>
</html>
@endsection