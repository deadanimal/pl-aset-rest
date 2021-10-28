<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInfoKewpa21sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('info_kewpa21s', function (Blueprint $table) {
            $table->id();

            $table->string("keadaan_aset")->nullable();
            $table->string("kaedah_pelupusan")->nullable();
            $table->string("justifikasi")->nullable();
            $table->string("keputusan_melulus")->nullable();
            $table->string("catatan")->nullable();
            $table->string("no_siri_pendaftaran")->nullable();
            $table->string("kewpa21_id")->nullable();
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
        Schema::dropIfExists('info_kewpa21s');
    }
}
