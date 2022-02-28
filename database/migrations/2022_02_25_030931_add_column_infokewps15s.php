<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnInfokewps15s extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('info_kewps15s', function (Blueprint $table) {
            $table->date('tarikh_penemuan');
            $table->string('selected')->nullable();
            $table->string('justifikasi')->nullable()->change();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('info_kewps15s', function (Blueprint $table) {
            $table->removeColumn('tarikh_penemuan');
            $table->removeColumn('selected');
            $table->string('justifikasi')->change();
        });
    }
}
