<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInfoKewpa19sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('info_kewpa19s', function (Blueprint $table) {
            $table->id();
            $table->string("butiran_penambahbaikan")->nullable();
            $table->string("laporan_pemeriksaan")->nullable();
            $table->string("no_siri_pendaftaran")->nullable();
            $table->string("kewpa19_id")->nullable();

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
        Schema::dropIfExists('info_kewpa19s');
    }
}
