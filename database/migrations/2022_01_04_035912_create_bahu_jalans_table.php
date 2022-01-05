<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBahuJalansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bahu_jalans', function (Blueprint $table) {
            $table->id();
            $table->string('lebar_bahu');
            $table->string('jenis_bahu');
            $table->string('jenis_longkang');
            $table->string('lebar_laluan');
            $table->string('catatan');
            $table->foreignId('jalan_id');
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
        Schema::dropIfExists('bahu_jalans');
    }
}
