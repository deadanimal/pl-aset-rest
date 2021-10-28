<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInfoKewpa16sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('info_kewpa16s', function (Blueprint $table) {
            $table->id();

            $table->string("agensi")->nullable();
            $table->string("kuantiti_aset_pencegahan")->nullable();
            $table->string("kos_aset_pencegahan")->nullable();
            $table->string("kuantiti_aset_pembaikan")->nullable();
            $table->string("kos_aset_pembaikan")->nullable();
            $table->string("jumlah_aset")->nullable();
            $table->string("jumlah_kos")->nullable();
            $table->string("kewpa14_id")->nullable();
            $table->string("kewpa16_id")->nullable();
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
        Schema::dropIfExists('info_kewpa16s');
    }
}
