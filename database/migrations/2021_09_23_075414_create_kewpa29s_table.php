<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKewpa29sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kewpa29s', function (Blueprint $table) {
            $table->id();
            $table->date("date_created")->nullable();
            $table->date("date_modified")->nullable();
            $table->string("pengerusi")->nullable();
            $table->string("ahli1")->nullable();
            $table->string("ahli2")->nullable();
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
        Schema::dropIfExists('kewpa29s');
    }
}
