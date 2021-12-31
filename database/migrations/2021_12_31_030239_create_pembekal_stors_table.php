<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePembekalStorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pembekal_stors', function (Blueprint $table) {
            $table->id();
            $table->string('nama')->nullable();
            $table->string('alamat')->nullable();
            $table->string('no_fon')->nullable();
            $table->string('no_fax')->nullable();
            $table->string('email')->nullable();
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
        Schema::dropIfExists('pembekal_stors');
    }
}
