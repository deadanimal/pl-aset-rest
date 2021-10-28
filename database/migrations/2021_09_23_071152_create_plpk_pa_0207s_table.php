<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlpkPa0207sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plpk_pa_0207s', function (Blueprint $table) {
            $table->id();
            $table->string("bacaan_odometer")->nullable();
            $table->string("tarikh_diperlukan")->nullable();
            $table->string("kedudukan_tayar")->nullable();
            $table->string("nama_pembekal")->nullable();
            $table->string("jenis")->nullable();
            $table->date("created_date")->nullable();
            $table->date("modified_date")->nullable();
            $table->string("penerima")->nullable();
            $table->string("unit_bengkel")->nullable();
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
        Schema::dropIfExists('plpk_pa_0207s');
    }
}
