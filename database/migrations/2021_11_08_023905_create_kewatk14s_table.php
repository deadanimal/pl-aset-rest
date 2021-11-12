<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKewatk14sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kewatk14s', function (Blueprint $table) {
            $table->id();
            $table->string("tahun")->nullable();
            $table->string("hi_kuantiti")->nullable();
            $table->string("hi_kos")->nullable();
            $table->string("hbi_kuantiti")->nullable();
            $table->string("hbi_kos")->nullable();
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
        Schema::dropIfExists('kewatk14s');
    }
}
