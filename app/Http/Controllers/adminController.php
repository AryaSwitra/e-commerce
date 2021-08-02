<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Http;
use App\Veritrans\Veritrans;

class adminController extends Controller
{

    public function produk(Request $request){
    	if ($request->has('keyword')) 
    	{
    		$produks = \App\Produk::where('title','LIKE','%'.$request->keyword.'%')->get();
    	}
    	else
    	{
    		$produks = \App\Produk::all();
    	}
    	
    	// dd($produks);
    	return view('/admin/produk', ['produks' => $produks]);
    }	

    // edit function
    public function edit_data_produk($id){

        $datas = \App\Produk::where('id_produk',$id)->get();
        $kategoris = \App\Kategori::all();
        return view('/admin/edit_data_produk', ['datas' => $datas,'kategori' => $kategoris]);
    }

    public function edit_data_kategori($id){

        $kategoris = \App\Kategori::where('id_kategori',$id)->get();

        return view('/admin/edit_data_kategori', ['kategori' => $kategoris]);
    }

     public function edit_data_pelanggan($id){

        $datas = \App\Pelanggan::where('id',$id)->get();
        return view('/admin/edit_data_pelanggan', ['datas' => $datas]);
    }

    public function edit_data_slider($id){

        $datas = \App\Slider::where('id',$id)->get();
        return view('/admin/edit_data_slider', ['datas' => $datas]);
    }

    //delete
     public function delete_data_produk($id){

        $datas = \App\Produk::where('id_produk',$id)->delete();
        return redirect('/admin/produk');
    }

    public function delete_data_kategori($id){

        $kategoris = \App\Kategori::where('id_kategori',$id)->delete();

        return redirect('/admin/kategori');
    }

    public function delete_data_pelanggan($id){
        // dd($id);
        \App\User::where('id',$id)->delete();
        \App\Pelanggan::where('user_id',$id)->delete();


        return redirect('/admin/data_pelanggan');
    }

    public function delete_data_slider($id){

        $datas = \App\Slider::where('id',$id)->delete();
        return redirect('/admin/slider');
    }

    // update function
    public function update_data_kategori(Request $request){
        \App\kategori::where('id_kategori',$request->id_kategori)->update([
            'nama_kategori' => $request->kategori,
        ]);

        return redirect('/admin/kategori');
    }

    public function update_data_slider(Request $request){
        $file = $request->file('gambar');
        $folder = 'images';

        if ($file == true) {
            $file->move($folder,$file->getClientOriginalName());
            \App\Slider::where('id',$request->id)->update([
            'title' => $request->title,
            'uploader' => $request->uploader,
            'gambar' => $file->getClientOriginalName()
        ]);
        }
        else{
            \App\Slider::where('id',$request->id)->update([
            'title' => $request->title,
            'uploader' => $request->uploader
            ]);
        }
        


        return redirect('/admin/slider');
    }

    public function update_data_produk(Request $request){
        // dd($request->id);
        // $this->validate($request, ['gambar' => 'required|file|image|mimes:jpeg,png,jpg|max:2048']);

        $file = $request->file('gambar');
        $folder = 'images';
        // dd($file);

        
        if ($file == true) {
            $file->move($folder,$file->getClientOriginalName());
            \App\Produk::where('id_produk',$request->id)->update([
            'title' => $request->title,
            'deskripsi' => $request->deskripsi,
            'kategori' => $request->kategori,
            'jumlah' => $request->jumlah,
            'harga' => $request->harga,
            'berat' => $request->berat,
            'gambar' => $file->getClientOriginalName(),
            'minimal_pemesanan' => $request->minimal_pemesanan
        ]);
        }
        else{
            \App\Produk::where('id_produk',$request->id)->update([
            'title' => $request->title,
            'deskripsi' => $request->deskripsi,
            'kategori' => $request->kategori,
            'jumlah' => $request->jumlah,
            'harga' => $request->harga,
            'berat' => $request->berat,
            'minimal_pemesanan' => $request->minimal_pemesanan
            ]);
        }
        

        return redirect('/admin/produk');
    }

    public function update_data_pelanggan(Request $request){
        // dd($request->jenis_kelamin);
        \App\Pelanggan::where('user_id',$request->user_id)->update([
            'nama' => $request->nama,
            'email' => $request->email,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat' => $request->alamat
        ]);
        \App\User::where('id',$request->user_id)->update([
            'name' => $request->nama,
            'email' => $request->email,
        ]);

        return redirect('/admin/data_pelanggan');
    }

    

    public function tambah_produk(){
        $kat = \App\Kategori::all();

    	return view('/admin/add_produk', ['kategori' => $kat]);
    }

    public function createProduk(Request $request){
        // dd($request->keterangan);

        $this->validate($request, ['gambar' => 'required|file|image|mimes:jpeg,png,jpg|max:2048']);

        $file = $request->file('gambar');
        $folder = 'images';

        $file->move($folder,$file->getClientOriginalName());

    	$produk = new \App\Produk;

    	$produk->title = $request->title;
    	$produk->deskripsi = $request->deskripsi;
    	$produk->kategori = $request->kategori;
        $produk->jumlah = $request->jumlah;
        $produk->berat = $request->berat;
        $produk->minimal_pemesanan = $request->minimal_pemesanan;
    	$produk->harga = $request->harga;
        $produk->keterangan = $request->keterangan;
        $produk->gambar = $file->getClientOriginalName();
    	$produk->save();

       
    	return redirect('/admin/produk')->with('sukses','produk baru berhasil di tambahkan!');
    }

    public function kategori(Request $request){

        if ($request->has('keyword')) 
        {
            $kategoris = \App\Kategori::where('nama_kategori','LIKE','%'.$request->keyword.'%')->get();
        }
        else
        {
            $kategoris = \App\Kategori::all();
        }
     
        return view('/admin/kategori', ['kategoris' => $kategoris]);
    }

    public function tambah_kategori(){
        return view('/admin/add_kategori');
    }

    public function createKategori(Request $request){
        $kat = new \App\kategori;

        $kat->nama_kategori = $request->kategori;
        $kat->save();

        return redirect('/admin/kategori');
    }

    public function data_pelanggan(Request $request){

        if ($request->has('search')) 
        {
            $dts = \App\Pelanggan::where('nama','LIKE','%'.$request->search.'%')->get();
        }
        else
        {
            $dts = \App\Pelanggan::all();
        }
        
        // dd($datas);
        return view('/admin/data_pelanggan', ['dts' => $dts]);
    }

    public function testimonial(Request $request){
        if ($request->has('search')) 
        {
            $dts = \App\Testimoni::where('nama','LIKE','%'.$request->search.'%')->get();
        }
        else
        {
            $dts = \App\Testimoni::where('status', 1)->get();
        }
        
        // dd($datas);
        return view('/admin/testimonial', ['dts' => $dts]);
    }

     public function testimonial_baru(Request $request){
        if ($request->has('search')) 
        {
            $data = \App\Testimoni::where('nama','LIKE','%'.$request->search.'%')->get();
        }
        else
        {
            $data = \App\Testimoni::where('status', 2)->get();
        }
        
        // dd($datas);
        return view('/admin/testimonial_baru', ['data' => $data]);
    }

    public function acc_testimonial($id){
        \App\Testimoni::where('id',$id)->update([
            'status' => 1
        ]);

        // \App\Testimoni::where('id', $id)->delete();

        return redirect('/admin/testimonial_baru');
    }

    public function slider(Request $request){
        if ($request->has('search')) 
        {
            $data = \App\Slider::where('title','LIKE','%'.$request->search.'%')->get();
        }
        else
        {
            $data = \App\Slider::all();
        }
        return view('/admin/slider', ['datas' => $data]);
    }

    public function form_slider(){
        return view('/admin/add_slider');
    }

    public function postslider(Request $request){
        
        $this->validate($request, ['foto' => 'required|file|image|mimes:jpeg,png,jpg|max:2048']);

        $file = $request->file('foto');
        $penyimpanan = 'images';
        $file->move($penyimpanan,$file->getClientOriginalName());
        
        $slider = new \App\Slider;
        
        $slider->title = $request->title;
        $slider->foto = $file->getClientOriginalName();
        $slider->active = 0;
        $slider->uploader = \Auth::user()->name;
        $slider->save();

        return redirect('/admin/slider');
    }

    public function active_slider($id){
        \App\Slider::where('id', $id)->update([
            'active' => 1
        ]);

        return redirect('admin/slider');
    }

    public function unactive_slider($id){
        \App\Slider::where('id', $id)->update([
            'active' => 0
        ]);

        return redirect('admin/slider');
    }

    public function data_produk(Request $request){
        $produk = \App\Produk::where('title','LIKE','%'.$request->keyword.'%')->get();

        return view('/ajax/data_produk', ['produks' => $produk]);
    }

    public function data_kategori(Request $request){
        // dd($request->keyword);
        $kategoris = \App\Kategori::where('nama_kategori','LIKE','%'.$request->keyword.'%')->get();

        return view('/ajax/data_kategori', ['kategoris' => $kategoris]);
    }

    public function cari_data_admin(Request $request){
        // dd($request->keyword);
        // $datas = \App\User::where('name','LIKE','%'.$request->keyword.'%')->get();

        $datas = \App\Admin::where('nama','LIKE','%'.$request->keyword.'%')->get();

        return view('/ajax/data_admin', ['datas' => $datas]);
    }

     public function cari_data_pelanggan(Request $request){
        // dd($request->keyword);
        // $datas = \App\User::where('name','LIKE','%'.$request->keyword.'%')->get();

        $datas = \App\Pelanggan::where('nama','LIKE','%'.$request->keyword.'%')->get();

        return view('/ajax/data_pelanggan', ['dts' => $datas]);
    }

    public function cari_testimonial(Request $request){
        // dd($request->keyword);
        // $datas = \App\User::where('name','LIKE','%'.$request->keyword.'%')->get();

        $datas = \App\Testimoni::where('nama','LIKE','%'.$request->keyword.'%')->where('status', 1)->get();

        return view('/ajax/data_testimonial', ['dts' => $datas]);
    }

    public function cari_testimonial_baru(Request $request){
        // dd($request->keyword);
        // $datas = \App\User::where('name','LIKE','%'.$request->keyword.'%')->get();

        $datas = \App\Testimoni::where('nama','LIKE','%'.$request->keyword.'%')->where('status', 2)->get();

        return view('/ajax/data_testimonial_baru', ['data' => $datas]);
    }

    public function cari_slider(Request $request){
        $datas = \App\Slider::where('title','LIKE','%'.$request->keyword.'%')->get();

        return view('/ajax/data_slider', ['datas' => $datas]);
    }

    public function invoice(){
        // production
        Veritrans::$serverKey = 'Mid-server-uaqCnJakW4SPfJQLydKH8v2k';
        Veritrans::$isProduction = true;
        // sandbox
        // Veritrans::$serverKey = 'SB-Mid-server-guZ3ImkHre92xlgRWfHDoIdE';
        // Veritrans::$isProduction = false;
        $vt = new Veritrans;
        $data = \App\Detail_transaksi::paginate(5);

        return view('/admin.invoice', ['data' => $data, 'vt' => $vt]);
    }

    public function acc_pembayaran($id){

        \App\Detail_transaksi::where('id_header_transaksi', $id)->update([
            'status_pesan' => 'Transaksi Telah di terima'
        ]);
        $id_produk = \App\Detail_transaksi::where('id_header_transaksi',$id)->where('status_pesan','Transaksi Telah di terima')->first('id_produk');
        $data = \App\Detail_transaksi::where('id_header_transaksi',$id)->get();
        

        // dd($data);
        foreach ($data as $dt) {
            $id_pesanan = $dt['id_produk'];

            $penjualan = \App\Detail_transaksi::where('id_header_transaksi',$id)->where('status_pesan','Transaksi Telah di terima')->where('id_produk', $id_pesanan)->first('jumlah');

            $jmlh_produk = \App\Produk::where('id_produk',$id_pesanan)->first('jumlah');

            $terjual = \App\Produk::where('id_produk',$id_pesanan)->first('terjual');
            // dd($dt);
            \App\Produk::where('id_produk', $id_pesanan)->update([
            'jumlah' => $jmlh_produk->jumlah - $penjualan->jumlah,
            'terjual' => $terjual->terjual + $penjualan->jumlah
        ]);

        }
        

        return redirect('/admin/invoice');
    }

    public function cancel_pembayaran($id){
        \App\Detail_transaksi::where('id_header_transaksi', $id)->update([
            'status_pesan' => 'Transaksi Telah di Batalkan'
        ]);

        return redirect('/admin/invoice');
    }

    public function detail_pesanan(Request $request,$id){
        // $resi = session('resi');
        // dd($request->all());
        $data = \App\Detail_transaksi::where('id_header_transaksi',$id)->get();
        $data2 = \App\Detail_transaksi::where('id_header_transaksi',$id)->groupBy('id_header_transaksi')->get();
        $data3 = \App\Detail_transaksi::where('id_header_transaksi',$id)->first('resi');
        $kurir = \App\Detail_transaksi::where('id_header_transaksi',$id)->first('kurir');

        // $detail = $this->cek_resi();
        if($request->has('resi')){
            \App\Detail_transaksi::where('id_header_transaksi',$id)->update([
                'resi' => $request->input('resi')
            ]);
                $response = Http::get('http://api.binderbyte.com/v1/track?',[
                    'api_key' => 'df42dee58a724d59936b31c10bdc12ce7013ce6c09bf2f9054565c5d2ff7ec1e',
                    'courier' => $kurir->kurir,
                    'awb' => $request->input('resi')
                ]);
                
                // $resi = $response->body();
                $resi = $response['data']['history'];
                // dd($resi);
                // echo $resi;
        }elseif($data3->resi){
            $response = Http::get('http://api.binderbyte.com/v1/track?',[
                    'api_key' => 'df42dee58a724d59936b31c10bdc12ce7013ce6c09bf2f9054565c5d2ff7ec1e',
                    'courier' => $kurir->kurir,
                    'awb' => $data3->resi
                ]);
                
                // $resi = $response->body();
                $resi = $response['data']['history'];
        }else{
            $resi = '';
        }
        

        return view('/admin/detail_pesanan', compact('data','data2','resi'));
    }

    function cek_resi(Request $request,$id){
         // $response = Http::get('http://api.binderbyte.com/v1/track',[
         //    'api_key' => 'df42dee58a724d59936b31c10bdc12ce7013ce6c09bf2f9054565c5d2ff7ec1e',
         //    'courier' => 'jnt',
         //    'awb' => 'JP6961181926'
         // ]);
        // dd($request->input('resi'));
            // $api_key = 'df42dee58a724d59936b31c10bdc12ce7013ce6c09bf2f9054565c5d2ff7ec1e';
            // $courier = 'jne';
            // $awb = $request->input('resi');
            // $curl = curl_init();

            // curl_setopt_array($curl, array(
            //   CURLOPT_URL => 'https://api.binderbyte.com/v1/track?api_key='.$api_key.'&courier='.$courier.'&awb='.$awb,
            //   CURLOPT_RETURNTRANSFER => true,
            //   CURLOPT_ENCODING => '',
            //   CURLOPT_MAXREDIRS => 10,
            //   CURLOPT_TIMEOUT => 0,
            //   CURLOPT_FOLLOWLOCATION => true,
            //   CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            //   CURLOPT_CUSTOMREQUEST => 'GET',
            // ));

            // $response = curl_exec($curl);

            // curl_close($curl);
            // // echo $response;

            // dd($id);
            if ($request->has('resi')) {
                $resi = session('resi');

                $response = Http::get('http://api.binderbyte.com/v1/track?',[
                    'api_key' => 'df42dee58a724d59936b31c10bdc12ce7013ce6c09bf2f9054565c5d2ff7ec1e',
                    'courier' => 'jne',
                    'awb' => $request->input('resi')
                ]);
                $date = $response['data']['history'][0]['date'];
                $desc = $response['data']['history'][0]['desc'];
                $all = $response;
                // dd($response);
                $resi = ['data_respon' => $response->body()];
                // dd($resi);
                session(["resi" => $resi]);
            }
            else{
                $resi = ['data_respon' => ''];
                // dd($resi);
                session(["resi" => $resi]);
            }
            
            // dd($resi);
            return redirect('/admin/detail_pesanan/'.$id);
            // return redirect('/admin/detail_pesanan/');
            // return $response->body();
            // return view('/admin/detail_pesanan', compact('all'));
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

}
