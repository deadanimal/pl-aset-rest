<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKewps7sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kewps7s', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pemohon_id');
            $table->string('nama_stor_pemesan');
            $table->string('alamat_stor_pemesan');
            $table->foreignId('pelulus_id')->nullable();
            $table->foreignId('penerima_id')->nullable(); //after dilulus
            $table->foreignId('pengeluar_id')->nullable(); //after diterima
            $table->string('nama_stor_pengeluar');
            $table->string('alamat_stor_pengeluar');
            $table->timestamps();
            $table->string('status')->default("DERAF");

        });
    }

// $table->id();
// $table->foreignId('pemohon_id'); // user1
// $table->string('nama_stor_pemesan');
// $table->string('alamat_stor_pemesan');
// $table->integer('kuantiti_dimohon');
// $table->string('catatan_pemohon');
// $table->string('status');
// $table->foreignId('kewps3a_id');

// $table->foreignId('pelulus_id')->nullable(); // after dipohon
// $table->string('nama_stor_pengeluar')->nullable();
// $table->string('alamat_stor_pengeluar')->nullable();
// $table->integer('kuantiti_diluluskan')->nullable();
// $table->string('catatan_pelulus')->nullable();

// $table->foreignId('penerima_id')->nullable(); //after dilulus

// $table->foreignId('pengeluar_id')->nullable(); //after diterima
// $table->integer('kuantiti_dikeluarkan')->nullable();
// $table->string('pembungkusan')->nullable();
// $table->integer('kuantiti_diterima')->nullable();
// $table->timestamps();

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kewps7s');
    }
}
