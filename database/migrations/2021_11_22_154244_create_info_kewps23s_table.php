<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInfoKewps23sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('info_kewps23s', function (Blueprint $table) {
            $table->id();
            $table->string('kuantiti');
            $table->string('harga_simpanan');
            $table->foreignId('kewps3a_id');
            $table->foreignId('kewps23_id');
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
        Schema::dropIfExists('info_kewps23s');
    }
}
