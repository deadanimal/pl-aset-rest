<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKewps24sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kewps24s', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('kp');
            $table->string('alamat_pemberi');
            $table->string('nama_penerima');
            $table->string('alamat_penerima');
            $table->string('nilai');
            $table->string('no_bank');
            $table->string('nama_kementerian');
            $table->foreignId('staff_id');
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
        Schema::dropIfExists('kewps24s');
    }
}
