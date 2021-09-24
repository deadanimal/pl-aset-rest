<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKewatk9sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kewatk9s', function (Blueprint $table) {
            $table->id();

            $table->string("agensi")->nullable();
            $table->string("bahagian")->nullable();
            $table->string("created_date")->nullable();
            $table->string("modified_date")->nullable();
            $table->string("pegawai_pemeriksa1")->nullable();
            $table->string("pegawai_pemeriksa2")->nullable();
            $table->string("pegawai_aset")->nullable();
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
        Schema::dropIfExists('kewatk9s');
    }
}
