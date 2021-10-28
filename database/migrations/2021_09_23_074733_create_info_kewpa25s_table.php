<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInfoKewpa25sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('info_kewpa25s', function (Blueprint $table) {
            $table->id();
            $table->string("kuantiti")->nullable();
            $table->string("harga_tawaran")->nullable();
            $table->string("deposit_tender")->nullable();
            $table->string("no_tender")->nullable();
            $table->string("kewpa25_id")->nullable();
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
        Schema::dropIfExists('info_kewpa25s');
    }
}
