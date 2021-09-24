<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInfoKewatk10sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('info_kewatk10s', function (Blueprint $table) {
            $table->id();
            $table->string("tahun_semasa")->nullable();
            $table->string("kuantiti_keseluruhan")->nullable();
            $table->string("kuantiti_diperiksa")->nullable();
            $table->string("kuantiti_tidak_diperiksa")->nullable();
            $table->string("peratusan_diperiksa")->nullable();
            $table->string("kuantiti_asetA")->nullable();
            $table->string("kuantiti_asetB")->nullable();
            $table->string("kuantiti_asetC")->nullable();
            $table->string("kuantiti_asetD")->nullable();
            $table->string("kuantiti_asetE")->nullable();
            $table->string("kuantiti_asetF")->nullable();
            $table->string("kewatk10_id")->nullable();
            $table->string("no_siri_pendaftaran")->nullable();

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
        Schema::dropIfExists('info_kewatk10s');
    }
}
