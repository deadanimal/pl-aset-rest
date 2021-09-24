<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKewatk3bsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kewatk3bs', function (Blueprint $table) {
            $table->id();

            $table->string("kos")->nullable();
            $table->string("nilai_semasa")->nullable();
            $table->string("tempoh_jaminan")->nullable();
            $table->string("status")->nullable();
            $table->string("tarikh_dipasang")->nullable();
            $table->string("tarikh_dikeluarkan")->nullable();
            $table->string("tarikh_dilupus_hapus")->nullable();
            $table->string("catatan")->nullable();
            $table->string("staff_id")->nullable();
            $table->string("no_siri_pendaftaran")->nullable();
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
        Schema::dropIfExists('kewatk3bs');
    }
}
