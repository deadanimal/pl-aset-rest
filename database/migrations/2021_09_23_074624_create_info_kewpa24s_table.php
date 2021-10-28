<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInfoKewpa24sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('info_kewpa24s', function (Blueprint $table) {
            $table->id();

            $table->string("kuantiti")->nullable();
            $table->string("harga simpanan")->nullable();
            $table->string("kewpa21_id")->nullable();
            $table->string("kewpa24_id")->nullable();
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
        Schema::dropIfExists('info_kewpa24s');
    }
}
