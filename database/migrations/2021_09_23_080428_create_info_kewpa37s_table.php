<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInfoKewpa37sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('info_kewpa37s', function (Blueprint $table) {
            $table->id();

            $table->string("agensi")->nullable();
            $table->string("kuantiti_hapus")->nullable();
            $table->string("nilai_perolehan_hapus")->nullable();
            $table->string("nilai_semasa_hapus")->nullable();
            $table->string("kes_surcaj")->nullable();
            $table->string("nilai_surcaj")->nullable();
            $table->string("kes_tatatertib")->nullable();
            $table->string("kewpa33_id")->nullable();
            $table->string("kewpa37_id")->nullable();
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
        Schema::dropIfExists('info_kewpa37s');
    }
}
