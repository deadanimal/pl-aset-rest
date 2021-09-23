<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlpkPa0202sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plpk_pa_0202s', function (Blueprint $table) {
            $table->id()->unique();
            $table->string('plpk_pa_0202_id')->unique();
            $table->string('pemandu')->nullable();
            $table->date('date_created')->nullable();
            $table->date('date_modified')->nullable();
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
        Schema::dropIfExists('plpk_pa_0202s');
    }
}
