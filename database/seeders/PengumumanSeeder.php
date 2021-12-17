<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pengumuman;

class PengumumanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      Pengumuman::create([
        'info_pengumuman'=>'test',
        'tajuk'=>'test',
        'status'=> 'Aktif'
      ]);
    }
}
