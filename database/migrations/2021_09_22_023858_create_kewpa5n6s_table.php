<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKewpa5n6sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kewpa5n6s', function (Blueprint $table) {
            $table->id()->unique();
            $table->string('kewpa56_id')->unique();
            $table->string('cara_aset_diperolehi')->nullable();

            $table->string('status_aset')->nullable();
            $table->string('jumlah_nilai_semasa')->nullable();
            $table->string('jumlah_perolehan')->nullable();
            $table->string('no_siri_pendaftaran')->nullable();
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
        Schema::dropIfExists('kewpa5n6s');
    }
}

