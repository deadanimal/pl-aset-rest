<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MergeBahujalanIntoJalan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('jalans', function (Blueprint $table) {
            $table->string('lebar_bahu')->nullable();
            $table->string('jenis_bahu')->nullable();
            $table->string('jenis_longkang')->nullable();
            $table->string('lebar_laluan')->nullable();
            $table->string('catatan')->nullable();

            // enable null values
            $table->string('tahun_daftar')->nullable()->change();
            $table->string('nama_jalan')->nullable()->change();
            $table->string('panjang_jalan')->nullable()->change();
            $table->string('lebar_jalan')->nullable()->change();
            $table->string('jenis_jalan')->nullable()->change();
            $table->string('jenis_carriage_way')->nullable()->change();
            $table->string('bilangan_lorong')->nullable()->change();
            $table->string('lebar_lorong')->nullable()->change();
            $table->string('lebar_rezab_jalan')->nullable()->change();
            $table->string('lebar_pembahagi_jalan')->nullable()->change();
            $table->string('jenis_pembahagi_jalan')->nullable()->change();
            $table->string('latitude_mula')->nullable()->change();
            $table->string('longitude_mula')->nullable()->change();
            $table->string('latitude_akhir')->nullable()->change();
            $table->string('longitude_akhir')->nullable()->change();
            $table->string('koordinat_akhir')->nullable()->change();
            $table->string('maklumat_jalan_dari')->nullable()->change();
            $table->string('maklumat_jalan_ke')->nullable()->change();
            $table->string('nama_jalan_dari')->nullable()->change();
            $table->string('nama_jalan_ke')->nullable()->change();
            $table->string('tahun_isytihar')->nullable()->change();
            $table->string('luas')->nullable()->change();
            $table->string('Kos_bina')->nullable()->change();
            $table->string('usia')->nullable()->change();
            $table->foreignId('plpk0102_id')->nullable()->change();
            $table->foreignId('staff_id')->nullable()->change();
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
