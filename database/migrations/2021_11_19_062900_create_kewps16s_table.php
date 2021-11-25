<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKewps16sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kewps16s', function (Blueprint $table) {
            $table->id();
            $table->string('agensi');
            $table->string('bahagian');
            $table->string('ulasan');
            $table->string('tindakan');
            $table->string('pegawai_menyerah');
            $table->string('pegawai_mengambil');
            $table->string('pegawai_mengesahkan');
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
        Schema::dropIfExists('kewps16s');
    }
}
