<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKewps11sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kewps11s', function (Blueprint $table) {
            $table->id();
            $table->integer('tahun');
            $table->string('nama_stor');
            $table->string('ulasan_ketua_jabatan')->nullable();
            $table->string('pegawai_verifikasi1')->nullable();
            $table->string('pegawai_verifikasi2')->nullable();
            $table->string('ketua_jabatan')->nullable();
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
        Schema::dropIfExists('kewps11s');
    }
}
