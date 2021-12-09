<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKontraktorBangunansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kontraktor_bangunans', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kontraktor_bangunan');
            $table->string('bidang_kerja_kontraktor_bangunan');
            $table->boolean('kontraktor_utama_bangunan');
            $table->foreignId('data_aset_khusus_id');
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
        Schema::dropIfExists('kontraktor_bangunans');
    }
}
