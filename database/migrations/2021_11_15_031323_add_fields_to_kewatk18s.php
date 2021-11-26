<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsToKewatk18s extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('kewatk18s', function (Blueprint $table) {
          $table->date('date_created')->nullable();
          $table->date('created_date')->nullable();
          $table->string('tarikh_mula')->nullable();
          $table->string('tarikh_tamat')->nullable();
          $table->string('tempoh')->nullable();
          $table->string('created_by')->nullable();
          $table->string('pegawai')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('kewatk18s', function (Blueprint $table) {
            //
        });
    }
}
