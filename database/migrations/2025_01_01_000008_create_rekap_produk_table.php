<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRekapProdukTable extends Migration
{
    public function up()
    {
        Schema::create('rekap_produk', function (Blueprint $table) {
            $table->id('id_rekap');
            $table->unsignedBigInteger('id_karyawan');
            $table->date('tanggal');
            $table->integer('total_produksi')->default(0);
            $table->integer('total_pengiriman')->default(0);
            $table->enum('periode',['Hari','Bulan','Tahun'])->default('Hari');
            $table->string('keterangan',255)->nullable();
            $table->timestamps();

            $table->foreign('id_karyawan')->references('id_karyawan')->on('karyawan')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('rekap_produk');
    }
}
