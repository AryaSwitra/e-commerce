@extends('layouts.main')

@section('container')

        <!-- Start Bradcaump area -->
        <div class="ht__bradcaump__area" style="background: rgba(0, 0, 0, 0) url(images/bg/2.jpg) no-repeat scroll center center / cover ;">
            <div class="ht__bradcaump__wrap">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="bradcaump__inner text-center">
                                <h2 class="bradcaump-title">About Us</h2>
                                <nav class="bradcaump-inner">
                                  <a class="breadcrumb-item" href="{{url('/')}}">Home</a>
                                  <span class="brd-separetor">/</span>
                                  <span class="breadcrumb-item active">About Us</span>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Bradcaump area --> 
        <!-- Start Our Store Area -->
        <section class="htc__store__area ptb--120 bg__white">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section__title section__title--2 text-center">
                            <h2 class="title__line">COMPANY PROFILE</h2>
                            <p>Berawal dari sebuah usaha dalam lingkup kecil yang mempunyai pengalaman dalam bidang pembangunan renovasi rumah tinggal, sekarang berkembang menjadi sebuah perusahaan yang bergerak dibidang Design Arsitektur, General Contractor, Renovasi, Bangun baru, InteriorDesign dan pembuatan produk Furniture untuk Hotel, Swalayan, Rumah, Gedung Kantor, Ruko,Restaurant, Gudang serta Pabrik.Dengan didukung tenaga tenaga professional dan terlatih dalam bidangnya maka PT. RejekiGraha Cipta selalu mengutamakan kualitas dana harga yang terbaik untuk membuat seluruh client dari PT. Rejeki Graha Cipta merasa puas.Banyak Gedung, Ruko, Rumah, Gudang yang telah kami kerjakan baik yang dimulai dari desainatau renovasi atau bangun baru atau Desain Interior serta pembuatan furniture. Selain itu Bukanhanya bangunan dan interior saja yang kami tanggani tetapi kami juga menangani juga pekerjaan mekanikal & electrical dari suatu gedung, seperti misalnya pekerjaan listrik, instalasi telepon,instalasi kabel data, security-system, maupun instalasi CCTV.Dengan berbekal keahlian pada bidangnya maka PT. Rejeki Graha Cipta sangat yakin dapatmewujudkan tempat impian anda menjadi kenyataan dan sesuai standard, kualitas terbaik sertaharga yang terjangkau.</p>
                        </div>
                    </div>
                </div>
            </div>
             <section class="htc__store__area ptb--120 bg__white">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="section__title section__title--2 text-center">
                                <h2 class="title__line">Visi</h2>
                                <p>Menjadikan PT Rejeki Graha Cipta, selalu mendapatkan prioritas dari hati pelanggan dari berbagai kalangan</p>
                            </div>
                        </div>
                    </div>
                </div>
                <section class="htc__store__area ptb--120 bg__white">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="section__title section__title--2 text-center">
                                    <h2 class="title__line">Misi</h2>
                                    <p>Membuat kepuasan pelanggan sehingga kepercayaan tumbuh dan membuatnya menjadi pelanggan setia Memberikan kepercayaan dengan berdasarkan Kualitas, Ketepatan, serta Harga yang bersaing.</p>
                                </div>
                                <div class="store__btn">
                                    <a href="{{url('/contact')}}">contact us</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </section>
        </section>
        <!-- End Our Store Area -->
@endsection

@section('footer')
        

@endsection
</body>

</html>