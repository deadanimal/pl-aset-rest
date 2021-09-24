<?php

namespace App\Http\Controllers;

use App\Models\InfoKewatk10;
use Illuminate\Http\Request;

class InfoKewatk10Controller extends Controller
{
public function index()
    {
      return InfoKewatk10::all();
    }

    public function store(Request $request)
    {
      $info_kewatk10 = new InfoKewatk10;

      $info_kewatk10->tahun_semasa=$request->tahun_semasa;
      $info_kewatk10->kuantiti_keseluruhan=$request->kuantiti_keseluruhan;
      $info_kewatk10->kuantiti_diperiksa=$request->kuantiti_diperiksa;
      $info_kewatk10->kuantiti_tidak_diperiksa=$request->kuantiti_tidak_diperiksa;
      $info_kewatk10->peratusan_diperiksa=$request->peratusan_diperiksa;
      $info_kewatk10->kuantiti_asetA=$request->kuantiti_asetA;
      $info_kewatk10->kuantiti_asetB=$request->kuantiti_asetB;
      $info_kewatk10->kuantiti_asetC=$request->kuantiti_asetC;
      $info_kewatk10->kuantiti_asetD=$request->kuantiti_asetD;
      $info_kewatk10->kuantiti_asetE=$request->kuantiti_asetE;
      $info_kewatk10->kuantiti_asetF=$request->kuantiti_asetF;
      $info_kewatk10->kewatk10_id=$request->kewatk10_id;
      $info_kewatk10->no_siri_pendaftaran=$request->no_siri_pendaftaran;

      $info_kewatk10 -> save();


      return $info_kewatk10;

      
    }

    public function show(InfoKewatk10 $info_kewatk10)
    {
      return $info_kewatk10;
    }

    public function update(Request $request, InfoKewatk10 $info_kewatk10)
    {
      $info_kewatk10->tahun_semasa=$request->tahun_semasa;
      $info_kewatk10->kuantiti_keseluruhan=$request->kuantiti_keseluruhan;
      $info_kewatk10->kuantiti_diperiksa=$request->kuantiti_diperiksa;
      $info_kewatk10->kuantiti_tidak_diperiksa=$request->kuantiti_tidak_diperiksa;
      $info_kewatk10->peratusan_diperiksa=$request->peratusan_diperiksa;
      $info_kewatk10->kuantiti_asetA=$request->kuantiti_asetA;
      $info_kewatk10->kuantiti_asetB=$request->kuantiti_asetB;
      $info_kewatk10->kuantiti_asetC=$request->kuantiti_asetC;
      $info_kewatk10->kuantiti_asetD=$request->kuantiti_asetD;
      $info_kewatk10->kuantiti_asetE=$request->kuantiti_asetE;
      $info_kewatk10->kuantiti_asetF=$request->kuantiti_asetF;
      $info_kewatk10->kewatk10_id=$request->kewatk10_id;
      $info_kewatk10->no_siri_pendaftaran=$request->no_siri_pendaftaran;


      $info_kewatk10 -> save();


      return $info_kewatk10;


    }

    public function destroy(InfoKewatk10 $info_kewatk10)
    {
      return $info_kewatk10->delete();
    }
}
