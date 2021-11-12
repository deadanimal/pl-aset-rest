<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKeluaranStokSukuTahunsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('keluaran_stok_suku_tahuns', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kewps3a_id');
            $table->date('tahun_keluar_stok')->nullable();
            $table->integer('kuantiti_keluar_stok_pertama')->nullable();
            $table->string('nilai_kuantiti_keluar_pertama')->nullable();
            $table->integer('kuantiti_keluar_stok_kedua')->nullable();
            $table->string('nilai_kuantiti_keluar_kedua')->nullable();
            $table->integer('kuantiti_keluar_stok_ketiga')->nullable();
            $table->string('nilai_kuantiti_keluar_ketiga')->nullable();
            $table->integer('kuantiti_keluar_stok_keempat')->nullable();
            $table->string('nilai_kuantiti_keluar_keempat')->nullable();

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
        Schema::dropIfExists('keluaran_stok_suku_tahuns');
    }
}
