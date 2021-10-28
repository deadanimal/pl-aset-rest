<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKewpa34sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kewpa34s', function (Blueprint $table) {
            $table->id();
            $table->string("tarikh")->nullable();
            $table->string("tarikh_tamat")->nullable();
            $table->date("date_created")->nullable();
            $table->date("date_modified")->nullable();
            $table->string("pegawai_dilantik")->nullable();
            $table->string("kewpa33_id")->nullable();
            $table->string("pegawai_pengawal")->nullable();

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
        Schema::dropIfExists('kewpa34s');
    }
}
