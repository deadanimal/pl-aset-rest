<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKewatk1sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kewatk1s', function (Blueprint $table) {
            $table->id();
            $table->string("no_rujukan_kewatk1")->nullable();
            $table->string("status")->nullable();
            $table->string("nama_pembekal")->nullable();
            $table->string("alamat_pembekal")->nullable();
            $table->string("jenis_penerimaan")->nullable();
            $table->string("no_pk")->nullable();
            $table->string("tarikh_pk")->nullable();
            $table->string("no_do")->nullable();
            $table->string("tarikh_do")->nullable();
            $table->string("maklumat_pengangkutan")->nullable();
            $table->date("created_date")->nullable();
            $table->date("modified_date")->nullable();
            $table->string("pegawai_penerima")->nullable();
            $table->string("pegawai_pakar")->nullable();
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
        Schema::dropIfExists('kewatk1s');
    }
}
