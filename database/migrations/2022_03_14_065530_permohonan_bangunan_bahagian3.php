<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PermohonanBangunanBahagian3 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permohonan_bahagian_3', function (Blueprint $table) {
            $table->string('senarai_ruang_untuk_aras')->nullable();
            $table->string('kod_ruang')->nullable();
            $table->string('nama_ruang')->nullable();
            $table->string('luas_ruang')->nullable();
            $table->string('tinggi_ruang')->nullable();
            $table->string('fungsi_ruang')->nullable();
            $table->string('lampiran')->nullable();

            $table->id();
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
        //
    }
}
