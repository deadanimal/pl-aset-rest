<?php

use App\Models\KaedahPelupusan;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubKaedahPelupusansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_kaedah_pelupusans', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(KaedahPelupusan::class);
            $table->string('text');
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
        Schema::dropIfExists('sub_kaedah_pelupusans');
    }
}
