<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInfoKewps2sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('info_kewps2s', function (Blueprint $table) {
            $table->id();
            $table->integer('kuantiti_ditolak');
            $table->integer('kuantiti_kurang_lebih');
            $table->string('sebab_penolakan');
            $table->foreignId('kewps2_id');
            $table->foreignId('infokewps1_id');
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
        Schema::dropIfExists('info_kewps2s');
    }
}
