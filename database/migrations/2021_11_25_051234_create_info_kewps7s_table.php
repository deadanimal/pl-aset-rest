<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInfoKewps7sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('info_kewps7s', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kewps3a_id');
            $table->string('catatan_pemohon')->nullable();
            $table->integer('kuantiti_dimohon')->nullable();
            $table->integer('kuantiti_diluluskan')->nullable();
            $table->string('catatan_pelulus')->nullable();
            $table->integer('kuantiti_dikeluarkan')->nullable();
            $table->string('pembungkusan')->nullable();
            $table->integer('kuantiti_diterima')->nullable();
            $table->foreignId('kewps7_id');
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
        Schema::dropIfExists('info_kewps7s');
    }
}
