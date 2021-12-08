<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJkrpataf102sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jkrpataf102s', function (Blueprint $table) {
            $table->id();
            $table->string('no_rujukan_laporan');
            $table->integer('tahun_rujukan_laporan');
            $table->string('gambar_aset');
            $table->string('pelan_tapak');
            $table->string('ulasan');
            $table->string('nama_aset');
            $table->string('lokasi_aset');
            $table->string('status_kawasan');
            $table->string('status_pemilikan_tanah');
            $table->string('stuktur_fizikal');
            $table->string('kegunaan_aset');
            $table->date('tarikh_pembinaan');
            $table->string('jenis');
            $table->string('jenama');
            $table->float('kapasiti');
            $table->integer('bilangan_unit');
            $table->string('lain_lain');
            $table->string('harga_perolehan');
            $table->string('nilai_pasaran_semasa');
            $table->string('rumusan');
            $table->string('kaedah_pelupusan');
            $table->string('status_laporan');
            $table->string('no_rujukan_kelulusan');
            $table->integer('from_page');
            $table->integer('to_page');
            $table->foreignId('staff_id');
            $table->foreignId('pegawai_syor')->nullable();
            $table->foreignId('pegawai_pengawal')->nullable();
            $table->foreignId('jkrpataf68_id');
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
        Schema::dropIfExists('jkrpataf102s');
    }
}
