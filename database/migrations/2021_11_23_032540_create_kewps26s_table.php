<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKewps26sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kewps26s', function (Blueprint $table) {
            $table->id();
            $table->string('kementerian');
            $table->date('tarikh_mula');
            $table->date('tarikh_tamat');
            $table->time('masa_mula');
            $table->time('masa_tamat');
            $table->string('lokasi');
            $table->string('alamat_sebut_harga');
            $table->date('tarikh_tutup');
            $table->string('nama_deposit');
            $table->string('ketua_jabatan');
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
        Schema::dropIfExists('kewps26s');
    }
}
