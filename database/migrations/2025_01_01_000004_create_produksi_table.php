<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProduksiTable extends Migration
{
    public function up()
    {
        Schema::create('produksi', function (Blueprint $table) {
            $table->id('id_produksi');
            $table->unsignedBigInteger('id_produk');
            $table->integer('jumlah_selesai')->default(0);
            $table->date('tanggal_produksi');
            $table->unsignedBigInteger('id_karyawan'); // yang input
            $table->text('keterangan')->nullable();
            $table->timestamps();

            $table->foreign('id_produk')->references('id_produk')->on('produk')->onDelete('cascade');
            $table->foreign('id_karyawan')->references('id_karyawan')->on('karyawan')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('produksi');
    }
}
