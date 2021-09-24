<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKewatk8sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kewatk8s', function (Blueprint $table) {
            $table->id();
            $table->string("tajuk")->nullable();
            $table->string("tarikh_kerosakan")->nullable();
            $table->string("perihal_kerosakan")->nullable();
            $table->string("tarikh_aduan")->nullable();
            $table->string("catatan")->nullable();
            $table->string("jumlah_kos")->nullable();
            $table->string("anggaran_kos")->nullable();
            $table->string("syor_ulasan")->nullable();
            $table->string("tarikh_pegawai")->nullable();
            $table->string("status")->nullable();
            $table->date("created_date")->nullable();
            $table->date("modified_date")->nullable();
            $table->string("pengadu")->nullable();
            $table->string("pengguna_terakhir")->nullable();
            $table->string("pegawai_aset")->nullable();
            $table->string("ketua_jabatan")->nullable();
            $table->string("no_siri_pendaftaran")->nullable();
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
        Schema::dropIfExists('kewatk8s');
    }
}
