<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKewpa33sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kewpa33s', function (Blueprint $table) {
            $table->id();
            $table->string("tempat_kehilangan")->nullable();
            $table->string("tarikh_kehilangan")->nullable();
            $table->string("cara_kehilangan")->nullable();
            $table->string("no_rujukan_polis")->nullable();
            $table->string("tarikh_laporan_polis")->nullable();
            $table->string("langkah_sedia_ada")->nullable();
            $table->string("langkah_segera")->nullable();
            $table->string("dokumen_sokongan")->nullable();
            $table->string("gambar")->nullable();
            $table->string("catatan")->nullable();
            $table->date("date_created")->nullable();
            $table->date("date_modified")->nullable();
            $table->string("pegawai_terakhir")->nullable();
            $table->string("ketua_jabatan")->nullable();
            $table->foreignId("kewpa3a_id");
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
        Schema::dropIfExists('kewpa33s');
    }
}
