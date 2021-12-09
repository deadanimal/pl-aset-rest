<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInfoKewps17sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('info_kewps17s', function (Blueprint $table) {
            $table->id();
            $table->string('kuantiti_dimohon');
            $table->string('kuantiti_dilulus');
            $table->string('catatan');
            $table->foreignId('kewps17_id');
            $table->string('kewps3a_id');
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
        Schema::dropIfExists('info_kewps17s');
    }
}
