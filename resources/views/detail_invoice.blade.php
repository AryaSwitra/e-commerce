@extends('layouts.main')
@section('container')
        <!-- End Header Style -->

        
        <div class="body__overlay"></div>
        <!-- Start Offset Wrapper -->
        <div class="offset__wrapper">
            <!-- Start Search Popap -->
            <div class="search__area">
                <div class="container" >
                    <div class="row" >
                        <div class="col-md-12" >
                            <div class="search__inner">
                                
                                    <input placeholder="Search here... " type="text">
                                    <button type="submit"></button>
                                </form>
                                <div class="search__close__btn">
                                    <span class="search__close__btn_icon"><i class="zmdi zmdi-close"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Search Popap -->
            <!-- Start Offset MEnu -->
            <div class="offsetmenu">
                <div class="offsetmenu__inner">
                    <div class="offsetmenu__close__btn">
                        <a href="#"><i class="zmdi zmdi-close"></i></a>
                    </div>
                    <div class="off__contact">
                        <div class="logo">
                            <a href="index.html">
                                <img src="images/logo/logo.png" alt="logo">
                            </a>
                        </div>
                        <p>Lorem ipsum dolor sit amet consectetu adipisicing elit sed do eiusmod tempor incididunt ut labore.</p>
                    </div>
                    <ul class="sidebar__thumd">
                        <li><a href="#"><img src="images/sidebar-img/1.jpg" alt="sidebar images"></a></li>
                        <li><a href="#"><img src="images/sidebar-img/2.jpg" alt="sidebar images"></a></li>
                        <li><a href="#"><img src="images/sidebar-img/3.jpg" alt="sidebar images"></a></li>
                        <li><a href="#"><img src="images/sidebar-img/4.jpg" alt="sidebar images"></a></li>
                        <li><a href="#"><img src="images/sidebar-img/5.jpg" alt="sidebar images"></a></li>
                        <li><a href="#"><img src="images/sidebar-img/6.jpg" alt="sidebar images"></a></li>
                        <li><a href="#"><img src="images/sidebar-img/7.jpg" alt="sidebar images"></a></li>
                        <li><a href="#"><img src="images/sidebar-img/8.jpg" alt="sidebar images"></a></li>
                    </ul>
                    <div class="offset__widget">
                        <div class="offset__single">
                            <h4 class="offset__title">Language</h4>
                            <ul>
                                <li><a href="#"> Engish </a></li>
                                <li><a href="#"> French </a></li>
                                <li><a href="#"> German </a></li>
                            </ul>
                        </div>
                        <div class="offset__single">
                            <h4 class="offset__title">Currencies</h4>
                            <ul>
                                <li><a href="#"> USD : Dollar </a></li>
                                <li><a href="#"> EUR : Euro </a></li>
                                <li><a href="#"> POU : Pound </a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="offset__sosial__share">
                        <h4 class="offset__title">Follow Us On Social</h4>
                        <ul class="off__soaial__link">
                            <li><a class="bg--twitter" href="#"  title="Twitter"><i class="zmdi zmdi-twitter"></i></a></li>
                            
                            <li><a class="bg--instagram" href="#" title="Instagram"><i class="zmdi zmdi-instagram"></i></a></li>

                            <li><a class="bg--facebook" href="#" title="Facebook"><i class="zmdi zmdi-facebook"></i></a></li>

                            <li><a class="bg--googleplus" href="#" title="Google Plus"><i class="zmdi zmdi-google-plus"></i></a></li>

                            <li><a class="bg--google" href="#" title="Google"><i class="zmdi zmdi-google"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- End Offset MEnu -->
        </div>
        <!-- End Offset Wrapper -->
        <!-- Start Bradcaump area -->
        <div class="ht__bradcaump__area" style="background: rgba(0, 0, 0, 0) url(images/bg/2.jpg) no-repeat scroll center center / cover ;">
            <div class="ht__bradcaump__wrap">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="bradcaump__inner text-center">
                                <h2 class="bradcaump-title">Detail Invoice</h2>
                                <nav class="bradcaump-inner">
                                  <a class="breadcrumb-item" href="{{url('/')}}">Home</a>
                                  <span class="brd-separetor">/</span>
                                  <span class="breadcrumb-item active">Detail Invoice</span>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Bradcaump area -->


         <!-- Start Checkout Area -->
        <section class="our-checkout-area ptb--120 bg__white">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-lg-8">
                        <div class="ckeckout-left-sidebar">
							
							
							<p style="font-weight: bold ">History</p>
							<br>
							<?php $totalharga = 0; ?>
							@foreach($data as $dt)
							<div style="  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2); transition: 0.3s; width: 40%; padding: 2px 16px;">
							<p>Nama Produk : {{$dt['title']}}</p>
							<p>Harga per item : Rp.{{$dt['harga']}}</p>
							<p>Jumalh : {{$dt['jumlah']}} ({{$dt['berat']}} gram)</p>
							<p>Total Berat : {{$dt['total_berat']}} gram</p>
                            <br>
							<p style="font-weight: bold ">Total Harga : Rp. {{$dt['subharga']}}</p>
                            <br>
                            @if($dt['status_pesan'] == 'Transaksi Telah di Batalkan')
							<p style="font-weight: bold ">Transaksi anda : {{$dt['status_pesan']}}</p>
                            <p style="font-weight: bold ">Mohon Maaf Stok Telah Habis, Kami Akan merefund uang anda 1x24 jam</p>
                            @elseif($dt['status_pesan'] == 'Transaksi Telah di terima')
                            <p style="font-weight: bold ">Transaksi anda : {{$dt['status_pesan']}}</p>
                            @endif
							<br>
							</div>
							<br>
                            <?php $totalharga += $dt['subharga']; ?>
							@endforeach
                            <p style="font-weight: bold ">Total Harga Barang : Rp. {{$totalharga}}</p>
                            <p style="font-weight: bold ">Ongkir             : Rp. {{$dt['ongkir']}}</p>
							<p style="font-weight: bold ">Total Belanja      : Rp. {{$dt['total']}}</p>
                            <br>
                            <p>Destinasi</p>
                              @if($resi)
                              @foreach($resi as $rs)
                              <p>date : {{$rs['date']}}</p>
                              <p>desc :{{$rs['desc']}}</p>
                              <br>
                              @endforeach
                              @else
                              <p>Menunggu pengiriman</p>
                              @endif
                              
                        </div>
                    </div>


                    <div class="col-md-4 col-lg-4">
                        <div class="checkout-right-sidebar">
                            <div class="our-important-note">
                                <h2 class="section-title-3">Note :</h2>
                                <p style="font-weight: bold ">Silahkan refresh halaman untuk mendapatkan informasi transaksi terbaru</p>
                                
                                

                            </div>
                            
                            <div class="puick-contact-area mt--60">
                                <h2 class="section-title-3">Quick Contack</h2>
                                <a href="phone:+621355821891">+6281355821891 </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
@endsection
