<?php

namespace App\Http\Controllers;

use App\Models\InfoKewpa21;
use Illuminate\Http\Request;

class InfoKewpa21Controller extends Controller
{
    public function index()
    {
      return InfoKewpa21::all();
    }

    public function store(Request $request)
    {
      
      $info_kewpa21 = new InfoKewpa21;
      $info_kewpa21->keadaan_aset=$request->keadaan_aset;
      $info_kewpa21->kaedah_pelupusan=$request->kaedah_pelupusan;
      $info_kewpa21->justifikasi=$request->justifikasi;
      $info_kewpa21->keputusan_melulus=$request->keputusan_melulus;
      $info_kewpa21->catatan=$request->catatan;
      $info_kewpa21->no_siri_pendaftaran=$request->no_siri_pendaftaran;
      $info_kewpa21->kewpa21_id=$request->kewpa21_id;

      $info_kewpa21 -> save();

      return $info_kewpa21;
    }

    public function show(InfoKewpa21 $info_kewpa21)
    {
      return $info_kewpa21;
    }

    public function update(Request $request, InfoKewpa21 $info_kewpa21)
    {

      $info_kewpa21->keadaan_aset=$request->keadaan_aset;
      $info_kewpa21->kaedah_pelupusan=$request->kaedah_pelupusan;
      $info_kewpa21->justifikasi=$request->justifikasi;
      $info_kewpa21->keputusan_melulus=$request->keputusan_melulus;
      $info_kewpa21->catatan=$request->catatan;
      $info_kewpa21->no_siri_pendaftaran=$request->no_siri_pendaftaran;
      $info_kewpa21->kewpa21_id=$request->kewpa21_id;


      $info_kewpa21 -> save();

      return $info_kewpa21;

    }

    public function destroy(InfoKewpa21 $info_kewpa21)
    {
      return $info_kewpa21->delete();
    }



}
