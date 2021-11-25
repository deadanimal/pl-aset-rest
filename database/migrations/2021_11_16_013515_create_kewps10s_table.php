<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKewps10sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kewps10s', function (Blueprint $table) {
            $table->id();
            $table->integer('tahun');
            $table->string('kementerian');
            $table->string('kategori_stor');
            $table->string('bahagian');
            $table->string('pegawai_verifikasi1');
            $table->string('pegawai_verifikasi2');
            $table->string('pegawai_aset');
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
        Schema::dropIfExists('kewps10s');
    }
}
