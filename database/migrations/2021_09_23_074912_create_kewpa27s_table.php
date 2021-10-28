<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKewpa27sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kewpa27s', function (Blueprint $table) {
            $table->id();
            $table->string("agensi")->nullable();
            $table->string("tarikh_mula")->nullable();
            $table->string("tarikh_tamat")->nullable();
            $table->string("jam_mula")->nullable();
            $table->string("jam_tamat")->nullable();
            $table->string("tempat")->nullable();
            $table->string("alamat")->nullable();
            $table->string("tarikh_tutup")->nullable();
            $table->date("date_created")->nullable();
            $table->date("date_modified")->nullable();
            $table->string("ketua_jabatan")->nullable();
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
        Schema::dropIfExists('kewpa27s');
    }
}
