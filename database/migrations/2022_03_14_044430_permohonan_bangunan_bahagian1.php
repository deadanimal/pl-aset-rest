<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PermohonanBangunanBahagian1 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permohonan_bahagian_1', function (Blueprint $table) {
            $table->string('no_rujukan')->nullable();
            $table->string('tarikh')->nullable();
            $table->string('kategori_aset')->nullable();
            $table->string('fungsi_aset')->nullable();
            $table->string('nama_premis')->nullable();
            $table->string('alamat_premis')->nullable();
            $table->string('koordinat_gps')->nullable();
            $table->string('kumpulan_agensi')->nullable();
            $table->string('kementerian')->nullable();
            $table->string('jabatan')->nullable();
            $table->string('negara')->nullable();
            $table->string('negeri')->nullable();
            $table->string('daerah')->nullable();
            $table->string('mukim')->nullable();
            $table->string('kategori_fungsi_premis')->nullable();
            $table->string('bilangan_blok')->nullable();
            $table->string('jumlah_saiz_premis')->nullable();
            $table->string('tarikh_siap_bina_asal')->nullable();
            $table->string('tarikh_warta')->nullable();
            $table->string('jumlah_kos_perolehan_asal')->nullable();
            $table->string('no_lukisan_pelan_lokasi')->nullable();
            $table->string('no_lukisan_pelan_tapak')->nullable();
            $table->string('gambar_premis')->nullable();
            $table->string('pegawai_teknikal')->nullable();
            $table->string('pegawai_daftar')->nullable();
            $table->id();
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
        //
    }
}
