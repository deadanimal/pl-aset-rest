<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKewatk3aPenempatansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kewatk3a_penempatans', function (Blueprint $table) {
            $table->id();
            $table->string("kewatk3a_id")->nullable();
            $table->string("lokasi")->nullable();
            $table->string("medium_storan")->nullable();
            $table->string("nama_pegawai")->nullable();
            $table->date("created_date")->nullable();
            $table->date("modified_date")->nullable();
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
        Schema::dropIfExists('kewatk3a_penempatans');
    }
}
