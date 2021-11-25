<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKewps3asTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kewps3as', function (Blueprint $table) {
            $table->id();
            $table->string('nama_stor')->nullable();
            $table->string('perihal_stok')->nullable();
            $table->string('no_kad')->nullable();
            $table->string('unit_pengukuran')->nullable();
            $table->string('kumpulan')->nullable();
            $table->string('pergerakan')->nullable();
            $table->string('gudang_stok')->nullable();
            $table->string('baris_stok')->nullable();
            $table->string('rak_stok')->nullable();
            $table->string('tingkat_stok')->nullable();
            $table->string('petak_stok')->nullable();
            $table->string('kod_lokasi_stok')->nullable();
            $table->foreignId('user_id')->nullable();
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
        Schema::dropIfExists('kewps3as');
    }
}
