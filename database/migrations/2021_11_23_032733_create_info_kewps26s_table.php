<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInfoKewps26sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('info_kewps26s', function (Blueprint $table) {
            $table->id();
            $table->string('kuantiti');
            $table->string('harga_simpanan');
            $table->foreignId('kewps3a_id');
            $table->foreignId('kewps26_id');
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
        Schema::dropIfExists('info_kewps26s');
    }
}
