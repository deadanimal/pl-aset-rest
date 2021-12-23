<?php

namespace Database\Seeders;

use App\Models\KaedahPelupusan;
use Illuminate\Database\Seeder;

class KaedahPelupusanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $data =
            [
                [
                    'value' => 1,
                    'text' => 'Jualan (Tender/ Sebut Harga/ Lelong)'
                ], [
                    'value' => 2,
                    'text' => 'Buangan Terjadual (E-Waste/ Sisa Pepejal)'
                ], [
                    'value' => 3,
                    'text' => 'Jualan Sisa (Tender/ Sebut Harga/ Jualan Terus)'
                ], [
                    'value' => 4,
                    'text' => 'Tukar Ganti/ Tukar Beli/ Tukar Barang/ Perkhidmatan'
                ], [
                    'value' => 5,
                    'text' => 'Hadiah/ Serahan'
                ], [
                    'value' => 6,
                    'text' => 'Musnah (Tanam/ Bakar/ Buang/ Tenggelam/ Letup/ Ledak/ Lebur)'
                ], [
                    'value' => 7,
                    'text' => 'Kaedah-Kaedah Lain'
                ]
            ];

        KaedahPelupusan::insert($data);
    }
}
