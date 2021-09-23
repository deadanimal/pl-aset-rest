<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKewpa7sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kewpa7s', function (Blueprint $table) {
            $table->id()->unique();
            $table->string('kewpa7_id')->unique();
            $table->string('bahagian')->nullable();
            $table->string('lokasi')->nullable();
            $table->string('pegawai_menyediakan')->nullable();
            $table->string('pegawai_mengesahkan')->nullable();
            $table->date('date_created')->nullable();
            $table->date('date_modified')->nullable();

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
        Schema::dropIfExists('kewpa7s');
    }
}
