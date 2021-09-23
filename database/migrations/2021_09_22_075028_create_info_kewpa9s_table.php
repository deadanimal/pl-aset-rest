<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInfoKewpa9sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('info_kewpa9s', function (Blueprint $table) {
            $table->id()->unique();
            $table->string('info_kewpa9_id')->unique();
            $table->string('tarikh_dipinjam')->nullable();
            $table->string('tarikh_dijangka')->nullable();
            $table->string('status')->nullable();
            $table->string('tarikh_dipulangkan')->nullable();
            $table->string('tarikh_diterima')->nullable();
            $table->string('catatan')->nullable();
            $table->string('no_siri_pendaftaran')->nullable();
            $table->string('kewpa9_id')->nullable();
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
        Schema::dropIfExists('info_kewpa9s');
    }
}
