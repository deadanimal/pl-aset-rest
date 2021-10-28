<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKewpa1sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kewpa1s', function (Blueprint $table) {
            $table->id();
            $table->string("nama_pembekal")->nullable();
            $table->string("alamat_pembekal")->nullable();
            $table->string("jenis_penerimaan")->nullable();
            $table->string("no_rujukan_pesanan")->nullable();
            $table->string("tarikh_pesanan_kontrak")->nullable();
            $table->string("no_rujukan_hantaran")->nullable();
            $table->string("tarikh_nota_hantaran")->nullable();
            $table->string("maklumat_pengangkutan")->nullable();
            $table->date("date_created")->nullable();
            $table->date("date_modified")->nullable();
            $table->string("pegawai_penerima")->nullable();
            $table->string("pegawai_teknikal")->nullable();
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
        Schema::dropIfExists('kewpa1s');
    }
}
