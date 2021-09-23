<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInfoKewpa8sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('info_kewpa8s', function (Blueprint $table) {
            $table->id()->unique();
            $table->string('info_kewpa8s')->unique();
            $table->string('agensi')->nullable();
            $table->string('kuantiti_harta_modal')->nullable();
            $table->string('nilai_perolehan_harta')->nullable();
            $table->string('nilai_semasa_harta')->nullable();

            $table->string('kuantiti_aset_alih')->nullable();
            $table->string('nilai_perolehan_aset')->nullable();
            $table->string('nilai_semasa_aset')->nullable();

            $table->string('jumlah_kuantiti')->nullable();
            $table->string('jumlah_nilai_perolehan')->nullable();
            $table->string('jumlah_nilai_semasa')->nullable();
            $table->string('no_siri_pendaftaran')->nullable();
            $table->string('staff_id')->nullable();
            $table->string('kewpa8_id')->nullable();
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
        Schema::dropIfExists('info_kewpa8s');
    }
}
