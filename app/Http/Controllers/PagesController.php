<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Produk;
use Auth;
use App\Veritrans\Veritrans;


class PagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
            $kategori = \App\Kategori::all();
            $produk = \App\Produk::paginate(6);
            $slider = \App\Slider::where('active', 1)->get();
            $produks = \App\Produk::orderby('terjual',  'DESC')->take(2)->paginate(6);
            // $terlaris = \App\Produk::where('terjual', 'DESC')->take(3)->get();
            // $isi_terlaris = $terlaris->gambar;
            // dd($produks);

        return view('index', ['produk' => $produk, 'sliders' => $slider, 'kategori' => $kategori, 'produks' => $produks]);
    }

    public function testimoni(){
        $data = \App\Testimoni::where('status',1)->get();
        // dd($data);
        return view('testimoni', compact('data'));
    }

    public function about()
    {
        return view('about');
    }

    public function contact()
    {
        return view('contact');
    }

    public function register()
    {
        return view('/register');
    }

    public function indexadmin()
    {
        return view('/admin/index');
    }

    public function indexsuperadmin()
    {
        return view('/superadmin/index');
    }

    public function login2()
    {
        return view('/auth/login2');
    }

    public function detail_produk($id_produk){
        // dd($id_produk);
        $bungkus = Produk::detail_produk($id_produk);
        // dd($detail);
        $detail[$id_produk] = [
        "id_produk" => $bungkus['id_produk'],
        "title" =>  $bungkus["title"], 
        "harga" => $bungkus["harga"], 
        "gambar" => $bungkus["gambar"],
        "deskripsi" => $bungkus["deskripsi"],
        "keterangan" => $bungkus['keterangan'],
        "jumlah" => $bungkus["jumlah"]
        ];

        return view('detail_produk', ['details' => $detail]);
    }

    public function data(Request $request){
        $produk = \App\Produk::where('title','LIKE','%'.$request->keyword.'%')->paginate(5);

        return view('/ajax/data', ['produks' => $produk]);
    }

    function kategori($nama){
        // dd($nama);
        $produk = \App\Produk::where('kategori','LIKE','%'.$nama.'%')->paginate(5);
        $kategori = \App\kategori::all();
        // dd();

        return view('kategori', ['produks' => $produk, 'kategori' => $kategori]);
    }

    function invoice(){
        // $transaksi = session('transaksi');
        // dd($transaksi);
        // production
        Veritrans::$serverKey = 'Mid-server-uaqCnJakW4SPfJQLydKH8v2k';
        Veritrans::$isProduction = true;
        // sandbox
        // Veritrans::$serverKey = 'SB-Mid-server-guZ3ImkHre92xlgRWfHDoIdE';
        // Veritrans::$isProduction = false;
        $vt = new Veritrans;
        

        $dataa = \App\Detail_transaksi::where('email', Auth::user()->email)->get();

        foreach ($dataa as $dt) {
            $id = $dt['id_header_transaksi'];
            
            $status = $vt->status($id)->transaction_status;
        
            $update = \App\Detail_transaksi::where('id_header_transaksi',$id)->update([

                'status' => $status
            ]);
        }

        
        
        $data = \App\Detail_transaksi::where('email', Auth::user()->email)->where('status','settlement')->paginate(5);
        // dd($data);
        return view('invoice', ['data' => $data]);
    }

    function katalog(){
        $produk = \App\Produk::paginate(3);
        $kategori = \App\kategori::all();

        return view('katalog', compact('produk','kategori'));
    }
}
