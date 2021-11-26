<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKewatk20sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kewatk20s', function (Blueprint $table) {
            $table->id();
            $table->string("agensi")->nullable();
            $table->string("tajuk_harta")->nullable();
            $table->string("kuantiti")->nullable();
            $table->string("secara")->nullable();
            $table->string("tarikh")->nullable();
            $table->string("tempat")->nullable();
            $table->date("created_date")->nullable();
            $table->date("modified_date")->nullable();
            $table->string("pegawai1")->nullable();
            $table->string("pegawai2")->nullable();
            $table->string("kewatk19_id")->nullable();

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
        Schema::dropIfExists('kewatk20s');
    }
}
