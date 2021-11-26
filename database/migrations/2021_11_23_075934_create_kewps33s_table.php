<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKewps33sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kewps33s', function (Blueprint $table) {
            $table->id();
            $table->string('tarikh');
            $table->string('tarikh_kembali');
            $table->string('pegawai_pengawal');
            $table->foreignId('kewps32_id');
            $table->string('pegawai_penerima');
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
        Schema::dropIfExists('kewps33s');
    }
}
