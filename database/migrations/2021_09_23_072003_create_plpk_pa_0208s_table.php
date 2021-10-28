<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlpkPa0208sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plpk_pa_0208s', function (Blueprint $table) {
            $table->id();

            $table->string("jenis_kegunaan")->nullable();
            $table->string("nama_pembekal")->nullable();
            $table->string("kos")->nullable();
            $table->string("no_pesanan_tempatan")->nullable();
            $table->string("tarikh_mula")->nullable();
            $table->string("tarikh_siap")->nullable();
            $table->string("tarikh")->nullable();
            $table->date("created_date")->nullable();
            $table->date("modified_date")->nullable();
            $table->string("pengadu_id")->nullable();
            $table->string("pemeriksa_id")->nullable();
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
        Schema::dropIfExists('plpk_pa_0208s');
    }
}
