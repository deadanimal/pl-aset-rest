<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKewatk25sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kewatk25s', function (Blueprint $table) {
            $table->id();
            $table->string("tatacara_dipatuhi")->nullable();
            $table->string("peraturan_tatacara")->nullable();
            $table->string("langkah_diambil")->nullable();
            $table->string("rumusan_siasatan")->nullable();
            $table->string("tindakan")->nullable();
            $table->string("syor")->nullable();
            $table->string("justifikasi")->nullable();
            $table->string("ulasan_pegawai_pengawal")->nullable();
            $table->string("syor_pegawai_pengawal")->nullable();
            $table->date("created_date")->nullable();
            $table->date("modified_date")->nullable();
            $table->string("pegawai_langsung")->nullable();
            $table->string("pegawai_penyelia")->nullable();
            $table->string("pegawai_bertanggungjawab")->nullable();
            $table->string("pegawai_pengamal")->nullable();
            $table->string("pegawai_syor")->nullable();
            $table->string("pengerusi")->nullable();
            $table->string("ahli1")->nullable();
            $table->string("ahli2")->nullable();
            $table->string("kewatk23_id")->nullable();

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
        Schema::dropIfExists('kewatk25s');
    }
}
