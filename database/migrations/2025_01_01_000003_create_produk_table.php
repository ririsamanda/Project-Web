<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdukTable extends Migration
{
    public function up()
    {
        Schema::create('produk', function (Blueprint $table) {
            $table->id('id_produk');
            $table->string('kode_produk')->nullable();
            $table->string('nama_produk',100);
            $table->string('kategori',100)->nullable();
            $table->string('satuan',50)->nullable();
            $table->decimal('harga',12,2)->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('produk');
    }
}
