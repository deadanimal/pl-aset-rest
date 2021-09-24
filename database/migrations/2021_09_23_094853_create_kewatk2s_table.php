<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKewatk2sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kewatk2s', function (Blueprint $table) {
            $table->id();
            $table->string("tindakan_diterima")->nullable();
            $table->string("pegawai_penerima")->nullable();
            $table->string("pembekal")->nullable();
            $table->date("created_date")->nullable();
            $table->date("modified_date")->nullable();
            $table->string("no_rujukan_atk1")->nullable();
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
        Schema::dropIfExists('kewatk2s');
    }
}
