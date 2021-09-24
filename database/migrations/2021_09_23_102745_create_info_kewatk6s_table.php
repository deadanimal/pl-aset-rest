<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInfoKewatk6sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('info_kewatk6s', function (Blueprint $table) {
            $table->id();
            $table->string("agensi")->nullable();
            $table->string("kuantiti")->nullable();
            $table->string("nilai_perolehan_asal")->nullable();
            $table->string("nilai_semasa")->nullable();
            $table->string("no_siri_pendaftaran")->nullable();
            $table->string("kewatk6_id")->nullable();
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
        Schema::dropIfExists('info_kewatk6s');
    }
}
