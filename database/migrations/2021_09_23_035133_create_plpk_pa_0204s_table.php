<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlpkPa0204sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plpk_pa_0204s', function (Blueprint $table) {
          
            $table->id()->unique();
            $table->string('milleage')->nullable();
            $table->string('tarikh')->nullable();
            $table->string('selangan_selenggara')->nullable();
            $table->string('tarikh_dijalankan')->nullable();
            $table->string('pemandu')->nullable();
            $table->date('created_date')->nullable();
            $table->date('modified_date')->nullable();

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
        Schema::dropIfExists('plpk_pa_0204s');
    }
}
