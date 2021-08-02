@extends('layouts.main')

@section('container')   
        <!-- Start Bradcaump area -->
        <div class="ht__bradcaump__area" style="background: rgba(0, 0, 0, 0) url(images/bg/2.jpg) no-repeat scroll center center / cover ;">
            <div class="ht__bradcaump__wrap">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="bradcaump__inner text-center">
                                <h2 class="bradcaump-title">Checkout</h2>
                                <nav class="bradcaump-inner">
                                  <a class="breadcrumb-item" href="index.html">Home</a>
                                  <span class="brd-separetor">/</span>
                                  <span class="breadcrumb-item active">Checkout</span>
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
                   <div class="col-md-12">
                        <div class="ckeckout-left-sidebar">
                            <!-- Start Checkbox Area -->
                            <div class="checkout-form">
                                <h2 class="section-title-3">Data Diri</h2>
                                <div class="checkout-form-inner">
                                @foreach($data as $dt)
                                <form method="post" action="{{url('/postupdatecheckout/'.$dt->user_id)}}">
                                    {{csrf_field()}}
                                    <div class="single-checkout-box">
                                        <input name="nama" type="text" value="{{$dt->nama}}">
                                        <input name="email" type="email" value="{{$dt->email}}">
                                    </div>
                                    <div class="single-checkout-box select-option mt--40">
                                        <select name="jenis_kelamin">
                                            <option value="pria">Pria</option>
                                            <option value="wanita">Wanita</option>
                                        </select>
                                        <input name="alamat" type="text" value="{{$dt->alamat}}">
                                    </div>
                                    <div class="single-checkout-box">
                                        <input type="email" placeholder="State*">
                                        <input type="text" placeholder="Zip Code*">
                                    </div>
                                    
                                <button>submit</button>
                                </form>
                                @endforeach
                                </div>
                            </div>
                            <!-- End Checkbox Area -->
                        </div>
                    </div>
                    <div class="col-md-4 col-lg-4">
                        <div class="checkout-right-sidebar">
                            <div class="puick-contact-area mt--60">
                                <h2 class="section-title-3">Quick Contract</h2>
                                <a href="phone:+8801722889963">+012 345 678 102 </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Checkout Area -->
@endsection