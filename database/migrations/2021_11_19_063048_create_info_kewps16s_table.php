<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInfoKewps16sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('info_kewps16s', function (Blueprint $table) {
            $table->id();
            $table->string('kuantiti_fizikal_diserahkan');
            $table->string('perbezaan_diserahkan');
            $table->string('kuantiti_fizikal_diambil');
            $table->string('perbezaan_diambil');
            $table->string('catatan')->nullable();
            $table->foreignId('kewps16_id');
            $table->foreignId('kewps3a_id');
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
        Schema::dropIfExists('info_kewps16s');
    }
}
