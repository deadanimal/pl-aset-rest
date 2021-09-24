<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKewatk11sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kewatk11s', function (Blueprint $table) {
            $table->id();
            $table->string("peratusan_diperiksa")->nullable();
            $table->date("created_date")->nullable();
            $table->date("modified_date")->nullable();
            $table->string("kewatk10_id")->nullable();
            $table->string("staff_id")->nullable();
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
        Schema::dropIfExists('kewatk11s');
    }
}
