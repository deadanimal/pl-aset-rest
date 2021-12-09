<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJkrpata92sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jkrpata92s', function (Blueprint $table) {
            $table->id();
            $table->integer('tahun');
            $table->string('kementerian');
            $table->string('jabatan');
            $table->string('negeri');
            $table->string('daerah');
            $table->string('nama_premis');
            $table->string('alamat_premis');
            $table->string('kategori');
            $table->float('jumlah_saiz');
            $table->string('jumlah_pelaksana_projek');
            $table->string('jumlah_kos_rancang');
            $table->string('jumlah_kos_sebenar');
            $table->string('jumlah_abm');
            $table->string('jumlah_peruntukan');
            $table->float('jumlah_peratus_perbelanjaan');
            $table->string('catatan');
            $table->foreignId('staff_id');
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
        Schema::dropIfExists('jkrpata92s');
    }
}
