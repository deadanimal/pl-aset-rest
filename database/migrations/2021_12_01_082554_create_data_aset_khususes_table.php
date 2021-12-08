<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataAsetKhususesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_aset_khususes', function (Blueprint $table) {
            $table->id();
            $table->string('kegunaan_blok');
            $table->string('jenis_struktur');
            $table->string('no_siri_pendaftaran');
            $table->integer('tahun_siap_bina_asal');
            $table->float('penggunaan_tenaga');
            $table->float('penggunaan_air');
            $table->float('bil_atas_tanah');
            $table->float('luas_lantai');
            $table->float('bil_bawah_tanah');
            $table->float('luas_tapak');
            $table->integer('from_page');
            $table->integer('to_page');
            $table->foreignId('staff_id');
            $table->foreignId('blok_bangunan_id');
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
        Schema::dropIfExists('data_aset_khususes');
    }
}
