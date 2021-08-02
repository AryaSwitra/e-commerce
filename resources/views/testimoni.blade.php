@extends('layouts.main')

@section('container')

 <!-- Start Checkout Area -->
        <section class="our-checkout-area ptb--120 bg__white">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-lg-8">
                        <div class="ckeckout-left-sidebar">
                            <!-- Start Checkbox Area -->
                            <div class="checkout-form">
                                <h2 class="section-title-3">Testimoni</h2>
                                <div class="checkout-form-inner">
                                @if(auth()->user())
                                <form id="input" method="post" action="/posttestimoni">
                                    {{csrf_field()}}
                                    <div class="single-checkout-box">
                                    	<textarea name="komentar" placeholder="berikan masukan anda"></textarea>
                                    </div>
                                </form>
                                @endif
                                </div>
                            <!-- End Checkbox Area -->
                            <!-- Start Payment Way -->
                            
                            <!-- End Payment Way -->
                            <div class="buttons-cart">
			                    <div class="col-md-4 col-lg-4">
			                        <!-- <div class="checkout-right-sidebar"> -->
			                        	<br>
			                            	@if(auth()->user())
			                                <input type="submit" id="btnn" form="input" style="width: 200px; height: 40px" value="submit">
			                            	@endif
			                            <!-- </div> -->
			                    </div>
                   			</div>
                        </div>
                    </div>
                    <p style="font-weight: bold">Kumpulan Testimoni</p> <br>
                    	@foreach($data as $dt)
                    	<p style="font-weight: bold">{{$dt->nama}}</p>
                    	<p>Komentar : {{$dt->komentar}}</p> <br>
                    	@endforeach
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