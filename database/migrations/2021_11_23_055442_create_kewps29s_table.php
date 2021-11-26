<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKewps29sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kewps29s', function (Blueprint $table) {
            $table->id();
            $table->string('agensi');
            $table->date('tarikh');
            $table->time('masa');
            $table->string('tempat');
            $table->date('tarikh_mula');
            $table->date('tarikh_tamat');
            $table->string('alamat');
            $table->time('masa_mula');
            $table->time('masa_tamat');
            $table->foreignId('kewps20_id');
            $table->foreignId('staff_id');
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
        Schema::dropIfExists('kewps29s');
    }
}
