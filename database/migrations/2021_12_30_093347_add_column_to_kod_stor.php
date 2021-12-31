<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnToKodStor extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('kod_stors', function (Blueprint $table) {
            $table->string('no_kad')->nullable();
            $table->string('perihal')->nullable();
            $table->string('unit_ukuran')->nullable();
            $table->dropColumn('penerangan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('kod_stors', function (Blueprint $table) {
            //
        });
    }
}
