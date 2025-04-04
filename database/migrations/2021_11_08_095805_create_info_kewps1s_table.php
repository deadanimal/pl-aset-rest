<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInfoKewps1sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('info_kewps1s', function (Blueprint $table) {
            $table->id();
            $table->string('no_kod');
            $table->foreignId('kewps1_id')->nullable();
            $table->string('perihal_barang');
            $table->string('unit_pengukuran')->nullable();
            $table->integer('kuantiti_dipesan')->nullable();
            $table->string('kuantiti_do')->nullable();
            $table->integer('kuantiti_diterima')->nullable();
            $table->string('harga_seunit')->nullable();
            $table->string('jumlah_harga')->nullable();
            $table->string('catatan')->nullable();
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
        Schema::dropIfExists('info_kewps1s');
    }
}
