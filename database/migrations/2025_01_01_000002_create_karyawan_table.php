<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKaryawanTable extends Migration
{
    public function up()
    {
        Schema::create('karyawan', function (Blueprint $table) {
            $table->id('id_karyawan');
            $table->string('nama_karyawan', 100);
            $table->string('username', 50)->unique();
            $table->string('password');
            $table->unsignedBigInteger('id_hakakses');
            $table->string('jabatan', 100)->nullable();
            $table->timestamps();

            $table->foreign('id_hakakses')->references('id_hakakses')->on('hak_akses')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('karyawan');
    }
}
