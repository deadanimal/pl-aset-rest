<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PermohonanBangunanBahagian4 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permohonan_bahagian_4', function (Blueprint $table) {
            $table->string('id_blok')->nullable();
            $table->string('kod_binaan_luar')->nullable();
            $table->string('nama_binaan_luar')->nullable();
            $table->string('pandangan_sudut_hadapan')->nullable();
            $table->string('pandangan_sudut_belakang')->nullable();
            $table->string('maklumat_binaan_luar')->nullable();
            $table->string('kontraktor_utama')->nullable();
            $table->string('kontraktor_1')->nullable();
            $table->string('kontraktor_2')->nullable();
            $table->string('kontraktor_3')->nullable();
            $table->string('bk_kontraktor_utama')->nullable();
            $table->string('bk_kontraktor_1')->nullable();
            $table->string('bk_kontraktor_2')->nullable();
            $table->string('bk_kontraktor_3')->nullable();
            $table->string('juru_perunding_utama')->nullable();
            $table->string('juru_perunding_1')->nullable();
            $table->string('juru_perunding_2')->nullable();
            $table->string('juru_perunding_3')->nullable();
            $table->string('bk_juru_perunding_utama')->nullable();
            $table->string('bk_juru_perunding_1')->nullable();
            $table->string('bk_juru_perunding_2')->nullable();
            $table->string('bk_juru_perunding_3')->nullable();

            $table->string('kegunaan_binaan_luar')->nullable();
            $table->string('jenis_struktur')->nullable();
            $table->string('no_siri_pendaftaran')->nullable();
            $table->string('luas_binaan_luar')->nullable();
            $table->string('tahun_siap_bina')->nullable();
            $table->string('penggunaan_tenaga')->nullable();
            $table->string('penggunaan_air')->nullable();
            $table->string('kapasiti_air')->nullable();
            $table->string('pengumpul_data')->nullable();
            $table->string('pengesah_data')->nullable();

            $table->id();
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
        //
    }
}
