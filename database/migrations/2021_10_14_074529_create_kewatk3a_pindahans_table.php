<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKewatk3aPindahansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kewatk3a_pindahans', function (Blueprint $table) {
            $table->id();
            $table->string("kewatk3a_id")->nullable();
            $table->string("rujukan_kelulusan")->nullable();
            $table->string("tarikh")->nullable();
            $table->string("kaedah")->nullable();
            $table->string("tandatangan")->nullable();
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
        Schema::dropIfExists('kewatk3a_pindahans');
    }
}
