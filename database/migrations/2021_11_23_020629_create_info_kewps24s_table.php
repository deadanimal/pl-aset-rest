<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInfoKewps24sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('info_kewps24s', function (Blueprint $table) {
            $table->id();
            $table->string('harga_tawaran');
            $table->string('deposit_tender');
            $table->foreignId('kewps24_id');
            $table->foreignId('kewps23_id');
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
        Schema::dropIfExists('info_kewps24s');
    }
}
