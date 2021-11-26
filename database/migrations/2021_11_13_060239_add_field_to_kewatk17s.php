<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldToKewatk17s extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('kewatk17s', function (Blueprint $table) {
          $table->string('status');
          $table->string('tarikh_akuan');
          $table->string('tarikh_sah');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('kewatk17s', function (Blueprint $table) {
            //
        });
    }
}
