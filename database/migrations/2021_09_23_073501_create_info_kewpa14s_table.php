<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInfoKewpa14sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('info_kewpa14s', function (Blueprint $table) {
            $table->id();
            $table->string("lokasi_aset")->nullable();
            $table->string("tempoh_penyelenggaraan")->nullable();
            $table->string("no_siri_pendaftaran")->nullable();
            $table->string("kewpa14_id")->nullable();
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
        Schema::dropIfExists('info_kewpa14s');
    }
}
