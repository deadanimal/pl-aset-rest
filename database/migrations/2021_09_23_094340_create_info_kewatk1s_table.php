<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInfoKewatk1sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('info_kewatk1s', function (Blueprint $table) {
            $table->id();
            $table->string("keterangan_aset")->nullable();
            $table->string("medium")->nullable();
            $table->string("kuantiti_dipesan")->nullable();
            $table->string("kuantiti_do")->nullable();
            $table->string("kuantiti_diterima")->nullable();
            $table->string("catatan")->nullable();
            $table->string("no_rujukan")->nullable();
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
        Schema::dropIfExists('info_kewatk1s');
    }
}
