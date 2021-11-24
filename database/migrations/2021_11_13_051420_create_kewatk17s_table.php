<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKewatk17sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kewatk17s', function (Blueprint $table) {
            $table->id();
            $table->string('no_siri_pendaftaran')->nullable();
            $table->string('no_sijil_pendaftaran')->nullable();
            $table->string('kos_bersangkutan')->nullable();
            $table->string('tarikh_tamat_perlindungan')->nullable();
            $table->string('butir')->nullable();
            $table->string('laporan')->nullable();
            $table->string('pengaku')->nullable();
            $table->string('pengesah')->nullable();
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
        Schema::dropIfExists('kewatk17s');
    }
}
