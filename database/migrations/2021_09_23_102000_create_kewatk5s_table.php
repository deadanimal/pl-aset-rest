<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKewatk5sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kewatk5s', function (Blueprint $table) {
            $table->id();
            $table->string("cara_diperolehi")->nullable();
            $table->string("tarikh_terima")->nullable();
            $table->string("harga_perolehan_asal")->nullable();
            $table->string("anggaran_nilai_semasa")->nullable();
            $table->string("status_aset")->nullable();
            $table->date("created_date")->nullable();
            $table->date("modified_date")->nullable();
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
        Schema::dropIfExists('kewatk5s');
    }
}
