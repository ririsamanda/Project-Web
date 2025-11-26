<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailPengirimanTable extends Migration
{
    public function up()
    {
        Schema::create('detail_pengiriman', function (Blueprint $table) {
            $table->id('id_detail');
            $table->unsignedBigInteger('id_pengiriman');
            $table->unsignedBigInteger('id_produk');
            $table->integer('jumlah_kirim')->default(0);
            $table->text('keterangan')->nullable();
            $table->timestamps();

            $table->foreign('id_pengiriman')->references('id_pengiriman')->on('pengiriman')->onDelete('cascade');
            $table->foreign('id_produk')->references('id_produk')->on('produk')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('detail_pengiriman');
    }
}
