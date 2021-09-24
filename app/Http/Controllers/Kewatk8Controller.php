<?php

namespace App\Http\Controllers;

use App\Models\Kewatk8;
use Illuminate\Http\Request;

class Kewatk8Controller extends Controller
{
    public function index()
    {

      return Kewatk8::all();
    }


    public function store(Request $request)
    {
      $kewatk8 = new Kewatk8;
      $kewatk8->tajuk=$request->tajuk;
      $kewatk8->tarikh_kerosakan=$request->tarikh_kerosakan;
      $kewatk8->perihal_kerosakan=$request->perihal_kerosakan;
      $kewatk8->tarikh_aduan=$request->tarikh_aduan;
      $kewatk8->catatan=$request->catatan;
      $kewatk8->jumlah_kos=$request->jumlah_kos;
      $kewatk8->anggaran_kos=$request->anggaran_kos;
      $kewatk8->syor_ulasan=$request->syor_ulasan;
      $kewatk8->tarikh_pegawai=$request->tarikh_pegawai;
      $kewatk8->status=$request->status;
      $kewatk8->created_date=$request->created_date;
      $kewatk8->modified_date=$request->modified_date;
      $kewatk8->pengadu=$request->pengadu;
      $kewatk8->pengguna_terakhir=$request->pengguna_terakhir;
      $kewatk8->pegawai_aset=$request->pegawai_aset;
      $kewatk8->ketua_jabatan=$request->ketua_jabatan;
      $kewatk8->no_siri_pendaftaran=$request->no_siri_pendaftaran;      
      $kewatk8->save();

      return $kewatk8;
    }

    public function show(Kewatk8 $kewatk8)
    {

      return $kewatk8;
    }


    public function update(Request $request, Kewatk8 $kewatk8)
    {

      $kewatk8->tajuk=$request->tajuk;
      $kewatk8->tarikh_kerosakan=$request->tarikh_kerosakan;
      $kewatk8->perihal_kerosakan=$request->perihal_kerosakan;
      $kewatk8->tarikh_aduan=$request->tarikh_aduan;
      $kewatk8->catatan=$request->catatan;
      $kewatk8->jumlah_kos=$request->jumlah_kos;
      $kewatk8->anggaran_kos=$request->anggaran_kos;
      $kewatk8->syor_ulasan=$request->syor_ulasan;
      $kewatk8->tarikh_pegawai=$request->tarikh_pegawai;
      $kewatk8->status=$request->status;
      $kewatk8->created_date=$request->created_date;
      $kewatk8->modified_date=$request->modified_date;
      $kewatk8->pengadu=$request->pengadu;
      $kewatk8->pengguna_terakhir=$request->pengguna_terakhir;
      $kewatk8->pegawai_aset=$request->pegawai_aset;
      $kewatk8->ketua_jabatan=$request->ketua_jabatan;
      $kewatk8->no_siri_pendaftaran=$request->no_siri_pendaftaran;      
      $kewatk8->save();

      return $kewatk8;

    }

    public function destroy(Kewatk8 $kewatk8)
    {

      return $kewatk8->delete();
    }
}
