<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKewps6sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kewps6s', function (Blueprint $table) {
            $table->id();
            $table->string('agensi');
            $table->string('kategori_stor');
            $table->date('tarikh_luput');
            $table->integer('baki_stok_6bulan');
            $table->integer('baki_stok_5bulan');
            $table->integer('baki_stok_4bulan');
            $table->integer('baki_stok_3bulan');
            $table->integer('baki_stok_2bulan');
            $table->integer('baki_stok_1bulan');
            $table->string('catatan');
            $table->foreignId('user_id');
            $table->foreignId('kewps3a_id');
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
        Schema::dropIfExists('kewps6s');
    }
}
