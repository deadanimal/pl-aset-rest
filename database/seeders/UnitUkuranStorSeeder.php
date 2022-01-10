<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UnitUkuranStorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ["unit_ukuran" => "Unit",
                "penerangan" => "Unit"],
            ["unit_ukuran" => "Kotak",
                "penerangan" => "Kotak"],
            ["unit_ukuran" => "Rim",
                "penerangan" => "Rim"],
            ["unit_ukuran" => "Butang",
                "penerangan" => "Butang"],
            ["unit_ukuran" => "Buah",
                "penerangan" => "Buah"],
            ["unit_ukuran" => "Bilah",
                "penerangan" => "Bilah"],
            ["unit_ukuran" => "Paket",
                "penerangan" => "Paket"],
            ["unit_ukuran" => "Keping",
                "penerangan" => "Keping"],
            ["unit_ukuran" => "Gulung",
                "penerangan" => "Gulung"],
            // ["unit_ukuran" => "",
            //     "penerangan" => ""],
        ];

        DB::table('unit_ukuran_stors')->insert($data);

    }
}
