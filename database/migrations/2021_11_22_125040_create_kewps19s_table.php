<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKewps19sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kewps19s', function (Blueprint $table) {
            $table->id();
            $table->date('tarikh');
            $table->integer('tempoh');
            $table->date('tempoh_mula');
            $table->date('tempoh_tamat');
            $table->string('penerima_id');
            $table->string('pegawai_id');
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
        Schema::dropIfExists('kewps19s');
    }
}
