<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKewpa2sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kewpa2s', function (Blueprint $table) {
            $table->id()->unique();
            $table->string('rujukan_kewpa2')->unique();
            $table->string('tindakan')->nullable();
            $table->date('date_created')->nullable();
            $table->date('date_modified')->nullable();
            $table->string('pegawai_penerima')->nullable();
            $table->string('rujukan_kewpa1_id')->nullable();
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
        Schema::dropIfExists('kewpa2s');
    }
}
