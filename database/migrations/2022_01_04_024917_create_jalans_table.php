<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJalansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jalans', function (Blueprint $table) {
            $table->id();
            $table->string('tahun_daftar');
            $table->string('nama_jalan');
            $table->string('panjang_jalan');
            $table->string('lebar_jalan');
            $table->string('jenis_jalan');
            $table->string('jenis_carriage_way');
            $table->string('bilangan_lorong');
            $table->string('lebar_lorong');
            $table->string('lebar_rezab_jalan');
            $table->string('lebar_pembahagi_jalan');
            $table->string('jenis_pembahagi_jalan');
            $table->string('latitude_mula');
            $table->string('longitude_mula');
            $table->string('latitude_akhir');
            $table->string('longitude_akhir');
            $table->string('koordinat_akhir');
            $table->string('maklumat_jalan_dari');
            $table->string('maklumat_jalan_ke');
            $table->string('nama_jalan_dari');
            $table->string('nama_jalan_ke');
            $table->string('tahun_isytihar');
            $table->string('luas');
            $table->string('Kos_bina');
            $table->string('usia');
            $table->foreignId('plpk0102_id');
            $table->foreignId('staff_id');
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
        Schema::dropIfExists('jalans');
    }
}
