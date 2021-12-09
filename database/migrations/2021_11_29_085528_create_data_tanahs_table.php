<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataTanahsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_tanahs', function (Blueprint $table) {
            $table->id();
            $table->date('pemilikan_tarikh');
            $table->string('pemilikan_kos');
            $table->string('mukim_bandar');
            $table->string('hakmilik_jenis');
            $table->string('hakmilik_nombor');
            $table->string('lot_nombor');
            $table->string('lot_luas');
            $table->string('status');
            $table->date('tarikh_ptp');
            $table->string('catatan');
            $table->foreignId('jkrpataf68_id');
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
        Schema::dropIfExists('data_tanahs');
    }
}
