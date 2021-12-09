<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInfoKewps15sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('info_kewps15s', function (Blueprint $table) {
            $table->id();
            $table->integer('kuantiti_fizikal');
            $table->integer('kuantiti_perbezaan');
            $table->string('justifikasi');
            $table->string('status_kelulusan');
            $table->foreignId('infokewps10_id');
            $table->foreignId('kewps15_id');
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
        Schema::dropIfExists('info_kewps15s');
    }
}
