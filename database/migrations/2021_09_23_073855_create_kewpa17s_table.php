<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKewpa17sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kewpa17s', function (Blueprint $table) {
            $table->id();

            $table->date("date_created")->nullable();
            $table->date("date_modified")->nullable();
            $table->string("pemohon_id")->nullable();
            $table->string("penyerah_id")->nullable();
            $table->string("pelulus_id")->nullable();
            $table->string("penerima_id")->nullable();
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
        Schema::dropIfExists('kewpa17s');
    }
}
