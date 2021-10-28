<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInfoKewpa11sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('info_kewpa11s', function (Blueprint $table) {
            $table->id();
            $table->string("lokasi_sebenar")->nullable();
            $table->string("status_aset")->nullable();
            $table->string("catatan")->nullable();
            $table->string("no_siri_pendaftaran")->nullable();
            $table->string("rujukan_kewpa11_id")->nullable();

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
        Schema::dropIfExists('info_kewpa11s');
    }
}
