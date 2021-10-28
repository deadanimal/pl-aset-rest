<?php

namespace App\Http\Controllers;

use App\Models\Kewpa10;
use Illuminate\Http\Request;

class Kewpa10Controller extends Controller
{
    public function index()
    {
      return Kewpa10::all();
    }

    public function store(Request $request)
    {
      
      $kewpa10 = new Kewpa10;
      $kewpa10 -> kewpa10_id = $request -> kewpa10_id;
      $kewpa10 -> tarikh_kerosakan = $request -> tarikh_kerosakan;
      $kewpa10 -> perihal_kerosakan = $request -> perihal_kerosakan;
      $kewpa10 -> tarikh_aduan = $request -> tarikh_aduan;
      $kewpa10 -> jumlah_kos_penyelenggaraan = $request -> jumlah_kos_penyelenggaraan;
      $kewpa10 -> anggaran_kos = $request -> anggaran_kos;
      $kewpa10 -> syor_ulasan = $request -> syor_ulasan;
      $kewpa10 -> tarikh_pegawai = $request -> tarikh_pegawai;
      $kewpa10 -> status = $request -> status;
      $kewpa10 -> ulasan = $request -> ulasan;
      $kewpa10 -> pengguna_terakhir = $request -> pengguna_terakhir;
      $kewpa10 -> pengadu = $request -> pengadu;
      $kewpa10 -> pegawai_aset = $request -> pegawai_aset;
      $kewpa10 -> ketua_jabatan = $request -> ketua_jabatan;
      $kewpa10 -> no_siri_pendaftaran = $request -> no_siri_pendaftaran;


      $kewpa10 -> save();

      return $kewpa10;
    }

    public function show(Kewpa10 $kewpa10)
    {
      return $kewpa10;
    }

    public function update(Request $request, Kewpa10 $kewpa10)
    {

      $kewpa10 -> kewpa10_id = $request -> kewpa10_id;
      $kewpa10 -> tarikh_kerosakan = $request -> tarikh_kerosakan;
      $kewpa10 -> perihal_kerosakan = $request -> perihal_kerosakan;
      $kewpa10 -> tarikh_aduan = $request -> tarikh_aduan;
      $kewpa10 -> jumlah_kos_penyelenggaraan = $request -> jumlah_kos_penyelenggaraan;
      $kewpa10 -> anggaran_kos = $request -> anggaran_kos;
      $kewpa10 -> syor_ulasan = $request -> syor_ulasan;
      $kewpa10 -> tarikh_pegawai = $request -> tarikh_pegawai;
      $kewpa10 -> status = $request -> status;
      $kewpa10 -> ulasan = $request -> ulasan;
      $kewpa10 -> pengguna_terakhir = $request -> pengguna_terakhir;
      $kewpa10 -> pengadu = $request -> pengadu;
      $kewpa10 -> pegawai_aset = $request -> pegawai_aset;
      $kewpa10 -> ketua_jabatan = $request -> ketua_jabatan;
      $kewpa10 -> no_siri_pendaftaran = $request -> no_siri_pendaftaran;
      $kewpa10 -> save();

      return $kewpa10;

    }

    public function destroy(Kewpa10 $kewpa10)
    {
      return $kewpa10->delete();
    }
}
