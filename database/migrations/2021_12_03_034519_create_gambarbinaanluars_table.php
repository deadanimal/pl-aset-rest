<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGambarbinaanluarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gambarbinaanluars', function (Blueprint $table) {
            $table->id();
            $table->date('tarikh');
            $table->string('gambar_hadapan');
            $table->string('gambar_belakang');
            $table->integer('from_page');
            $table->integer('to_page');
            $table->foreignId('staff_id');
            $table->foreignId('senarai_binaan_luar_id');
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
        Schema::dropIfExists('gambarbinaanluars');
    }
}
