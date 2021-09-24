<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInfoKewatk7sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('info_kewatk7s', function (Blueprint $table) {
            $table->id();
            $table->string("tarikh_dipinjam")->nullable();
            $table->string("tarikh_pulang")->nullable();
            $table->string("status")->nullable();
            $table->string("tarikh_dipulangkan")->nullable();
            $table->string("tarikh_diterima")->nullable();
            $table->string("catatan")->nullable();
            $table->string("no_siri_pendaftaran")->nullable();
            $table->string("no_permohonan_atk7")->nullable();
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
        Schema::dropIfExists('info_kewatk7s');
    }
}
