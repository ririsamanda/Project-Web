<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHakAksesTable extends Migration
{
    public function up()
    {
        Schema::create('hak_akses', function (Blueprint $table) {
            $table->id('id_hakakses');
            $table->string('nama_hakakses',50); // Admin / Karyawan
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('hak_akses');
    }
}