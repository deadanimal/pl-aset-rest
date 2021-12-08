<?php

namespace Database\Seeders;

use App\Models\KodJabatan;
use Illuminate\Database\Seeder;

class KodJabatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        KodJabatan::create([
            'singkatan' => "KPE",
            'nama_jabatan' => "PEJABAT KETUA PEGAWAI EKSEKUTIF"
        ]);
        KodJabatan::create([
            'singkatan' => "JHEK",
            'nama_jabatan' => "HAL EHWAL KORPORAT"
        ]);
        KodJabatan::create([
            'singkatan' => "JAD",
            'nama_jabatan' => "AUDIT DALAM"
        ]);
        KodJabatan::create([
            'singkatan' => "PUU",
            'nama_jabatan' => "UNDANG-UNDANG"
        ]);
        KodJabatan::create([
            'singkatan' => "JPK",
            'nama_jabatan' => "PEMBANGUNAN DAN KEJURUTERAAN"
        ]);
        KodJabatan::create([
            'singkatan' => "JPKK",
            'nama_jabatan' => "PELANCONGAN, KEBUDAYAAN DAN KESENIAN"
        ]);
        KodJabatan::create([
            'singkatan' => "JPKB",
            'nama_jabatan' => "PERANCANGAN DAN KAWALAN BANGUNAN"
        ]);
        KodJabatan::create([
            'singkatan' => "JPP",
            'nama_jabatan' => "PERKHIDMATAN PERBANDARAN"
        ]);
        KodJabatan::create([
            'singkatan' => "JPSE",
            'nama_jabatan' => "PELABURAN DAN SOSIO EKONOMI"
        ]);
        KodJabatan::create([
            'singkatan' => "JKP",
            'nama_jabatan' => "JABATAN KHIDMAT PENGURUSAN"
        ]);
        KodJabatan::create([
            'singkatan' => "JK",
            'nama_jabatan' => "JABATAN KEWANGAN"
        ]);
        KodJabatan::create([
            'singkatan' => "JPPH",
            'nama_jabatan' => "PENILAIAN DAN PENGURUSAN HARTA"
        ]);
        KodJabatan::create([
            'singkatan' => "PAL",
            'nama_jabatan' => "PERPUSTAKAAN AWAM LABUAN"
        ]);
        KodJabatan::create([
            'singkatan' => "JPM",
            'nama_jabatan' => "PENGURUSAN MAKLUMAT"
        ]);
        KodJabatan::create([
            'singkatan' => "UB",
            'nama_jabatan' => "UKUR BAHAN"
        ]);
        KodJabatan::create([
            'singkatan' => "JPSM",
            'nama_jabatan' => "PENGURUSAN SUMBER MANUSIA"
        ]);
        KodJabatan::create([
            'singkatan' => "3P",
            'nama_jabatan' => "UNIT PELARASAN, PEMANTAUAN & PENILAIAN KAJIAN IMPAK"
        ]);
        KodJabatan::create([
            'singkatan' => "JE",
            'nama_jabatan' => "PENGUATKUASA"
        ]);
        KodJabatan::create([
            'singkatan' => "UI",
            'nama_jabatan' => "UNIT INTEGRITI"
        ]);
        KodJabatan::create([
            'singkatan' => "JL",
            'nama_jabatan' => "LESEN"
        ]);
        KodJabatan::create([
            'singkatan' => "TKPE(A)",
            'nama_jabatan' => "PEJABAT TIMBALAN KETUA PEGAWAI EKSEKUTIF PENGURUSAN"
        ]);
        KodJabatan::create([
            'singkatan' => "TKPE(M)",
            'nama_jabatan' => "PEJABAT TIMBALAN KETUA PEGAWAI EKSEKUTIF PEMBANDARAN"
        ]);
        KodJabatan::create([
            'singkatan' => "TKPE(D)",
            'nama_jabatan' => "PEJABAT TIMBALAN KETUA PEGAWAI EKSEKUTIF PEMBANGUNAN"
        ]);
    }
}
