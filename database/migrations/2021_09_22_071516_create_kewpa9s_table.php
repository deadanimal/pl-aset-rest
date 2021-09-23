<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKewpa9sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kewpa9s', function (Blueprint $table) {
            $table->id()->unique();

            $table->string('no_permohonan')->nullable();
            $table->string('pemohon_id')->nullable();
            $table->string('tujuan')->nullable();
            $table->string('tempat_digunakan')->nullable();

            $table->string('pengeluar_id')->nullable();
            $table->string('pemulang_id')->nullable();
            $table->string('pelulus_id')->nullable();
            $table->string('penerima_id')->nullable();

            $table->date('date_created')->nullable();
            $table->date('date_modified')->nullable();

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
        Schema::dropIfExists('kewpa9s');
    }
}

