<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJkrpataf610sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jkrpataf610s', function (Blueprint $table) {
            $table->id();
            $table->string('kementerian');
            $table->string('jabatan');
            $table->string('negeri');
            $table->string('daerah');
            $table->integer('bulan');
            $table->integer('tahun');
            $table->string('kategori_aset');
            $table->string('disediakan_oleh')->nullable();
            $table->string('disahkan_oleh')->nullable();
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
        Schema::dropIfExists('jkrpataf610s');
    }
}
