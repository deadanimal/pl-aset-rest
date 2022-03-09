<?php

use App\Models\Kewps21;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInfoKewps21sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('info_kewps21s', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Kewps21::class)->nullable();
            $table->string('kuantiti')->nullable();
            $table->string('secara')->nullable();
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
        Schema::dropIfExists('info_kewps21s');
    }
}
