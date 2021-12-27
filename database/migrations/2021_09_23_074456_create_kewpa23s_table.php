<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKewpa23sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kewpa23s', function (Blueprint $table) {
            $table->id();
            $table->string("no_resit")->nullable();
            $table->string("bilangan_item")->nullable();
            $table->string("tarikh")->nullable();
            $table->string("salinan_rekod")->nullable();
            $table->string("ketua_jabatan")->nullable();
            $table->string("kewpa21_id")->nullable();
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
        Schema::dropIfExists('kewpa23s');
    }
}
