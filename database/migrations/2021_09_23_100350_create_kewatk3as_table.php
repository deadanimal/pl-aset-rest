<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKewatk3asTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kewatk3as', function (Blueprint $table) {
            $table->id();
            $table->string("agensi")->nullable();
            $table->string("bahagian")->nullable();
            $table->string("kod_nasional")->nullable();
            $table->string("kategori")->nullable();
            $table->string("sub_kategori")->nullable();
            $table->string("jenis")->nullable();
            $table->string("rajuk")->nullable();
            $table->string("nombor_dalam_negara")->nullable();
            $table->string("nombor_luar_negara")->nullable();
            $table->string("tarikh_lulus_luput_dalam")->nullable();
            $table->string("tarikh_lulus_luput_luar")->nullable();
            $table->string("tarikh_permohonan_dalam")->nullable();
            $table->string("tarikh_permohonan_luar")->nullable();
            $table->string("tarikh_cipta_dalam")->nullable();
            $table->string("usia_guna")->nullable();
            $table->string("spesifikasi")->nullable();
            $table->string("harga_perolehan_asal")->nullable();
            $table->string("tarikh_dibeli")->nullable();
            $table->string("no_pesanan")->nullable();
            $table->string("tempoh_jaminan")->nullable();
            $table->string("nama_pembekal")->nullable();
            $table->string("alamat_pembekal")->nullable();
            $table->date("created_date")->nullable();
            $table->date("modified_date")->nullable();
            $table->string("staff_id")->nullable();
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
        Schema::dropIfExists('kewatk3as');
    }
}
