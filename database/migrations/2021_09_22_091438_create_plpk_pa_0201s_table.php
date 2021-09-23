<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlpkPa0201sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plpk_pa_0201s', function (Blueprint $table) {
            $table->id()->unique();
            $table->string('no_wo')->nullable();
            $table->string('nama_pengadu')->nullable();
            $table->string('jabatan')->nullable();
            $table->string('plet_no_jenis_kenderaan')->nullable();
            $table->string('pengguna_terakhir')->nullable();
            $table->string('tandatangan_pengadu')->nullable();
            $table->string('tarikh_rosak')->nullable();
            $table->string('bil')->nullable();
            $table->string('perihal_rosak')->nullable();
            $table->string('kos_penyelenggaraan_dulu')->nullable();
            $table->string('anggaran_kos_penyelenggaraan')->nullable();
            $table->string('syor_ulasan')->nullable();
            $table->string('nama_pegawai')->nullable();
            $table->string('jawatan_pegawai')->nullable();
            $table->string('tarikh_pegawai')->nullable();
            $table->string('status')->nullable();
            $table->string('ulasan')->nullable();
            $table->string('nama_ketua')->nullable();
            $table->string('tarikh_lulus_tak')->nullable();
            $table->string('pemeriksa')->nullable();
            $table->string('pembaikan_dalaman_luar')->nullable();
            $table->string('alatganti')->nullable();
            $table->string('tarikh_pemeriksa')->nullable();
            $table->string('tandatangan_pemeriksa')->nullable();
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
        Schema::dropIfExists('plpk_pa_0201s');
    }
}
