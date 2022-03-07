<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSusutToJalans extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('jalans', function (Blueprint $table) {
            $table->string('baki_jangka_hayat')->nullable();
            $table->string('anggaran_kos')->nullable();
            $table->string('susun_nilai')->nullable();
            $table->string('baki_pada_today')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('jalans', function (Blueprint $table) {
            //
        });
    }
}
