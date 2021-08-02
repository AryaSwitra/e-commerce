@extends('layouts.main')
@section('container')

        <!-- Start Bradcaump area -->
        <div class="ht__bradcaump__area" style="background: rgba(0, 0, 0, 0) url(images/bg/2.jpg) no-repeat scroll center center / cover ;">
            <div class="ht__bradcaump__wrap">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="bradcaump__inner text-center">
                                <h2 class="bradcaump-title">Pembayaran</h2>
                                <nav class="bradcaump-inner">
                                  <a class="breadcrumb-item" href="index.html">Home</a>
                                  <span class="brd-separetor">/</span>
                                  <span class="breadcrumb-item active">Pembayaran</span>
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
                            <?php 
                            foreach ($dataa as $dt) {
                                $status = $vt->status($dt['id_header_transaksi'])->transaction_status; 
                            }
							 
							
							?>
							
							@if(count($dataa))
							<p style="font-weight: bold ">Silahkan melakukan pembayaran 1x24 jam</p>
							<br>
							
							@foreach($dataa as $dt)
							<div style="  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2); transition: 0.3s; width: 40%; padding: 2px 16px;">
							<p>Order Id : {{$dt['id_header_transaksi']}}</p>
							<p>Total Pembayaran : Rp.{{$dt['total']}}</p>
							<p>Virtual Account : {{$dt['va_account']}}</p>
							<p style="font-weight: bold ">Status :{{ $vt->status($dt['id_header_transaksi'])->transaction_status}}</p>
							<br>
							</div>
							<br>
							@endforeach
                           
                            <a href="{{url('/cancel/'.$dt['id_header_transaksi'])}}">cancel</a>
                         
							
							@else
							<p>Tidak ada antrian pesanan</p>
							@endif
                        </div>
                    </div>


                    <div class="col-md-4 col-lg-4">
                        <div class="checkout-right-sidebar">
                            <div class="our-important-note">
                                <h2 class="section-title-3">Note :</h2>
                                <p style="font-weight: bold ">Silahkan refresh halaman setelah melakukan transaksi pembayaran</p>
                                
                                

                            </div>
                            
                            <div class="puick-contact-area mt--60">
                                <h2 class="section-title-3">Quick Contract</h2>
                                <a href="phone:+6281355821891">+6281355821891</a>
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

