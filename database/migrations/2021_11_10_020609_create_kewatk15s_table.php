<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKewatk15sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kewatk15s', function (Blueprint $table) {
            $table->id();
            $table->string('pemohon')->nullable();
            $table->string('penyerah')->nullable();
            $table->string('pelulus')->nullable();
            $table->string('penerima')->nullable();
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
        Schema::dropIfExists('kewatk15s');
    }
}
