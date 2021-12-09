<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInfoKewps36sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('info_kewps36s', function (Blueprint $table) {
            $table->id();
            $table->integer('tahun');
            $table->string('staff_id');
            $table->foreignId('kewps34_id');
            $table->foreignId('infokewps35_id');
            $table->foreignId('kewps3a_id');
            $table->foreignId('kewps36_id');
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
        Schema::dropIfExists('info_kewps36s');
    }
}
