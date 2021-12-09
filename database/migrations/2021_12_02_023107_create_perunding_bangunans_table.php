<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePerundingBangunansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perunding_bangunans', function (Blueprint $table) {
            $table->id();
            $table->string('nama_perunding_bangunan');
            $table->string('bidang_kerja_perunding_bangunan');
            $table->boolean('perunding_utama_bangunan');
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
        Schema::dropIfExists('perunding_bangunans');
    }
}
