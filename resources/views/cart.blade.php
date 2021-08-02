@extends('layouts.main')

@section('container')


        <!-- Start Bradcaump area -->
        <div class="ht__bradcaump__area" style="background: rgba(0, 0, 0, 0) url(images/bg/2.jpg) no-repeat scroll center center / cover ;">
            <div class="ht__bradcaump__wrap">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="bradcaump__inner text-center">
                                <h2 class="bradcaump-title">Cart</h2>
                                <nav class="bradcaump-inner">
                                  <a class="breadcrumb-item" href="{{{url('/')}}}">Home</a>
                                  <span class="brd-separetor">/</span>
                                  <span class="breadcrumb-item active">Cart</span>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Bradcaump area -->

        <!-- cart-main-area start -->
        <div class="cart-main-area ptb--120 bg__white">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                               
                            <div class="table-content table-responsive">
                                @if(empty($cart) || count($cart) == 0)
                                 <script type="text/javascript">
                                    window.alert("Data kosong");
                                    window.location.href = "/";
                                </script>
                                <!-- <h1>tidak ada produk</h1> -->
                                @else
                                <table>
                                    
                                    <thead>
                                        <tr>
                                            <th class="product-thumbnail">Image</th>
                                            <th class="product-name">Product</th>
                                            <th class="product-price">Price</th>
                                            <th class="product-price">Keterangan</th>
                                            <th class="product-quantity">Quantity</th>
                                            <th class="product-subtotal">Total</th>
                                            <th>Update</th>
                                            <th class="product-remove">Remove</th>
                                        </tr>
                                    </thead>
                                    
                                    @foreach($cart as $ct => $val)
                                    <form method="post" action="{{url('/postupdate/'.$val['id_produk'])}}">
                                     {{csrf_field()}}  
                                    <?php 
                                       
                                        $total = $val['harga'] * $val['jumlah'];
                                        // dd($total);
                                    ?>
                                    <tbody>
                                        <tr>
                                                <input type="hidden" name="id" value="{{$val['id_produk']}}">

                                                
                                            <td class="product-thumbnail"><a href="#"><img src="{{ url('../images/'.$val['gambar']) }}" alt="product img" /></a></td>
                                            <td class="product-name"><a href="#">{{$val["title"]}}</a></td>
                                            <td class="product-price"><span class="amount">{{$val["harga"]}}</span></td>
                                            <td>
                                                <p>{{$val["keterangan"]}}</p>
                                            </td>
                                            <td class="product-quantity"><input name="number" type="number" value="{{$cart[$ct]['jumlah']}}" >
                                            </td>
                                            <td class="product-subtotal">{{$total}}</td>
                                            <td>
                                                <div class="buttons-cart">
                                                <input value="Update" type="submit" name="submit" style="background-color: #303030; color: white; width: 150px; height: 40px">
                                                </div>
                                            </td>
                                            <td class="product-remove">
                                                
                                                <a href="{{url('/cart/hapus/'.$ct)}}">X</a>
                                            </td>
                                        </tr>
                                    </tbody>
                                    </form>
                                    <input hidden="" form="pesan" type="number" name="number" value="{{$val['jumlah']}}">
                                    
                                    @endforeach

                                    <form id="pesan" method="post" action="/transaksi/tambah/">
                                    {{csrf_field()}}
                                    </form>
                                    
                                    
                                </table>
                                
                            </div>
                            <div class="row">
                                <div class="col-md-8 col-sm-7 col-xs-12">
                                    <div class="buttons-cart">
                                        <input type="submit" form="pesan" type="submit" style="width: 200px; height: 40px" value="Pesan">
                                        <!-- <input type="submit" value="Update Cart" /> -->
                                        <a href="/katalog">Continue Shopping</a>
                                    </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                         
                       
                    </div>
                </div>
            </div>


@endsection

@section('footer')

@endsection
        
</body>

</html>
