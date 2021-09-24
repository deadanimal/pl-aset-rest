<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInfoKewatk2sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('info_kewatk2s', function (Blueprint $table) {
            $table->id();
            $table->string("kuantiti_ditolak")->nullable();
            $table->string("kuantiti_kurang_lebih")->nullable();
            $table->string("sebab_penolakan")->nullable();
            $table->string("Cb atatan")->nullable();
            $table->string("no_rujukan_atk2")->nullable();
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
        Schema::dropIfExists('info_kewatk2s');
    }
}
