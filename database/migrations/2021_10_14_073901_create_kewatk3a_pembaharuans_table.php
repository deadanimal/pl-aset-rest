<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKewatk3aPembaharuansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kewatk3a_pembaharuans', function (Blueprint $table) {
            $table->id();
            $table->string("kewatk3a_id")->nullable();
            $table->string("tarikh")->nullable();
            $table->string("negara")->nullable();
            $table->string("no_permohonan")->nullable();
            $table->string("kos")->nullable();
            $table->string("catatan")->nullable();
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
        Schema::dropIfExists('kewatk3a_pembaharuans');
    }
}
