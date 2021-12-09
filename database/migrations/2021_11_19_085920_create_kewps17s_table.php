<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKewps17sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kewps17s', function (Blueprint $table) {
            $table->id();
            $table->string('status_pindahan');
            $table->foreignId('pemohon_id');
            $table->foreignId('pelulus_id');
            $table->foreignId('penyerah_id');
            $table->foreignId('penerima_id');
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
        Schema::dropIfExists('kewps17s');
    }
}
