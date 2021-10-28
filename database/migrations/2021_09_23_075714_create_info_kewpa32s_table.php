<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInfoKewpa32sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('info_kewpa32s', function (Blueprint $table) {
            $table->id();

            $table->string("agensi")->nullable();
            $table->string("kuantiti")->nullable();
            $table->string("nilai_perolehan")->nullable();
            $table->string("kaedahA")->nullable();
            $table->string("kaedahB")->nullable();
            $table->string("kaedahC")->nullable();
            $table->string("kaedahD")->nullable();
            $table->string("kaedahE")->nullable();
            $table->string("kaedahF")->nullable();
            $table->string("kaedahG")->nullable();
            $table->string("kaedahH")->nullable();
            $table->string("kaedahI")->nullable();
            $table->string("kaedahJ")->nullable();
            $table->string("nilai_semasa")->nullable();
            $table->string("hasil_pelupusan")->nullable();
            $table->string("kos_pengendalian")->nullable();
            $table->string("kewpa21_id")->nullable();
            $table->string("kewpa32_id")->nullable();
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
        Schema::dropIfExists('info_kewpa32s');
    }
}
