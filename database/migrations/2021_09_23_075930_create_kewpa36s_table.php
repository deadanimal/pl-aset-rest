<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKewpa36sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kewpa36s', function (Blueprint $table) {
            $table->id();

            $table->string("no_surat")->nullable();
            $table->string("tarikh_surat")->nullable();
            $table->date("date_created")->nullable();
            $table->date("date_modified")->nullable();
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
        Schema::dropIfExists('kewpa36s');
    }
}
