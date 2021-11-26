<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKewps30sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kewps30s', function (Blueprint $table) {
            $table->id();
            $table->integer('kuantiti');
            $table->string('harga_simpanan');
            $table->string('deposit');
            $table->foreignId('kewps29_id');
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
        Schema::dropIfExists('kewps30s');
    }
}
