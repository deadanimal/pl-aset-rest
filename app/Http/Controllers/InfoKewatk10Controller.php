<?php

namespace App\Http\Controllers;

use App\Models\InfoKewatk10;
use App\Models\InfoKewatk9;
use App\Models\Kewatk10;
use App\Models\Kewatk9;
use Illuminate\Http\Request;

class InfoKewatk10Controller extends Controller
{
    public function index()
    {
      return InfoKewatk10::all();
    }

    public function store($tahun, $kewatk10_id)
    {
      // on query
      // make sure all data use for calculation created_by value must comply with current $tahun value

      // null check
      $info_kewatk10 = InfoKewatk10::where('tahun_semasa', $tahun)->first();
      if ($info_kewatk10!=null) {
        $info_kewatk10->delete();
      }


      $kuantiti_keseluruhan = count(Kewatk10::all());
      $kuantiti_diperiksa = count(Kewatk9::all());
      $kuantiti_tidak_diperiksa = $kuantiti_keseluruhan - $kuantiti_diperiksa;
      $peratusan_diperiksa = ($kuantiti_diperiksa/$kuantiti_keseluruhan)*100;


      $info_kewatk10 = new InfoKewatk10;
      $info_kewatk10->tahun_semasa=$tahun;
      $info_kewatk10->kuantiti_keseluruhan=$kuantiti_keseluruhan;
      $info_kewatk10->kuantiti_diperiksa=$kuantiti_diperiksa;
      $info_kewatk10->kuantiti_tidak_diperiksa=$kuantiti_tidak_diperiksa;
      $info_kewatk10->peratusan_diperiksa=$peratusan_diperiksa;
      $info_kewatk10->kuantiti_asetA=count(InfoKewatk9::where('status_harta','(A) Sempurna')->get());
      $info_kewatk10->kuantiti_asetB=count(InfoKewatk9::where('status_harta','(B) Tidak Sempurna')->get());
      $info_kewatk10->kuantiti_asetC=count(InfoKewatk9::where('status_harta','(C) Perlu Pembaikan')->get());
      $info_kewatk10->kuantiti_asetD=count(InfoKewatk9::where('status_harta','(D) Sedang Diselenggara')->get());
      $info_kewatk10->kuantiti_asetE=count(InfoKewatk9::where('status_harta','(E) Medium Rosak/Tidak Sesuai')->get());
      $info_kewatk10->kuantiti_asetF=count(InfoKewatk9::where('status_harta','(F) Hilang')->get());
      $info_kewatk10->kewatk10_id=$kewatk10_id;

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
