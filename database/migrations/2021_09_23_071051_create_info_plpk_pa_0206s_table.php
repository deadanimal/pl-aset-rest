<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInfoPlpkPa0206sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('info_plpk_pa_0206s', function (Blueprint $table) {
            $table->id();
            $table->string("deskripsi_alat_ganti")->nullable();
            $table->string("kuantiti")->nullable();
            $table->string("catitan")->nullable();
            $table->string("kewpa14_id")->nullable();
            $table->string("plpk06_id")->nullable();
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
        Schema::dropIfExists('info_plpk_pa_0206s');
    }
}
