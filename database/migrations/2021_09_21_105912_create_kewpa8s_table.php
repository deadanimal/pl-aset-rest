<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKewpa8sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kewpa8s', function (Blueprint $table) {
            $table->id()->unique();
            $table->string('tahun')->nullable();
            $table->string('staff_id')->nullable();
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
        Schema::dropIfExists('kewpa8s');
    }
}
