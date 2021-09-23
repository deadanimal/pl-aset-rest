<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlpkPa0203sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plpk_pa_0203s', function (Blueprint $table) {
            $table->id()->unique();
            $table->string('plpk03_id')->unique();
            $table->string('tarikh_permohonan')->nullable();
            $table->string('status_keutamaan')->nullable();
            $table->string('nota_penjelasan')->nullable();
            $table->string('pembaiki_disyorkan')->nullable();
            $table->string('nota_kebenaran')->nullable();
            $table->date('created_date')->nullable();
            $table->date('modified_date')->nullable();
            $table->string('pegawai_penyelenggaraan')->nullable();

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
        Schema::dropIfExists('plpk_pa_0203s');
    }
}


