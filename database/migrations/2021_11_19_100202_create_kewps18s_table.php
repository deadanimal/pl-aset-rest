<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKewps18sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kewps18s', function (Blueprint $table) {
            $table->id();
            $table->string('tahun');
            $table->string('jumlah_kuantiti_terimaan');
            $table->string('jumlah_nilai_terimaan');
            $table->string('jumlah_kuantiti_pengeluaran');
            $table->string('jumlah_nilai_pengeluaran');
            $table->foreignId('kewps17_id');
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
        Schema::dropIfExists('kewps18s');
    }
}
