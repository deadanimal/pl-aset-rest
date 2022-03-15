<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddBinaanLuarPerBlok extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('permohonan_bahagian_2', function (Blueprint $table) {
            $table->string('bl_kod_binaan_luar')->nullable();
            $table->string('bl_nama_binaan_luar')->nullable();
            $table->string('bl_pandangan_sudut_hadapan')->nullable();
            $table->string('bl_pandangan_sudut_belakang')->nullable();
            $table->string('bl_maklumat_binaan_luar')->nullable();
            $table->string('bl_kontraktor_utama')->nullable();
            $table->string('bl_kontraktor_1')->nullable();
            $table->string('bl_kontraktor_2')->nullable();
            $table->string('bl_kontraktor_3')->nullable();
            $table->string('bl_bk_kontraktor_utama')->nullable();
            $table->string('bl_bk_kontraktor_1')->nullable();
            $table->string('bl_bk_kontraktor_2')->nullable();
            $table->string('bl_bk_kontraktor_3')->nullable();
            $table->string('bl_juru_perunding_utama')->nullable();
            $table->string('bl_juru_perunding_1')->nullable();
            $table->string('bl_juru_perunding_2')->nullable();
            $table->string('bl_juru_perunding_3')->nullable();
            $table->string('bl_bk_juru_perunding_utama')->nullable();
            $table->string('bl_bk_juru_perunding_1')->nullable();
            $table->string('bl_bk_juru_perunding_2')->nullable();
            $table->string('bl_bk_juru_perunding_3')->nullable();
            $table->string('bl_kegunaan_binaan_luar')->nullable();
            $table->string('bl_jenis_struktur')->nullable();
            $table->string('bl_no_siri_pendaftaran')->nullable();
            $table->string('bl_luas_binaan_luar')->nullable();
            $table->string('bl_tahun_siap_bina')->nullable();
            $table->string('bl_penggunaan_tenaga')->nullable();
            $table->string('bl_penggunaan_air')->nullable();
            $table->string('bl_kapasiti_air')->nullable();
            $table->string('bl_pengumpul_data')->nullable();
            $table->string('bl_pengesah_data')->nullable();
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
