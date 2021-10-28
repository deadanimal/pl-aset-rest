<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKewpa12sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kewpa12s', function (Blueprint $table) {
            $table->id();
            $table->string("tahun")->nullable();
            $table->string("kuantiti_keseluruhan_pertama")->nullable();
            $table->string("kuantiti_diperiksa_pertama")->nullable();
            $table->string("kuantiti_takdiperiksa_pertama")->nullable();
            $table->string("peratusan_aset_diperiksa_pertama")->nullable();
            $table->string("kuantiti_keseluruhan_kedua")->nullable();
            $table->string("kuantiti_diperiksa_kedua")->nullable();
            $table->string("kuantiti_takdiperiksa_kedua")->nullable();
            $table->string("peratusan_aset_diperiksa_kedua")->nullable();
            $table->string("kuantiti_keseluruhan_ketiga")->nullable();
            $table->string("kuantiti_diperiksa_ketiga")->nullable();
            $table->string("kuantiti_takdiperiksa_ketiga")->nullable();
            $table->string("peratusan_aset_diperiksa_ketiga")->nullable();
            $table->string("kuantiti_keseluruhan_keempat")->nullable();
            $table->string("kuantiti_diperiksa_keempat")->nullable();
            $table->string("kuantiti_takdiperiksa_keempat")->nullable();
            $table->string("peratusan_aset_diperiksa_keempat")->nullable();
            $table->string("jumlah_keseluruhan_diperiksa")->nullable();
            $table->string("kuantiti_asetA")->nullable();
            $table->string("kuantiti_asetB")->nullable();
            $table->string("kuantiti_asetC")->nullable();
            $table->string("kuantiti_asetD")->nullable();
            $table->string("kuantiti_asetE")->nullable();
            $table->string("kuantiti_asetF")->nullable();
            $table->date("date_created")->nullable();
            $table->date("date_modified")->nullable();
            $table->string("no_siri_pendaftaran")->nullable();
            $table->string("staff_id")->nullable();
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
        Schema::dropIfExists('kewpa12s');
    }
}
