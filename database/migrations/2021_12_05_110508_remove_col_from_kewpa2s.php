<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveColFromKewpa2s extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('kewpa2s', function (Blueprint $table) {
            //
          $table->dropColumn('rujukan_kewpa2');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('kewpa2s', function (Blueprint $table) {
            //
        });
    }
}
