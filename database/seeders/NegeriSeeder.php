<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NegeriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'nama' => "Wilayah Persekutuan Kuala Lumpur",
                'negara_id' => 125,
            ], [
                'nama' => "Wilayah Persekutuan Labuan",
                'negara_id' => 125,
            ], [
                'nama' => "Wilayah Persekutuan Putrajaya",
                'negara_id' => 125,
            ], [
                'nama' => "Johor",
                'negara_id' => 125,
            ], [
                'nama' => "Kedah",
                'negara_id' => 125,
            ], [
                'nama' => "Kelantan",
                'negara_id' => 125,
            ], [
                'nama' => "Melaka",
                'negara_id' => 125,
            ], [
                'nama' => "Negeri Sembilan",
                'negara_id' => 125,
            ], [
                'nama' => "Pahang",
                'negara_id' => 125,
            ], [
                'nama' => "Perak",
                'negara_id' => 125,
            ], [
                'nama' => "Perlis",
                'negara_id' => 125,
            ], [
                'nama' => "Pulau Pinang",
                'negara_id' => 125,
            ], [
                'nama' => "Sabah",
                'negara_id' => 125,
            ], [
                'nama' => "Sarawak",
                'negara_id' => 125,
            ], [
                'nama' => "Selangor",
                'negara_id' => 125,
            ], [
                'nama' => "Terengganu",
                'negara_id' => 125,
            ]
        ];

        DB::table('negeri')->insert($data);
    }
}
