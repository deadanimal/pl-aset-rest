<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKewps14sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kewps14s', function (Blueprint $table) {
            $table->id();
            $table->integer('tahun');
            $table->string('baki_stok_akhir');
            $table->string('stok_sediaada_pertama');
            $table->string('stok_sediaada_kedua');
            $table->string('stok_sediaada_ketiga');
            $table->string('stok_sediaada_keempat');
            $table->string('stok_terima_pertama');
            $table->string('stok_terima_kedua');
            $table->string('stok_terima_ketiga');
            $table->string('stok_terima_keempat');
            $table->string('stok_keluar_pertama');
            $table->string('stok_keluar_kedua');
            $table->string('stok_keluar_ketiga');
            $table->string('stok_keluar_keempat');
            $table->string('stok_semasa_pertama');
            $table->string('stok_semasa_kedua');
            $table->string('stok_semasa_ketiga');
            $table->string('stok_semasa_keempat');
            $table->string('nilai_terima_tahunan');
            $table->string('nilai_keluar_tahunan');
            $table->string('pusingan_stok');
            $table->foreignId('user_id');
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
        Schema::dropIfExists('kewps14s');
    }
}
