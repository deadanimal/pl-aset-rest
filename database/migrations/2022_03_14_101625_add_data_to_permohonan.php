<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDataToPermohonan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('permohonan_bahagian_1', function (Blueprint $table) {
            $table->string('no_laluan')->nullable();
            $table->string('kod_lokasi')->nullable();
            $table->string('nama_tanah')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('permohonan', function (Blueprint $table) {
            //
        });
    }
}
