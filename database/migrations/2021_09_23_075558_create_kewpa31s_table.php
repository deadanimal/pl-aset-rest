<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKewpa31sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kewpa31s', function (Blueprint $table) {
            $table->id();
            $table->integer("kuantiti")->nullable();
            $table->string("harga_simpanan")->nullable();
            $table->string("deposit")->nullable();
            $table->date("date_created")->nullable();
            $table->date("date_modified")->nullable();
            $table->string("kewpa30_id")->nullable();
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
        Schema::dropIfExists('kewpa31s');
    }
}
