<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePerundingLuarPremisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perunding_luar_premis', function (Blueprint $table) {
            $table->id();
            $table->string('nama_perunding_luar');
            $table->string('bidang_kerja_perunding_luar');
            $table->boolean('perunding_luar_utama');
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
        Schema::dropIfExists('perunding_luar_premis');
    }
}
