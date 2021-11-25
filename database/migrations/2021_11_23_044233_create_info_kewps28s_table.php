<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInfoKewps28sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('info_kewps28s', function (Blueprint $table) {
            $table->id();
            $table->string('kod_penyebut_harga');
            $table->string('harga');
            $table->foreignId('kewps26_id');
            $table->foreignId('kewps28_id');
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
        Schema::dropIfExists('info_kewps28s');
    }
}
