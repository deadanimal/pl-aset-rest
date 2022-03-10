<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddInputsOnDatatanahs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('data_tanahs', function (Blueprint $table) {
            // drop id foreign
            $table->dropColumn('jkrpataf68_id');
            $table->string('no_rujukan_tanah');
            $table->string('tarikh_pendaftaran');
            $table->string('nama_tanah');
            $table->string('alamat_tanah');
            $table->string('koordinat_gps');
            $table->string('no_dpa');
            $table->string('gambar_premis');
          });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
