<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParasStoksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paras_stoks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kewps3a_id');
            $table->date('tahun_paras_stok')->nullable();
            $table->integer('maksimum_stok')->nullable();
            $table->integer('menokok_stok')->nullable();
            $table->integer('minimum_stok')->nullable();

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
        Schema::dropIfExists('paras_stoks');
    }
}
