<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldToKewatk2s extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('kewatk2s', function (Blueprint $table) {
          $table->string("kuantiti_ditolak")->nullable();
          $table->string("kuantiti_kurang_lebih")->nullable();
          $table->string("sebab_penolakan")->nullable();
          $table->string("catatan")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('kewatk2s', function (Blueprint $table) {
            //
        });
    }
}
