<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKontraktorLuarPremisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kontraktor_luar_premis', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kontraktor_luar');
            $table->string('bidang_kerja_kontraktor_luar');
            $table->boolean('kontraktor_luar_utama');
            $table->foreignId('data_aset_khusus_binaan_luar_id');
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
        Schema::dropIfExists('kontraktor_luar_premis');
    }
}
