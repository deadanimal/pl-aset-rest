<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInfoKewps20sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('info_kewps20s', function (Blueprint $table) {
            $table->id();
            $table->integer('kuantiti');
            $table->string('keadaan_stok');
            $table->string('kaedah_pelupusan');
            $table->string('justifikasi');
            $table->string('keputusan');
            $table->foreignId('kewps20_id');
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
        Schema::dropIfExists('info_kewps20s');
    }
}
