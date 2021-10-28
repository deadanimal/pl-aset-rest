<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInfoKewpa29sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('info_kewpa29s', function (Blueprint $table) {
            $table->id();

            $table->string("kod_penyebut")->nullable();
            $table->string("harga")->nullable();
            $table->string("no_sebut_harga")->nullable();
            $table->string("kewpa29_id")->nullable();
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
        Schema::dropIfExists('info_kewpa29s');
    }
}
