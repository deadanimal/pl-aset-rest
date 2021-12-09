<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGambarbloksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gambarbloks', function (Blueprint $table) {
            $table->id();
            $table->string('tarikh');
            $table->string('gambar_hadapan');
            $table->string('gambar_belakang');
            $table->integer('from_page');
            $table->integer('to_page');
            $table->foreignId('senarai_blok_bangunan_id');
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
        Schema::dropIfExists('gambarbloks');
    }
}
