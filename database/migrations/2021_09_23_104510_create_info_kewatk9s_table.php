<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInfoKewatk9sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('info_kewatk9s', function (Blueprint $table) {
            $table->id();
            $table->string("lokasi_sebenar")->nullable();
            $table->string("status_harta")->nullable();
            $table->string("catatan")->nullable();
            $table->string("no_siri_pendaftaran")->nullable();
            $table->string("no_rujukan_atk9")->nullable();
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
        Schema::dropIfExists('info_kewatk9s');
    }
}
