<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnInfokewpa28 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('info_kewpa28s', function (Blueprint $table) {
            $table->integer('kuantiti');
            $table->string('harga_tawaran');
            $table->string('deposit_harga');
            $table->foreignId('kewpa27_id');
            $table->foreignId('kewpa28_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('info_kewpa28s', function (Blueprint $table) {
            //
        });
    }
}
