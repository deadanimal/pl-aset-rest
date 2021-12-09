<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKewps13sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kewps13s', function (Blueprint $table) {
            $table->id();
            $table->year('tahun');
            $table->integer('stok_tidak_diverifikasi');
            $table->float('peratusan_diverifikasi');
            $table->integer('jumlah_stok_A');
            $table->integer('jumlah_stok_B');
            $table->integer('jumlah_stok_C');
            $table->integer('jumlah_stok_D');
            $table->integer('jumlah_stok_E');
            $table->integer('jumlah_stok_F');
            $table->integer('jumlah_kesuluruhan');
            $table->foreignId('user_id');
            $table->foreignId('infokewps10_id');
            $table->foreignId('kewps3a_id');
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
        Schema::dropIfExists('kewps13s');
    }
}
