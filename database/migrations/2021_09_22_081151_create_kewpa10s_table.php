<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKewpa10sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kewpa10s', function (Blueprint $table) {
            $table->id()->unique();
            $table->string('kewpa10_id')->unique();
            $table->string('tarikh_kerosakan')->nullable();
            $table->string('perihal_kerosakan')->nullable();
            $table->string('tarikh_aduan')->nullable();
            $table->string('jumlah_kos_penyelenggaraan')->nullable();
            $table->string('anggaran_kos')->nullable();
            $table->string('syor_ulasan')->nullable();
            $table->string('tarikh_pegawai')->nullable();
            $table->string('status')->nullable();
            $table->string('ulasan')->nullable();
            $table->date('date_created')->nullable();
            $table->date('date_modified')->nullable();
            $table->string('pengguna_terakhir')->nullable();
            $table->string('pengadu')->nullable();
            $table->string('pegawai_aset')->nullable();
            $table->string('ketua_jabatan')->nullable();
            $table->string('no_siri_pendaftaran')->nullable();

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
        Schema::dropIfExists('kewpa10s');
    }
}


