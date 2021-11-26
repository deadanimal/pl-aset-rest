<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKewps21sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kewps21s', function (Blueprint $table) {
            $table->id();
            $table->date('tarikh');
            $table->string('tempat');
            $table->foreignId('infokewps20_id');
            $table->string('pegawai_saksi1');
            $table->string('pegawai_saksi2');
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
        Schema::dropIfExists('kewps21s');
    }
}
