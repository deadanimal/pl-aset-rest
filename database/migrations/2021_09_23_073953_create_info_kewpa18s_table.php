<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInfoKewpa18sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('info_kewpa18s', function (Blueprint $table) {

            $table->id();

            $table->string("agensi")->nullable();
            $table->string("kuantiti_terimaan")->nullable();
            $table->string("jumlah_perolehan_terimaan")->nullable();
            $table->string("jumlah_nilai_semasa_terimaan")->nullable();
            $table->string("kuantiti_pengeluaran")->nullable();
            $table->string("jumlah_perolehan_pengeluaran")->nullable();
            $table->string("jumlah_nilai_semasa_pengeluaran")->nullable();
            $table->string("kewpa17_id")->nullable();
            $table->string("kewpa18_id")->nullable();
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
        Schema::dropIfExists('info_kewpa18s');
    }
}
