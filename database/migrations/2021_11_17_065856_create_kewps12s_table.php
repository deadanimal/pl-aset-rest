<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKewps12sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kewps12s', function (Blueprint $table) {
            $table->id();
            $table->string('kategori_stor');
            $table->string('jabatan');
            $table->float('pelaksanaan_verifikasi');
            $table->float('prestasi_penilaian');
            $table->string('ketua_jabatan');
            $table->foreignId('kewps10_id');
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
        Schema::dropIfExists('kewps12s');
    }
}
