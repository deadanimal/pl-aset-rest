<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKewps20sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kewps20s', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pemeriksa1');
            $table->string('nama_pemeriksa2');
            $table->string('kuasa_melulus');
            $table->string('kementerian');
            $table->string('kategori_stor');
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
        Schema::dropIfExists('kewps20s');
    }
}
