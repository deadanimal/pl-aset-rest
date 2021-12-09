<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInfoJkrpataf610sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('info_jkrpataf610s', function (Blueprint $table) {
            $table->id();
            $table->string('bil');
            $table->string('no_ptp');
            $table->string('no_lot');
            $table->string('status_pemilikan');
            $table->string('status_kegunaan_tanah');
            $table->string('saiz_blok');
            $table->string('bil_binaan');
            $table->string('saiz_binaan');
            $table->string('bil_sistem_utama');
            $table->string('kapasiti_sistem_utama');
            $table->string('populasi');
            $table->string('harga_tanah');
            $table->string('harga_pembinaan');
            $table->string('catatan');
            $table->foreignId('jkrpataf610_id');
            $table->foreignId('staff_id')->nullable();
            $table->foreignId('jkrpataf68_id');

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
        Schema::dropIfExists('info_jkrpataf610s');
    }
}
