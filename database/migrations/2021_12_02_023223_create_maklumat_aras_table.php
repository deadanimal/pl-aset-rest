<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaklumatArasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('maklumat_aras', function (Blueprint $table) {
            $table->id();
            $table->integer('senarai_ruang_aras');
            $table->string('nama_ruang');
            $table->float('luas_ruang');
            $table->float('tinggi_ruang');
            $table->string('fungsi_ruang');
            $table->integer('from_page');
            $table->integer('to_page');
            $table->foreignId('staff_id');
            $table->foreignId('data_aset_khusus_id');
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
        Schema::dropIfExists('maklumat_aras');
    }
}
