<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKewatk7sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kewatk7s', function (Blueprint $table) {
            $table->id();

            $table->string("bahagian")->nullable();
            $table->string("tujuan")->nullable();
            $table->date("created_date")->nullable();
            $table->date("modified_date")->nullable();
            $table->string("pemohon")->nullable();
            $table->string("pengeluar")->nullable();
            $table->string("pemulang")->nullable();
            $table->string("pelulus")->nullable();
            $table->string("penerima")->nullable();
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
        Schema::dropIfExists('kewatk7s');
    }
}
