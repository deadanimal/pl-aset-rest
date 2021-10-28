<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInfoKewpa15sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('info_kewpa15s', function (Blueprint $table) {
            $table->id();

            $table->string("tarikh")->nullable();
            $table->string("jenis_penyelenggaraan")->nullable();
            $table->string("butir_kerja")->nullable();
            $table->string("nama_syarikat")->nullable();
            $table->string("kos")->nullable();
            $table->string("pegawai_pengesah")->nullable();
            $table->string("no_siri_pendaftaran")->nullable();
            $table->string("kewpa15_id")->nullable();
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
        Schema::dropIfExists('info_kewpa15s');
    }
}
