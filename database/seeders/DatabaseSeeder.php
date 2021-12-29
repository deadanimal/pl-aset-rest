<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        $this->call(KodJabatanSeeder::class);
        $this->call(KaedahPelupusanSeeder::class);
        $this->call(NegaraSeeder::class);
        $this->call(NegeriSeeder::class);

        User::create([
            'id' => 1,
            'name' => 'amirul',
            'email' => 'a@gmail.com',
            'jawatan' => 'user',
            'prima_facie' => 'superadmin',
            'ditahan_kerja' => 1,
            'password' => '$2y$10$jx6D85edI.tsup.5eJq74.0q4HEPXQg71SxCV0NPtmWmrPgehoE82', //12345678
        ]);

        $this->call([
            PengumumanSeeder::class,
        ]);
    }
}
