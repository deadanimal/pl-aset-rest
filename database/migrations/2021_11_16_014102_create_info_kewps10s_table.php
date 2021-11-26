<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInfoKewps10sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('info_kewps10s', function (Blueprint $table) {
            $table->id();
            $table->integer('kuantiti_fizikal_stok');
            $table->integer('kuantiti_perbezaan');
            $table->string('catatan');
            $table->integer('statusA');
            $table->integer('statusB');
            $table->integer('statusC');
            $table->integer('statusD');
            $table->integer('statusE');
            $table->integer('statusF');
            $table->foreignId('kewps10_id');
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
        Schema::dropIfExists('info_kewps10s');
    }
}
