<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInfoPlpkPa0207sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('info_plpk_pa_0207s', function (Blueprint $table) {
            $table->id();

            $table->string("saiz")->nullable();
            $table->string("tayar_bocor")->nullable();
            $table->string("kuantiti_tayar")->nullable();
            $table->string("kuantiti_tiub")->nullable();
            $table->string("kuantiti_pelapik")->nullable();
            $table->string("punca_kerosakan")->nullable();
            $table->string("kewpa14_id")->nullable();
            $table->string("plpk07_id")->nullable();
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
        Schema::dropIfExists('info_plpk_pa_0207s');
    }
}
