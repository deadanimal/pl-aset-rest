<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInfoKewps31sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('info_kewps31s', function (Blueprint $table) {
            $table->id();
            $table->string('kementerian');
            $table->string('hasil_pelupusan');
            $table->string('kos_pengendalian');
            $table->foreignId('kewps20_id');
            $table->foreignId('kewps31_id');
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
        Schema::dropIfExists('info_kewps31s');
    }
}
