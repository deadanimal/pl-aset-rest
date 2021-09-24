<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInfoKewatk4sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('info_kewatk4s', function (Blueprint $table) {
            $table->id();
            $table->string("jenis")->nullable();
            $table->string("tajuk")->nullable();
            $table->string("no_pesanan")->nullable();
            $table->string("tarikh_terima")->nullable();
            $table->string("kuantiti")->nullable();
            $table->string("harga")->nullable();
            $table->string("tempoh_dari")->nullable();
            $table->string("tempoh_hingga")->nullable();
            $table->string("catatan")->nullable();
            $table->string("pegawai_penempatan")->nullable();
            $table->string("kewatk4_id")->nullable();
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
        Schema::dropIfExists('info_kewatk4s');
    }
}
