<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKewps23sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kewps23s', function (Blueprint $table) {
            $table->id();
            $table->date('tarikh_mula');
            $table->date('tarikh_tamat');
            $table->time('masa_mula');
            $table->time('masa_tamat');
            $table->string('tempat');
            $table->date('tarikh_tutup');
            $table->string('alamat');
            $table->string('kementerian');
            $table->foreignId('staff_id');
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
        Schema::dropIfExists('kewps23s');
    }
}
