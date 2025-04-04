<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKewpa25sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kewpa25s', function (Blueprint $table) {
            $table->id();
            $table->string("nama_syarikat")->nullable();
            $table->string("no_pengenalan")->nullable();
            $table->string("alamat")->nullable();
            $table->string("agensi")->nullable();
            $table->string("alamat_agensi")->nullable();
            $table->string("deposit_tender")->nullable();
            $table->string("no_bank")->nullable();
            $table->string("nama_agensi")->nullable();
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
        Schema::dropIfExists('kewpa25s');
    }
}
