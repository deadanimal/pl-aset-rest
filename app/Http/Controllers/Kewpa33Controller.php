<?php

namespace App\Http\Controllers;

use App\Models\Kewpa33;
use Illuminate\Http\Request;

class Kewpa33Controller extends Controller
{
    public function index()
    {
      return Kewpa33::all();
    }

    public function store(Request $request)
    {
      
      $kewpa33 = new Kewpa33;
      $kewpa33->tempat_kehilangan=$request->tempat_kehilangan;
      $kewpa33->tarikh_kehilangan=$request->tarikh_kehilangan;
      $kewpa33->cara_kehilangan=$request->cara_kehilangan;
      $kewpa33->no_rujukan_polis=$request->no_rujukan_polis;
      $kewpa33->tarikh_laporan_polis=$request->tarikh_laporan_polis;
      $kewpa33->langkah_sedia_ada=$request->langkah_sedia_ada;
      $kewpa33->langkah_segera=$request->langkah_segera;
      $kewpa33->dokumen_sokongan=$request->dokumen_sokongan;
      $kewpa33->gambar=$request->gambar;
      $kewpa33->catatan=$request->catatan;
      $kewpa33->pegawai_terakhir=$request->pegawai_terakhir;
      $kewpa33->ketua_jabatan=$request->ketua_jabatan;
      $kewpa33 -> save();

      return $kewpa33;
    }

    public function show(Kewpa33 $kewpa33)
    {
      return $kewpa33;
    }

    public function update(Request $request, Kewpa33 $kewpa33)
    {

      $kewpa33->tempat_kehilangan=$request->tempat_kehilangan;
      $kewpa33->tarikh_kehilangan=$request->tarikh_kehilangan;
      $kewpa33->cara_kehilangan=$request->cara_kehilangan;
      $kewpa33->no_rujukan_polis=$request->no_rujukan_polis;
      $kewpa33->tarikh_laporan_polis=$request->tarikh_laporan_polis;
      $kewpa33->langkah_sedia_ada=$request->langkah_sedia_ada;
      $kewpa33->langkah_segera=$request->langkah_segera;
      $kewpa33->dokumen_sokongan=$request->dokumen_sokongan;
      $kewpa33->gambar=$request->gambar;
      $kewpa33->catatan=$request->catatan;
      $kewpa33->pegawai_terakhir=$request->pegawai_terakhir;
      $kewpa33->ketua_jabatan=$request->ketua_jabatan;
      $kewpa33 -> save();

      return $kewpa33;

    }

    public function destroy(Kewpa33 $kewpa33)
    {
      return $kewpa33->delete();
    }
}
