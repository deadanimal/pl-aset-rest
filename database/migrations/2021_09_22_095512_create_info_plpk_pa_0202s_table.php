<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInfoPlpkPa0202sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('info_plpk_pa_0202s', function (Blueprint $table) {
            $table->id()->unique();
            $table->string('info_plpk_pa_0202_id')->unique();
            $table->string('butiran_kerosakan')->nullable();
            $table->string('tindakan')->nullable();
            $table->string('kewpa14_id')->nullable();
            $table->string('plpk_pa_0202_id')->nullable();
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
        Schema::dropIfExists('info_plpk_pa_0202s');
    }
}

