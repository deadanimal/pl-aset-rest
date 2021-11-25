<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTerimaanStokSukuTahunsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('terimaan_stok_suku_tahuns', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kewps3a_id');
            $table->integer('tahun_terima_stok')->nullable();
            $table->integer('kuantiti_terima_stok_pertama')->nullable();
            $table->string('nilai_terima_stok_pertama')->nullable();
            $table->integer('kuantiti_terima_stok_kedua')->nullable();
            $table->string('nilai_terima_stok_kedua')->nullable();
            $table->integer('kuantiti_terima_stok_ketiga')->nullable();
            $table->string('nilai_terima_stok_ketiga')->nullable();
            $table->integer('kuantiti_terima_stok_keempat')->nullable();
            $table->string('nilai_terima_stok_keempat')->nullable();

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
        Schema::dropIfExists('terimaan_stok_suku_tahuns');
    }
}
