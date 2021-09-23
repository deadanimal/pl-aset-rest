<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInfoKewpa2sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('info_kewpa2s', function (Blueprint $table) {
            $table->id()->unique();
            $table->string('info_kewpa2')->unique();
            $table->integer('kuantiti_ditolak')->nullable();
            $table->integer('kuantiti_kurang_lebih')->nullable();
            $table->string('sebab_penolakan')->nullable();
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
        Schema::dropIfExists('info_kewpa2s');
    }
}
