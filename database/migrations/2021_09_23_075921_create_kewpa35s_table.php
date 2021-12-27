<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKewpa35sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kewpa35s', function (Blueprint $table) {
            $table->id();
            $table->string("laporan_hasil")->nullable();
            $table->string("arahan_tatacara")->nullable();
            $table->string("langkah_mencegah")->nullable();
            $table->string("rumusan_siasatan")->nullable();
            $table->string("syor")->nullable();
            $table->string("justifikasi")->nullable();
            $table->string("ulasan_pegawai")->nullable();
            $table->string("syor_pegawai")->nullable();
            $table->date("date_created")->nullable();
            $table->date("date_modified")->nullable();
            $table->string("pegawai_menjaga")->nullable();
            $table->string("pegawai_penyelia")->nullable();
            $table->string("pegawai_bertanggungjawab")->nullable();
            $table->string("pengerusi")->nullable();
            $table->string("ahli")->nullable();
            $table->string("pegawai_pengawal")->nullable();
            $table->foreignId('kewpa33_id');
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
        Schema::dropIfExists('kewpa35s');
    }
}
