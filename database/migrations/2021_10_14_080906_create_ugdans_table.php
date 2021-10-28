<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUgdansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ugdans', function (Blueprint $table) {
            $table->id();
            $table->string("kewatk3a_id")->nullable();
            $table->string("nilai_semasa_rm")->nullable();
            $table->string("nama_pegawai")->nullable();
            $table->string("tarikh")->nullable();
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
        Schema::dropIfExists('ugdans');
    }
}
