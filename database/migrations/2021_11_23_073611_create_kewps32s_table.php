<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKewps32sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kewps32s', function (Blueprint $table) {
            $table->id();
            $table->string('tempat_kehilangan');
            $table->date('tarikh_kehilangan');
            $table->string('cara_kehilangan');
            $table->string('no_laporan_polis');
            $table->date('tarikh_laporan_polis');
            $table->string('langkah_sedia_ada');
            $table->string('langkah_segera');
            $table->string('dokumen_sokongan');
            $table->string('gambar');
            $table->string('catatan');
            $table->string('pegawai_terakhir');
            $table->string('ketua_jabatan');
            $table->foreignId('kewps3a_id');
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
        Schema::dropIfExists('kewps32s');
    }
}
