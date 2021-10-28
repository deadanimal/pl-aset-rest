<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKewpa21sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kewpa21s', function (Blueprint $table) {
            $table->id();
            $table->date("date_created")->nullable();
            $table->date("date_modified")->nullable();
            $table->string("pegawai_pemeriksa1")->nullable();
            $table->string("pegawai_pemeriksa2")->nullable();
            $table->string("kuasa_melulus")->nullable();
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
        Schema::dropIfExists('kewpa21s');
    }
}
