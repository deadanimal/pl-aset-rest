<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PermohonanBangunanBahagian2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permohonan_bahagian_2', function (Blueprint $table) {
            $table->string('kad_blok')->nullable();
            $table->string('nama_blok')->nullable();
            $table->string('tarikh')->nullable();
            $table->string('pandangan_sudut_dari_hadapan')->nullable();
            $table->string('pandangan_sudut_dari_belakang')->nullable();
            $table->string('kontraktor_utama')->nullable();
            $table->string('kontraktor_1')->nullable();
            $table->string('kontraktor_2')->nullable();
            $table->string('kontraktor_3')->nullable();
            $table->string('bk_kontraktor_utama')->nullable();
            $table->string('bk_kontraktor_1')->nullable();
            $table->string('bk_kontraktor_2')->nullable();
            $table->string('bk_kontraktor_3')->nullable();
            $table->string('perunding_utama')->nullable();
            $table->string('perunding_1')->nullable();
            $table->string('perunding_2')->nullable();
            $table->string('perunding_3')->nullable();
            $table->string('bk_perunding_1')->nullable();
            $table->string('bk_perunding_2')->nullable();
            $table->string('bk_perunding_3')->nullable();

            $table->string('kegunaan_blok')->nullable();
            $table->string('jenis_struktur')->nullable();
            $table->string('no_siri_pendaftaran')->nullable();
            $table->string('penggunaan_tenaga')->nullable();
            $table->string('penggunaan_air')->nullable();

            $table->string('bil_aras_atas_tanah')->nullable();
            $table->string('bil_aras_bawah_tanah')->nullable();
            $table->string('luas_lantai_blok')->nullable();
            $table->string('luas_tapak_blok')->nullable();
            $table->string('id_bahagian1')->nullable();

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
