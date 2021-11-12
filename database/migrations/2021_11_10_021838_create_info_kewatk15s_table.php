<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInfoKewatk15sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('info_kewatk15s', function (Blueprint $table) {
            $table->id();

            $table->string('catatan')->nullable();
            $table->string('no_siri_pendaftaran')->nullable();
            $table->string('kewatk15_id')->nullable();
            $table->date('date_created')->nullable();
            $table->date('date_modified')->nullable();


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('info_kewatk15s');
    }
}
