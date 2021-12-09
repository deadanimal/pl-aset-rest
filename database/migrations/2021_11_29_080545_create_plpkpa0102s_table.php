<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlpkpa0102sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plpkpa0102s', function (Blueprint $table) {
            $table->id();
            $table->string('no_arahan_kerja');
            $table->string('nama_penerima');
            $table->string('bil');
            $table->string('lokasi');
            $table->string('kerosakan');
            $table->string('catatan');
            $table->string('nama_pengadu');
            $table->string('no_telefon_pengadu');
            $table->string('nota');
            $table->date('tarikh_pengesahan');
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
        Schema::dropIfExists('plpkpa0102s');
    }
}
