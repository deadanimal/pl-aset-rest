<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJkrpataf104sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jkrpataf104s', function (Blueprint $table) {
            $table->id();
            $table->string('no_rujukan');
            $table->date('tarikh');
            $table->string('nama_aset_roboh');
            $table->string('no_daftar_roboh');
            $table->date('tarikh_pelupusan_roboh');
            $table->string('nama_aset_jualan');
            $table->string('no_daftar_jualan');
            $table->date('tarikh_pelupusan_jualan');
            $table->string('nama_aset_pindah_milik');
            $table->string('no_daftar_pindah_milik');
            $table->date('tarikh_pelupusan_pindah_milik');
            $table->string('nama_aset_tukar_guna');
            $table->string('no_daftar_tukar_guna');
            $table->date('tarikh_pelupusan_tukar_guna');
            $table->foreignId('staff_id');
            $table->foreignId('pegawai_pelupusan1');
            $table->foreignId('pegawai_pelupusan2');
            $table->foreignId('penentusahan');
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
        Schema::dropIfExists('jkrpataf104s');
    }
}
