<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detail_transaksi extends Model
{
    protected $table = 'detail_transaksi';
    protected $primaryKey = 'id_detail_transaksi';

    protected $fillable =  ['id_header_transaksi', 'title', 'id_produk', 'jumlah','alamat','total','harga','subharga','ongkir','berat','total_berat','nama','email','no_hp','metode_pembayaran','status','status_pesan','va_account','kurir','service','tujuan','resi','keterangan'];

    static function tambah_detail_transaksi($id_produk, $title, $id_header_transaksi, $jumlah, $alamat, $total, $harga, $nama, $email, $status, $status_pesan, $va_account, $subharga, $ongkir, $berat, $total_berat, $no_hp, $metode_pembayaran, $kurir, $service, $tujuan, $resi, $keterangan){
    	Detail_transaksi::create([
    		'id_produk' => $id_produk,
            'title' => $title,
    		'id_header_transaksi' => $id_header_transaksi,
    		'jumlah' => $jumlah,
            'alamat' => $alamat,
            'total' => $total,
            'harga' => $harga,
            'subharga' => $subharga,
            'ongkir' => $ongkir,
            'berat' => $berat,
            'total_berat' => $total_berat,
            'nama' => $nama,
            'email' => $email,
            'no_hp' => $no_hp,
            'metode_pembayaran' => $metode_pembayaran,
            'status' => $status,
            'status_pesan' => $status_pesan,
            'va_account' => $va_account,
            'kurir' => $kurir,
            'service' => $service,
            'tujuan' => $tujuan,
            'resi' => $resi,
            'keterangan' => $keterangan,
    	]);
    }
}
