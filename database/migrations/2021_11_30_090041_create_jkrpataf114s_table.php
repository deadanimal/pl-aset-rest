<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJkrpataf114sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jkrpataf114s', function (Blueprint $table) {
            $table->id();
            $table->string('rujukan_bil');
            $table->date('tarikh');
            $table->integer('bil');
            $table->string('jenis_aset');
            $table->string('no_pendaftaran');
            $table->foreignId('staff_id');
            $table->foreignId('jkrpataf68_id');
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
        Schema::dropIfExists('jkrpataf114s');
    }
}
