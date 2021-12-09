 <?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKewps3bsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kewps3bs', function (Blueprint $table) {
            $table->id();
            $table->date('tarikh');
            $table->string('no_transaksi')->nullable();
            $table->string('terima_keluar')->nullable();
            $table->integer('kuantiti_terima')->nullable();
            $table->string('harga_seunit_terima')->nullable();
            $table->string('jumlah_harga_terima')->nullable();
            $table->integer('kuantiti_keluar')->nullable();
            $table->string('harga_jumlah_keluar')->nullable();
            $table->integer('kuantiti_baki')->nullable();
            $table->string('jumlah_harga_baki')->nullable();
            $table->foreignId('user_id')->nullable();
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
        Schema::dropIfExists('kewps3bs');
    }
}
