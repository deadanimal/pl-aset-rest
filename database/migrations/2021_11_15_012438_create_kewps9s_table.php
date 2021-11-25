<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKewps9sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kewps9s', function (Blueprint $table) {
            $table->id();
            $table->integer('kuantiti_dibungkus');
            $table->string('maklumat_bungkusan');
            $table->string('maklumat_penghantaran');
            $table->string('pemeriksa_id');
            $table->string('pembungkus_id');
            $table->string('penerima_id');
            $table->foreignId('infokewps7_id');
            $table->string('status');
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
        Schema::dropIfExists('kewps9s');
    }
}
