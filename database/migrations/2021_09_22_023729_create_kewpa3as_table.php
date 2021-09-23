<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKewpa3asTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kewpa3as', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->string('no_siri_pendaftaran')->unique();
            $table->string('jenis_aset')->nullable();
            $table->string('agensi')->nullable();
            $table->string('bahagian')->nullable();
            $table->string('kod_nasional')->nullable();
            $table->string('keterangan_aset')->nullable();
            $table->string('kategori')->nullable();
            $table->string('sub_kategori')->nullable();
            $table->string('jenis')->nullable();
            $table->string('buatan')->nullable();
            $table->string('jenis_enjin')->nullable();
            $table->string('no_enjin')->nullable();
            $table->string('no_casis')->nullable();
            $table->string('no_pendaftaraan_kenderaan')->nullable();
            $table->string('catatan_spesifikasi')->nullable();
            $table->string('harga_perolehan_asal')->nullable();
            $table->string('tarikh_perolehan')->nullable();
            $table->string('tarikh_diterima')->nullable();
            $table->string('no_pesanan_rasmi')->nullable();
            $table->string('tempoh_jaminan')->nullable();
            $table->string('nama_pembekal')->nullable();
            $table->string('alamat_pembekal')->nullable();
            $table->string('lokasi_penempatan')->nullable();
            $table->string('tarikh_penempatan')->nullable();
            $table->string('tarikh_pemeriksaan')->nullable();
            $table->string('status_aset')->nullable();
            $table->string('tarikh_usia_guna')->nullable();
            $table->string('usia_guna')->nullable();
            $table->string('nilai_semasa')->nullable();
            $table->string('perkara')->nullable();
            $table->string('rujukan_kelulusan')->nullable();
            $table->string('tarikh_kelulusan')->nullable();
            $table->date('date_created')->nullable();
            $table->date('date_modified')->nullable();
            $table->string('ketua_jabatan')->nullable();
            $table->string('pegawai_pemeriksa')->nullable();
            $table->string('pegawai_penempatan')->nullable();
            $table->string('pegawai_usia_guna')->nullable();
            $table->string('pegawai_pindahan')->nullable();
            $table->foreignId('rujukan_kewpa1_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kewpa3as');
    }
}


