<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Produk extends Model
{
    //

    protected $table = "produks";
    protected $primarykey = "id_produk";

    protected $filllable = [
    	"title", "deskripsi", "kategori","jumlah","berat","terjual", "harga","keterangan","gambar","minimal_pemesanan","waktu"
    ];

    static function list_produk(){
    	$data = Produk::all();
    	return $data;
    }

    static function tambah_produk($title,$harga,$deskripsi,$kategori,$gambar,$berat,$keterangan,$minimal_pemesanan,$terjual){
    	Produk::create([
    		"title" => $title,
    		"deskripsi" => $deskripsi,
    		"kategori" => $kategori,
    		"harga" => $harga,
            "berat" => $berat,
            "keterangan" => $keterangan,
            "terjual" => $terjual,
            "minimal_pemesanan" => $minimal_pemesanan,
            "gambar" => $gambar,
    	]);
    }

    static function detail_produk($id_produk){
    	$data = Produk::where("id_produk", $id_produk)->first();

    	return $data;
    }
}
