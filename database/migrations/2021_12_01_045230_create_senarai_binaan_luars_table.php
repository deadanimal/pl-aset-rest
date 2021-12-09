<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSenaraiBinaanLuarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('senarai_binaan_luars', function (Blueprint $table) {
            $table->id();
            $table->string('nama_binaan_luar');
            $table->string('luas_tapak');
            $table->string('catatan');
            $table->string('from_page');
            $table->string('to_page');
            $table->foreignId('staff_id');
            $table->foreignId('jkrpataf612_id');
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
        Schema::dropIfExists('senarai_binaan_luars');
    }
}
