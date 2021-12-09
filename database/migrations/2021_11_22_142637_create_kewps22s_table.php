<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKewps22sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kewps22s', function (Blueprint $table) {
            $table->id();
            $table->string('no_resit');
            $table->string('hasil_perbelanjaan');
            $table->string('penerima_syarikat');
            $table->string('pegawai_pelupusan');
            $table->string('ketua_jabatan');
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
        Schema::dropIfExists('kewps22s');
    }
}
