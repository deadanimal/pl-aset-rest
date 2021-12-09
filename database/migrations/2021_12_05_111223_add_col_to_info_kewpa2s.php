<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColToInfoKewpa2s extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('info_kewpa2s', function (Blueprint $table) {
          $table->string('rujukan_kewpa2')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('info_kewpa2s', function (Blueprint $table) {
            //
        });
    }
}
