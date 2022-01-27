<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePembekalAsetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pembekal_asets', function (Blueprint $table) {
            $table->id();
            $table->string('syarikat')->nullable();
            $table->string('status')->nullable();
            $table->string('id_pembekal')->nullable();
            $table->string('emel')->nullable();
            $table->string('nama_pembekal')->nullable();
            $table->string('alamat_pembekal')->nullable();
            $table->string('bandar')->nullable();
            $table->string('negeri')->nullable();
            $table->string('poskod')->nullable();
            $table->string('negara')->nullable();
            $table->string('no_telefon_pembekal')->nullable();
            $table->string('no_faks_pembekal')->nullable();
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
        Schema::dropIfExists('pembekal_asets');
    }
}
