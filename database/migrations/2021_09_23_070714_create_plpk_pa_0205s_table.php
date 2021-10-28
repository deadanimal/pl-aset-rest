<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlpkPa0205sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plpk_pa_0205s', function (Blueprint $table) {
            $table->id();
            $table->string("pemandu")->nullable();
            $table->string("kewpal14_id")->nullable();
            $table->string("pengarah")->nullable();
            $table->date("created_date")->nullable();
            $table->date("modified_date")->nullable();
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
        Schema::dropIfExists('plpk_pa_0205s');
    }
}
