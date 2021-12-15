<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnInfokewpa27 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('info_kewpa27s', function (Blueprint $table) {
            $table->string('kuantiti');
            $table->string('harga_simpanan');
            $table->foreignId('kewpa27_id');
            $table->foreignId('kewpa21_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('info_kewpa27s', function (Blueprint $table) {
            //
        });
    }
}
