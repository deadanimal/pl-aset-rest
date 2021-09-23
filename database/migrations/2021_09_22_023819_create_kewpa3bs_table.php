<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKewpa3bsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kewpa3bs', function (Blueprint $table) {
            $table->id()->unique();
            $table->string('kewpa4_id')->unique();
            $table->string('kos')->nullable();
            $table->string('tempoh_jaminan')->nullable();
            $table->string('status')->nullable();
            $table->string('tarikh_dipasang')->nullable();
            $table->string('tarikh_dikeluarkan')->nullable();
            $table->string('tarikh_dilupus_hapus')->nullable();
            $table->string('catatan')->nullable();
            $table->date('date_created')->nullable();
            $table->date('date_modified')->nullable();
            $table->string('pegawai_bertanggungjawab')->nullable();
            $table->string('no_siri_pendaftaran')->nullable();

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
        Schema::dropIfExists('kewpa3bs');
    }
}

