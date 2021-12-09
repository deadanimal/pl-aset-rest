<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInfoJkrpata92sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('info_jkrpata92s', function (Blueprint $table) {
            $table->id();
            $table->string('nama_projek');
            $table->float('saiz_projek');
            $table->string('pelaksana_projek');
            $table->string('kos_rancang');
            $table->string('kos_sebenar');
            $table->string('abm');
            $table->string('peruntukan');
            $table->float('peratus_perbelanjaan');
            $table->date('tarikh_mula_rancang');
            $table->date('tarikh_siap_rancang');
            $table->date('tarikh_serahan_rancang');
            $table->date('tarikh_mula_sebenar');
            $table->date('tarikh_siap_sebenar');
            $table->date('tarikh_serahan_sebenar');
            $table->foreignId('jkrpata92_id');
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
        Schema::dropIfExists('info_jkrpata92s');
    }
}
