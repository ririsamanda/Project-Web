<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengirimanTable extends Migration
{
    public function up()
    {
        Schema::create('pengiriman', function (Blueprint $table) {
            $table->id('id_pengiriman');
            $table->unsignedBigInteger('id_pelanggan');
            $table->date('tanggal_kirim');
            $table->unsignedBigInteger('id_karyawan'); // yang input pengiriman
            $table->enum('status_pengiriman',['Dikirim','Selesai'])->default('Dikirim');
            $table->timestamps();

            $table->foreign('id_pelanggan')->references('id_pelanggan')->on('pelanggan')->onDelete('cascade');
            $table->foreign('id_karyawan')->references('id_karyawan')->on('karyawan')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('pengiriman');
    }
}
