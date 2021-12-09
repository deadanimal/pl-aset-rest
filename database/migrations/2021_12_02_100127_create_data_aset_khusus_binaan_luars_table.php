<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataAsetKhususBinaanLuarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_aset_khusus_binaan_luars', function (Blueprint $table) {
            $table->id();
            $table->string('nama_premis');
            $table->string('kod_binaan_luar');
            $table->string('jenis_binaan_luar');
            $table->string('nama_binaan_luar');
            $table->string('kegunaan_binaan_luar');
            $table->string('jenis_struktur');
            $table->string('no_siri_pendaftaran');
            $table->integer('tahun_siap_bina');
            $table->float('penggunaan_tenaga');
            $table->float('penggunaan_air');
            $table->float('luas_binaan_luar');
            $table->float('kapasiti_air');
            $table->integer('from_page');
            $table->integer('to_page');
            $table->foreignId('staff_id');
            $table->foreignId('senarai_binaan_luar_id');
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
        Schema::dropIfExists('data_aset_khusus_binaan_luars');
    }
}
