<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKewps8sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kewps8s', function (Blueprint $table) {
            $table->id();
            $table->integer('kuantiti_dimohon');
            $table->string('catatan_pemohon');
            $table->integer('kuantiti_diluluskan')->nullable();
            $table->string('catatan_pelulus')->nullable();
            $table->integer('kuantiti_diterima')->nullable();
            $table->string('catatan_penerima')->nullable();
            $table->string('pemohon_id');
            $table->string('pelulus_id')->nullable();
            $table->string('penerima_id')->nullable();
            $table->foreignId('kewps3a_id');
            $table->string('status');
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
        Schema::dropIfExists('kewps8s');
    }
}
