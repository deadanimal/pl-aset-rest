<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInfoKewps27sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('info_kewps27s', function (Blueprint $table) {
            $table->id();
            $table->integer('kuantiti');
            $table->string('harga_tawaran');
            $table->string('deposit');
            $table->foreignId('kewps27_id');
            $table->foreignId('kewps26_id');
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
        Schema::dropIfExists('info_kewps27s');
    }
}
