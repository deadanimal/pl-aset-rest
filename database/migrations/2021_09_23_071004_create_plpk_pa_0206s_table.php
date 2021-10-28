<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlpkPa0206sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plpk_pa_0206s', function (Blueprint $table) {
            $table->id();
            $table->date("created_date")->nullable();
            $table->date("modified_date")->nullable();
            $table->string("pemohon")->nullable();
            $table->string("jurutera_kanan")->nullable();
            $table->string("penolong_pengarah")->nullable();

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
        Schema::dropIfExists('plpk_pa_0206s');
    }
}
