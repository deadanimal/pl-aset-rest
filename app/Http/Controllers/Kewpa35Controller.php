<?php

namespace App\Http\Controllers;

use App\Models\Kewpa35;
use Illuminate\Http\Request;

class Kewpa35Controller extends Controller
{
    public function index()
    {
      return Kewpa35::all();
    }

    public function store(Request $request)
    {
      
      $kewpa35 = new Kewpa35;
      $kewpa35->laporan_hasil=$request->laporan_hasil;
      $kewpa35->arahan_tatacara=$request->arahan_tatacara;
      $kewpa35->langkah_mencegah=$request->langkah_mencegah;
      $kewpa35->rumusan_siasatan=$request->rumusan_siasatan;
      $kewpa35->syor=$request->syor;
      $kewpa35->justifikasi=$request->justifikasi;
      $kewpa35->ulasan_pegawai=$request->ulasan_pegawai;
      $kewpa35->syor_pegawai=$request->syor_pegawai;
      $kewpa35->pegawai_menjaga=$request->pegawai_menjaga;
      $kewpa35->pegawai_penyelia=$request->pegawai_penyelia;
      $kewpa35->pegawai_bertanggungjawab=$request->pegawai_bertanggungjawab;
      $kewpa35->pengerusi=$request->pengerusi;
      $kewpa35->ahli=$request->ahli;
      $kewpa35->pegawai_pengawal=$request->pegawai_pengawal;
      $kewpa35 -> save();

      return $kewpa35;
    }

    public function show(Kewpa35 $kewpa35)
    {
      return $kewpa35;
    }

    public function update(Request $request, Kewpa35 $kewpa35)
    {

      $kewpa35->laporan_hasil=$request->laporan_hasil;
      $kewpa35->arahan_tatacara=$request->arahan_tatacara;
      $kewpa35->langkah_mencegah=$request->langkah_mencegah;
      $kewpa35->rumusan_siasatan=$request->rumusan_siasatan;
      $kewpa35->syor=$request->syor;
      $kewpa35->justifikasi=$request->justifikasi;
      $kewpa35->ulasan_pegawai=$request->ulasan_pegawai;
      $kewpa35->syor_pegawai=$request->syor_pegawai;
      $kewpa35->pegawai_menjaga=$request->pegawai_menjaga;
      $kewpa35->pegawai_penyelia=$request->pegawai_penyelia;
      $kewpa35->pegawai_bertanggungjawab=$request->pegawai_bertanggungjawab;
      $kewpa35->pengerusi=$request->pengerusi;
      $kewpa35->ahli=$request->ahli;
      $kewpa35->pegawai_pengawal=$request->pegawai_pengawal;
      $kewpa35 -> save();

      return $kewpa35;

    }

    public function destroy(Kewpa35 $kewpa35)
    {
      return $kewpa35->delete();
    }
}
