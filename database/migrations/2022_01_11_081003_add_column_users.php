<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('nama_awal')->nullable();
            $table->string('nama_akhir')->nullable();
            $table->boolean('kunci')->nullable();
            $table->boolean('nyahaktif')->nullable();
            $table->string('paparan_nama')->nullable();
            $table->date('tarikh_mula')->nullable();
            $table->date('tarikh_akhir')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('nama_awal')->nullable();
            $table->dropColumn('nama_akhir')->nullable();
            $table->dropColumn('kunci')->nullable();
            $table->dropColumn('nyahaktif')->nullable();
            $table->dropColumn('paparan_nama')->nullable();
            $table->dropColumn('tarikh_mula')->nullable();
            $table->dropColumn('tarikh_akhir')->nullable();

        });
    }
}
