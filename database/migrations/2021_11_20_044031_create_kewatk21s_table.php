<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKewatk21sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kewatk21s', function (Blueprint $table) {
            $table->id();
            $table->string("tarikh")->nullable();
            $table->string("kaedah_pelupusan")->nullable();
            $table->string("bilangan_item")->nullable();
            $table->string("no_resit")->nullable();
            $table->string("dihadiahkan_kepada")->nullable();
            $table->string("dokumen_berkaitan")->nullable();
            $table->string("hasil_perbelanjaan")->nullable();
            $table->string("penerima_syarikat")->nullable();
            $table->date("created_date")->nullable();
            $table->date("modified_date")->nullable();
            $table->string("kewatk19_id")->nullable();
            $table->string("ketua_jabatan")->nullable();
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
        Schema::dropIfExists('kewatk21s');
    }
}
