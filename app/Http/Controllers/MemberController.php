<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Produk;
use App\Header_transaksi;
use App\Detail_transaksi;
use App\User;
use APP\Pelanggan;
use DB;
use Carbon\Carbon;
use Auth;
use App\province;
use App\City;
use App\Veritrans\Midtrans;
use App\Veritrans\Veritrans;

class MemberController extends Controller
{
    function profile(){
        $data = \App\Pelanggan::where('email',Auth::user()->email)->get();
        // dd($data['nama']);
        return view('profile',compact('data'));
    }

    function updateprofile(Request $request){
        $data = \App\Pelanggan::where('email',Auth::user()->email)->update([
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => $request->password,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp
        ]);
        return redirect('/profile');
    }

    function do_tambah_cart(Request $request, $id_produk){
        // dd($request->keterangan);
    	$cart = session("cart");
        $mytime = Carbon::now();
    	$produk = Produk::detail_produk($id_produk);
        // dd($produk);
        
    	$cart[$id_produk] = [
        "waktu" => $mytime->toDateTimeString(),
        "id_produk" => $produk['id_produk'],
        "title" =>  $produk["title"], 
        "harga" => $produk["harga"], 
        "gambar" => $produk["gambar"],
        "berat" => $produk["berat"],
        "keterangan" => $request->keterangan,
        "jumlah" => 1,
    ];
    
        session(["cart" => $cart]);

        return redirect("/cart");  
    }

    function cart(){
    	$cart = session("cart");

    	return view("cart")->with('cart', $cart) ;
    }

    function do_hapus_cart($id_produk){
        $cart = session("cart");
        
        $a = $cart[$id_produk];
        
        unset($cart[$id_produk]);

        session(["cart" => $cart]);

        return redirect("/cart");
    }

    function do_tambah_transaksi(Request $request){
        
        $cart = session("cart");
       
        return redirect("/detail_pemesanan");
    }

    function create(Request $request){
        $user = new \App\User;
        
        $email = \App\Pelanggan::where('email',$request->email);
        if ($email) {
            echo "<script>alert('data sudah ada'); window.location = '/login2';</script>";
        }else{
        $user->role = 'pelanggan';
        $user->name = $request->nama;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->remember_token = str_random(60);
        $user->save();

        $request->request->add(['user_id' => $user->id]);
        
        $pelanggan = \App\Pelanggan::create($request->all());  
        }
        
        return redirect('/login2')->with('sukses','data berhasil di input');
    }

    function posttestimoni(Request $request){
        
        $testi = new \App\Testimoni;

        $testi->nama = auth()->user()->name;
        $testi->email = auth()->user()->email;
        $testi->komentar = $request->komentar;
        $testi->status = 2;
        $testi->save();

        return redirect('/testimoni');
    }

   

    function postupdate(Request $request, $id){
        $cart = session('cart');
        // dd($request->input('number'));
        $rowid = $request->input('rowid');
        $qty = $request->input('number');
        // dd($cart[$id]['jumlah']);
        $cart[$id]['jumlah'] = $qty;


        session(["cart" => $cart]);
        
        return redirect("/cart");
    }

    // payment start

    function token(){
        $cart = session('cart');
        $paket = session('paket');
        $data = \App\Pelanggan::where('email', Auth::user()->email)->first('no_hp');
        
        
        $grandtotal = 0;
        $totalberat = 0;

        foreach ($cart as $ct) {
            $total = $ct['harga'] * $ct['jumlah'];
            $berat = $ct['berat'];

            $totalberat += $berat;
            $grandtotal += $total ;
            $grandtotal2 = $grandtotal +  $paket['harga'];
        }
        
        // production
        Midtrans::$serverKey = 'Mid-server-uaqCnJakW4SPfJQLydKH8v2k';
        Midtrans::$isProduction = true;
        // sandbox
       // Midtrans::$serverKey = 'SB-Mid-server-guZ3ImkHre92xlgRWfHDoIdE';
       // Midtrans::$isProduction = false;

        error_log('masuk ke snap token dri ajax');
        $midtrans = new Midtrans;

       $params = array(
            'transaction_details' => array(
                'order_id' => rand(),
                'gross_amount' => $grandtotal2,
            ),
            'customer_details' => array(
                'first_name' => $paket['nama'],
                // 'last_name' => 'pratama',
                'email' => Auth::user()->email,
                'phone' => $data->no_hp,

            ),
            'expiry' => array(
                // 'start_time' => date('Y-m-d H:i:s O'),//date("Y-m-d") date("Y-m-d H:i:s.uZ")
                'unit' => 'hours',
                'duration' => 24,
            ),
             
  
        );
       // dd($params);
      try
        {
            $snap_token = $midtrans->getSnapToken($params);
            // dd($snap_token);
            echo $snap_token;
        } 
        catch (Exception $e) 
        {   
            return $e->getMessage;
        }
    }

    public function postfinish(Request $request)
    {
        // production
        Veritrans::$serverKey = 'Mid-server-uaqCnJakW4SPfJQLydKH8v2k';
        Veritrans::$isProduction = true;
        // sandbox
        // Veritrans::$serverKey = 'SB-Mid-server-guZ3ImkHre92xlgRWfHDoIdE';
        // Veritrans::$isProduction = false;
        $vt = new Veritrans;
        // dd($vt->status($order_id)->transaction_status);

        $transaksi = session('transaksi');
        $cart = session("cart");
        $paket = session('paket');
        // dd($paket);
        $data = \App\Pelanggan::where('email', Auth::user()->email)->first('no_hp');
        $result = $request->input('result_data');
        $result = json_decode($result);
        $order_id = $result->order_id;
        $status = $vt->status($order_id)->transaction_status;
        // dd($result);

        if ($result->payment_type == 'bank_transfer') {
            $bank = $result->va_numbers[0]->bank;
        $va_number = $result->va_numbers[0]->va_number;
        // dd($va_number);
        // dd($cart);
        $payment_type = $result->payment_type;
        $status_message = $result->status_message;

        $id_header_transaksi = $result->order_id;
        foreach($cart as $ct => $val) {
            // dd($val);
            $id = $ct;
            $title = $val["title"];
           
            $a = $val['id_produk'];
            
            $jml = $val['jumlah'];
           
            $nama = $paket['nama'];
            $email = Auth::user()->email;
            $alamat = $paket['alamat']->alamat;
            $total = $result->gross_amount;
            $harga = $val['harga'];
            $subharga = $val['harga'] * $val['jumlah'];
            $berat = $val['berat'];
            $total_berat = $val['berat'] * $val['jumlah'];
            $status = $vt->status($order_id)->transaction_status;
            $va_account = $va_number;
            $no_hp = $data->no_hp;
            $metode_pembayaran = $bank;
            $ongkir = $paket['harga'];
            $kurir = $paket['kurir'];
            $service = $paket['service'];
            $tujuan = $paket['ke'];
            $status_pesan = $status_message;
            if ($val['keterangan'] == true) {
                $keterangan = $val['keterangan'];
            }else{
                $keterangan = '';
            }
            
            // dd($keterangan);
            $resi = '';
            
            Detail_transaksi::tambah_detail_transaksi($id,$title,$id_header_transaksi,$jml,$alamat,$total,$harga,$nama,$email,$status,$status_pesan,$va_account,$subharga,$ongkir,$berat,$total_berat,$no_hp,$metode_pembayaran,$kurir,$service,$tujuan,$resi,$keterangan);
        }
        }
        elseif($result->payment_type == 'echannel'){
            $bank = $result->payment_type;
        $va_number = $result->bill_key;
        $billercode = $result->biller_code;
        // dd($va_number);
        // dd($cart);
        $payment_type = $result->payment_type;
        $status_message = $result->status_message;

        $id_header_transaksi = $result->order_id;
        foreach($cart as $ct => $val) {
            // dd($val);
            $id = $ct;
            $title = $val["title"];
           
            $a = $val['id_produk'];
            
            $jml = $val['jumlah'];
           
            $nama = $paket['nama'];
            $email = Auth::user()->email;
            $alamat = $paket['alamat']->alamat;
            $total = $result->gross_amount;
            $harga = $val['harga'];
            $subharga = $val['harga'] * $val['jumlah'];
            $berat = $val['berat'];
            $total_berat = $val['berat'] * $val['jumlah'];
            $status = $vt->status($order_id)->transaction_status;
            $va_account = $billercode.'/'.$va_number;
            $no_hp = $data->no_hp;
            $metode_pembayaran = $bank.'/ Mandiri Bank';
            $ongkir = $paket['harga'];
            $kurir = $paket['kurir'];
            $service = $paket['service'];
            $tujuan = $paket['ke'];
            $status_pesan = $status_message;
            if ($val['keterangan'] == true) {
                $keterangan = $val['keterangan'];
            }else{
                $keterangan = '';
            }
            
            // dd($keterangan);
            $resi = '';
            
            Detail_transaksi::tambah_detail_transaksi($id,$title,$id_header_transaksi,$jml,$alamat,$total,$harga,$nama,$email,$status,$status_pesan,$va_account,$subharga,$ongkir,$berat,$total_berat,$no_hp,$metode_pembayaran,$kurir,$service,$tujuan,$resi,$keterangan);
        }
        }
        
       
        $transaksi = [
            'order_id' => $order_id,
            'total' => $total, 
            'bank' => $bank, 
            'va_number' => $va_number, 
            'status' => $status,
            'status_message' => $status_message,
            'payment_type' => $payment_type 
        ];

        session(['transaksi' => $transaksi]);
        // dd($transaksi['order_id']);
        session()->forget('cart');
        // dd($request->input('result_data'));

        // return redirect('/finish/'.$order_id);
        return redirect('/menunggu_pembayaran');
    }

    function finish($id){
        // production
        Veritrans::$serverKey = 'Mid-server-uaqCnJakW4SPfJQLydKH8v2k';
        Veritrans::$isProduction = true;
        // sandbox
        // Veritrans::$serverKey = 'SB-Mid-server-guZ3ImkHre92xlgRWfHDoIdE';
        // Veritrans::$isProduction = false;

        $vt = new Veritrans;
        $transaksi = session('transaksi');

        $order_id = $transaksi['order_id'];
        $status = $vt->status($order_id)->transaction_status;

        return view('finish', compact('transaksi','status'));
    }
    // end payment

    function cek_ongkir(Request $request){

          $key = '3c56eda66557b6e0d986f24ab7948756'; 
          $cost_url = 'https://api.rajaongkir.com/starter/cost';
          $cart = session('cart');

          // dd($cost_url);
        

        //Variabel yang valuenya didapat dari request()
        if($request->has('destination') && $request->has('weight') && $request->has('courier')){
            // dd($request->destination);
            
            $name = $request->name;
            $alamat = $request->alamat;
            $data_origin = 329;
            $data_destination = $request->destination;
            $data_province = $request->province_destination;
            // dd($data_province);
            $data_weight = $request->weight;
            $data_courier = $request->courier;
            // dd($data_weight);

            $province_name = Province::where('id','=',$data_province)->first('province');
            $origin_name = City::where('id','=',$data_origin)->first();
            $destination_name = City::where('id','=',$data_destination)->first();

            //logic untuk calculate cost
            $cost = $this->postData($key,$cost_url,$data_origin,$data_destination,$data_weight,$data_courier);
            //$cost->throw();
            dd($cost['rajaongkir']['status']);
                $result_cost = $cost['rajaongkir']['results'][0]['costs'];
            
            
            
        }
        else{
            $name = "";
            $alamat = "";
            $origin_name = "";
            $destination_name = "";
            $data_weight = "";
            $data_courier = "";
            $result_cost = null;
        }            

        //load data provinsi dari database
        $provinces = Province::all();    
        $data_province = $request->province_destination;
        $province_name = Province::where('id','=',$data_province)->first('province');
        
        //load view form
        $alamat_sekarang = \App\Pelanggan::where('nama', Auth::user()->name)->first('alamat');
        // dd($provinces);

        return view('cek_ongkir',compact('provinces','result_cost','name','origin_name','destination_name','data_weight','data_courier','alamat_sekarang','alamat','cart','province_name'));
    }

    function ajax($id){
        $cities = City::where('province_id','=',$id)->pluck('city_name','id');

        return json_encode($cities);
    }

    //function untuk calculate cost 
    private function postData($key, $url,$data_origin,$data_destination,$data_weight,$data_courier){
        // dd($data_origin);
        //retry() maskudnya function untuk retry hit API jika time out sebanyak parameter pertama dan range interval pada parameter kedua dalam milisecon
        //asForm() maksudnya menggunakan application/x-www-form-urlencoded content type biasanya untuk method POST
        //withHeaders() maksudnya parameter header (Jika diminta, masing2 API punya header masing-masing dan yang tidak pakai header)
        return Http::retry(10, 200)->asForm()->withHeaders([            
            'key' => $key
        ])->post($url, [
            'origin' => $data_origin,
            'destination' => $data_destination,
            'weight' => $data_weight,
            'courier' => $data_courier
        ]);
        //setelah $url itu adalah array yaitu parameter wajib yg dibutuhkan ketika meminta POST request
    }

    function detail_pemesanan(){
        $cart = session('cart');
        $paket = session('paket');
        
        $alamat = \App\Pelanggan::where('nama', Auth::user()->name)->first('alamat');
        return view('detail_pemesanan', compact('cart','paket','alamat'));
    }

    function pilihpaket(Request $request){
        
        $cart = session("cart");
        $paket = session('paket');
        // dd($request->all());
        $alamat = \App\Pelanggan::where('nama', Auth::user()->name)->first('alamat');
        $id_user = \App\Pelanggan::where('nama', Auth::user()->name)->first('user_id');
        $paket = [
            'kurir' => $request->kurir,
            'dari'  => $request->dari,
            'ke' => $request->ke,
            'nama' => $request->nama,
            'alamat_tujuan' => $request->alamat_tujuan,
            'berat' => $request->berat,
            'no' => $request->no,
            'service' => $request->service,
            'description' => $request->description,
            'harga' => $request->harga,
            'estimasi' => $request->estimasi,
            'note' => $request->note,
            'alamat' => $alamat,
            'id_user' => $id_user
        ];
      
        session(["paket" => $paket]);

        return redirect("/detail_pemesanan"); 

        
    }

    function cek_resi(){
         // $response = Http::get('http://api.binderbyte.com/v1/track',[
         //    'api_key' => 'df42dee58a724d59936b31c10bdc12ce7013ce6c09bf2f9054565c5d2ff7ec1e',
         //    'courier' => 'jnt',
         //    'awb' => 'JP6961181926'
         // ]);
            $api_key = 'df42dee58a724d59936b31c10bdc12ce7013ce6c09bf2f9054565c5d2ff7ec1e';
            $courier = 'jne';
            $awb = 'CM14817123679';
            $curl = curl_init();

            curl_setopt_array($curl, array(
              CURLOPT_URL => 'https://api.binderbyte.com/v1/track?api_key='.$api_key.'&courier='.$courier.'&awb='.$awb,
              CURLOPT_RETURNTRANSFER => true,
              CURLOPT_ENCODING => '',
              CURLOPT_MAXREDIRS => 10,
              CURLOPT_TIMEOUT => 0,
              CURLOPT_FOLLOWLOCATION => true,
              CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
              CURLOPT_CUSTOMREQUEST => 'GET',
            ));

            $response = curl_exec($curl);

            curl_close($curl);
            echo $response;


            // return $response['data']['history'][0]['date'];
            // return $response->body();
    }

    function get_status(){
        $data = $this->cek_resi();
        // dd($data);
        $json = json_decode($data, true);

        $message = $json['message'];

        if ($message != "Data not found") {
            $status_pesanan = $json['data']['summary']['status'];
            echo $status_pesanan;
        } else {
            echo "Data tidak ditemukan";
        }
    }

    function tracking(){
        $data = $this->cek_resi();
        $json = json_decode($data, true);

        $message = $json['message'];

        if ($message != "Data not found") {
            $status_pesanan = $json['data']['summary']['status'];
            echo $status_pesanan;
            echo "<br>";

            $count = 0;
            $count = count(array($json['data']['history']));
            dd($count);
            echo $count;
            echo "<br>";

            for ($i=0; $i < $count; $i++) {
                echo "(" . $json['data']['history'][$i]['date'] . ") - " . $json['data']['history'][$i]['desc'];
                echo "<br>";
            }

        } else {
            echo "Data tidak ditemukan";
        }
    }

    protected function bayar(){
        return view('bayar');            
    }

    function detail_invoice(Request $request){
        $id = $request->input('id_header_transaksi');
        // dd($id);
        // $a = \App\Detail_transaksi::where('id_header_transaksi',$id)->get('status');
        $data = \App\Detail_transaksi::where('email',Auth::user()->email)->get();
        foreach ($data as $dt) {
            // $id = $dt['id_header_transaksi'];
            // dd($id);
            $data = \App\Detail_transaksi::where('id_header_transaksi',$id)->get();
            $resi = \App\Detail_transaksi::where('id_header_transaksi',$id)->first('resi');
            $kurir = \App\Detail_transaksi::where('id_header_transaksi',$id)->first('kurir');
            // dd($kurir->kurir);

            if($resi->resi == true){
            
                $response = Http::get('http://api.binderbyte.com/v1/track?',[
                    'api_key' => 'df42dee58a724d59936b31c10bdc12ce7013ce6c09bf2f9054565c5d2ff7ec1e',
                    'courier' => $kurir->kurir,
                    'awb' => $resi->resi
                ]);
                
                // $resi = $response->body();
                $resi = $response['data']['history'];
                // dd($resi);
                // echo $resi;
            }else{
                $resi = '';
            }
            
            // dd($resi);
        
            return view('detail_invoice', compact('data','resi'));
        }
        
        
    }

    function menunggu_pembayaran(){
        // $transaksi = session('transaksi');
        // production
        Veritrans::$serverKey = 'Mid-server-uaqCnJakW4SPfJQLydKH8v2k';
        Veritrans::$isProduction = true;
        // sandbox
        // Veritrans::$serverKey = 'SB-Mid-server-guZ3ImkHre92xlgRWfHDoIdE';
        // Veritrans::$isProduction = false;
        $vt = new Veritrans;
        
        // dd($vt);
        $data = \App\Detail_transaksi::where('email', Auth::user()->email)->get();
        foreach ($data as $dt) {
            $id = $dt['id_header_transaksi'];
            // dd($id);
            $status = $vt->status($id)->transaction_status;
        // dd($vt->status($id)->transaction_status);

            if ($status == 'settlement') {
                $update = \App\Detail_transaksi::where('id_header_transaksi',$id)->update([

                'status' => $status
            ]);
               

            }
            elseif($status == 'panding'){
                $update = \App\Detail_transaksi::where('id_header_transaksi',$id)->update([

                'status' => $status
            ]);
            }
            elseif($status == 'expire'){
                $update = \App\Detail_transaksi::where('id_header_transaksi',$id)->update([

                'status' => $status
            ]);
            }
            elseif($status == 'cancel'){
                $update = \App\Detail_transaksi::where('id_header_transaksi',$id)->update([

                'status' => $status
            ]);
            }
            
        }




        // $dataa = \App\Detail_transaksi::where('email', Auth::user()->email)->where('status','pending')->groupBy('id_header_transaksi')->paginate(5);

        $dataa = \App\Detail_transaksi::where('email', Auth::user()->email)->where('status','pending')->groupBy('id_header_transaksi')->paginate(5);

        // dd($id);

        return view('menunggu_pembayaran', compact('dataa','vt','id'));
    }

    function cancel($id){
        // production
        Veritrans::$serverKey = 'Mid-server-uaqCnJakW4SPfJQLydKH8v2k';
        Veritrans::$isProduction = true;
        // sandbox
        // Veritrans::$serverKey = 'SB-Mid-server-guZ3ImkHre92xlgRWfHDoIdE';
        // Veritrans::$isProduction = false;
        $vt = new Veritrans;

        
        $data = \App\Detail_transaksi::where('email', Auth::user()->email)->get();

             // dd($id);
             $vt->cancel($id);
             $status = $vt->status($id)->transaction_status;
             $update = \App\Detail_transaksi::where('id_header_transaksi',$id)->update([

                'status' => $status
            ]);

       

        return redirect('/');
    }
}
