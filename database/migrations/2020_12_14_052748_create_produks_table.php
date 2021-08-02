<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProduksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produks', function (Blueprint $table) {
            $table->id('id_produk');
            $table->string('title');
            $table->string('deskripsi');
            $table->string('kategori');
            $table->string('jumlah');
            $table->integer('harga');
            $table->integer('berat');
            $table->string('keterangan');
            $table->integer('terjual');
            $table->string('gambar');
            $table->integer('minimal_pemesanan');
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
        Schema::dropIfExists('produks');
    }
}
