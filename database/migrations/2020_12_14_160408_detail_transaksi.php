<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DetailTransaksi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('detail_transaksi', function (Blueprint $table){
        $table->id('id_detail_transaksi');
        $table->string('title');
        $table->foreignId('id_produk');
        $table->foreignId('id_header_transaksi');
        $table->integer('jumlah');
        $table->string('alamat');
        $table->string('total');
        $table->integer('harga');
        $table->integer('subharga');
        $table->integer('ongkir');
        $table->integer('berat');
        $table->integer('total_berat');
        $table->string('nama');
        $table->string('email');
        $table->string('no_hp');
        $table->string('metode_pembayaran');
        $table->string('status');
        $table->string('status_pesan');
        $table->string('va_account');
        $table->string('kurir');
        $table->string('service');
        $table->string('tujuan');
        $table->string('resi');
        $table->string('keterangan');
        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('detail_transaksi');
    }
}