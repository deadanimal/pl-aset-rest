<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddLokasiRekodToInfoKewatk9s extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('info_kewatk9s', function (Blueprint $table) {
          $table->string("lokasi_rekod")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('info_kewatk9s', function (Blueprint $table) {
            //
        });
    }
}
