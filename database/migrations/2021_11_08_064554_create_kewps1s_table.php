<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKewps1sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kewps1s', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pembekal')->nullable();
            $table->string('alamat_pembekal')->nullable();
            $table->string('jenis_penerimaan')->nullable();
            $table->string('nombor_rujukan_pk')->nullable();
            $table->date('tarikh_pk')->nullable();
            $table->bigInteger('nombor_do')->nullable();
            $table->date('tarikh_do')->nullable();
            $table->string('maklumat_pengangkutan')->nullable();
            $table->string('status')->default('DERAF');
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
        Schema::dropIfExists('kewps1s');
    }
}
