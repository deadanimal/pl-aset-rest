<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStatusSelenggaraToKewpa3as extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('kewpa3as', function (Blueprint $table) {
          $table->string('status_selenggara')->nullable();
          $table->string('tempoh_selenggara')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('kewpa3as', function (Blueprint $table) {
            //
        });
    }
}
