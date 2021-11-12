<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKewps5sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kewps5s', function (Blueprint $table) {
            $table->id();
            $table->string('jumlah_beli_setahun_lepas');
            $table->string('jumlah_beli_dua_tahun_lepas');
            $table->string('purata_pembelian');
            $table->float('peratusan');
            $table->foreignId('kewps3a_id');
            $table->string('user_id');
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
        Schema::dropIfExists('kewps5s');
    }
}
