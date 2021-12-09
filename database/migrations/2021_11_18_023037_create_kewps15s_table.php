<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKewps15sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kewps15s', function (Blueprint $table) {
            $table->id();
            $table->string('agensi');
            $table->string('kategori_stor');
            $table->string('pegawai_menyediakan');
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
        Schema::dropIfExists('kewps15s');
    }
}
