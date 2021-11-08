<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInfoKewatk13sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('info_kewatk13s', function (Blueprint $table) {
            $table->id();
            $table->string("tarikh")->nullable();
            $table->string("jenis_penyelenggaraan")->nullable();
            $table->string("no_pesanan_kerajaan_dan_tarikh")->nullable();
            $table->string("butir_kerja")->nullable();
            $table->string("syarikat_penyelenggara")->nullable();
            $table->string("kos")->nullable();
            $table->string("nama_dan_jawatan")->nullable();
            $table->string("kewatk13_id")->nullable();
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
        Schema::dropIfExists('info_kewatk13s');
    }
}
