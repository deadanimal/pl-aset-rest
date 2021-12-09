<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJkrpataf68sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jkrpataf68s', function (Blueprint $table) {
            $table->id();
            $table->string('no_rujukan');
            $table->date('tarikh');
            $table->string('kategori_aset');
            $table->string('fungsi_aset');
            $table->string('nama_premis');
            $table->string('alamat_premis');
            $table->string('koordinat_gps');
            $table->string('kumpulan_agensi');
            $table->string('kementerian');
            $table->string('jabatan');
            $table->string('negara');
            $table->string('negeri');
            $table->string('daerah');
            $table->string('mukim');
            $table->string('kategori_fungsi_premis');
            $table->string('no_laluan');
            $table->string('bilangan_blok');
            $table->string('jumlah_saiz_premis');
            $table->date('tarikh_siap_bina_asal');
            $table->date('tarikh_warta');
            $table->string('jumlah_kos_perolehan_asal');
            $table->string('no_lukisan_pelan_lokasi');
            $table->string('no_lukisan_pelan_tapak');
            $table->string('gambar_premis');
            $table->string('pegawai_daftar');
            $table->string('pegawai_teknikal');
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
        Schema::dropIfExists('jkrpataf68s');
    }
}
