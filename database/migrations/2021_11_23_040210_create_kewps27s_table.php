<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKewps27sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kewps27s', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('ic_no_syarikat');
            $table->string('alamat');
            $table->string('nama_penerima');
            $table->string('alamat_penerima');
            $table->string('deposit');
            $table->string('no_bank');
            $table->string('nama_jabatan');
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
        Schema::dropIfExists('kewps27s');
    }
}
