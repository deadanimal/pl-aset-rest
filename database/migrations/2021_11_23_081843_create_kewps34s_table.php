<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKewps34sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kewps34s', function (Blueprint $table) {
            $table->id();
            $table->string('laporan_diterima');
            $table->string('dokumen_laporan');
            $table->boolean('tps_dipatuhi');
            $table->string('peraturan_tps')->nullable();
            $table->string('langkah_mencegah');
            $table->string('rumusan_siasatan');
            $table->boolean('tindakan_surcaj');
            $table->string('syor')->nullable();
            $table->string('justifikasi_surcaj')->nullable();
            $table->string('pengerusi_id')->nullable();
            $table->string('ahli_id')->nullable();
            $table->string('ulasan_pegawai_pengawal');
            $table->string('syor_pegawai_pengawal');
            $table->string('pegawai_bertanggungjawab');
            $table->string('pegawai_langsung');
            $table->string('pegawai_penyelia');
            $table->string('pegawai_pengawal');
            $table->foreignId('kewps32_id');
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
        Schema::dropIfExists('kewps34s');
    }
}
