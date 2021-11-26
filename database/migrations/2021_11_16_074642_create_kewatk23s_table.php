<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKewatk23sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kewatk23s', function (Blueprint $table) {
            $table->id();
            $table->string("tempat_kehilangan")->nullable();
            $table->string("tarikh_kehilangan")->nullable();
            $table->string("cara_kehilangan")->nullable();
            $table->string("no_rujukan_polis")->nullable();
            $table->string("tarikh_polis")->nullable();
            $table->string("langkah_sedia_ada")->nullable();
            $table->string("langkah_segera")->nullable();
            $table->string("dokumen_sokongan")->nullable();
            $table->string("gambar")->nullable();
            $table->string("catatan")->nullable();
            $table->date("created_date")->nullable();
            $table->date("modified_date")->nullable();
            $table->string("no_siri_pendaftaran")->nullable();
            $table->string("ketua_jabatan")->nullable();
            $table->string("pegawai_akhir")->nullable();
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
        Schema::dropIfExists('kewatk23s');
    }
}
