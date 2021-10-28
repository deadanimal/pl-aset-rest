<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInfoPlpkPa0204sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('info_plpk_pa_0204s', function (Blueprint $table) {
            $table->id();
            $table->string("status")->nullable();
            $table->string("kuantiti")->nullable();
            $table->string("kos")->nullable();
            $table->string("bacaan")->nullable();
            $table->string("kewpa14_id")->nullable();
            $table->string("plpk04_id")->nullable();
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
        Schema::dropIfExists('info_plpk_pa_0204s');
    }
}
