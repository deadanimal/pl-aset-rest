<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColKewps22 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('kewps22s', function (Blueprint $table) {
            $table->string('no_rujukan')->nullable();
            $table->string('tarikh')->nullable();
            $table->string('hasil_pelupusan')->nullable();
            $table->string('nama_syarikat')->nullable();
            $table->string('url_gamba')->nullable();
            $table->string('kod_pengendalian')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('kewps22s', function (Blueprint $table) {
            $table->dropColumn('no_rujukan');
            $table->dropColumn('tarikh');
            $table->dropColumn('hasil_pelupusan');
            $table->dropColumn('nama_syarikat');
            $table->dropColumn('url_gamba');
            $table->dropColumn('kod_pengendalian');
        });
    }
}
