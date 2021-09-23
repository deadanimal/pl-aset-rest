<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInfoKewpa1sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('info_kewpa1s', function (Blueprint $table) {
            $table->id()->unique();
            $table->string('no_kod')->nullable();
            $table->string('keterangan_aset_alih')->nullable();
            $table->integer('kuantiti_dipesan')->nullable();
            $table->integer('kuantiti_do')->nullable();
            $table->integer('kuantiti_diterima')->nullable();
            $table->string('catatan')->nullable();
            $table->foreignId('rujukan_kewpa1_id');
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
        Schema::dropIfExists('info_kewpa1s');
    }
}
