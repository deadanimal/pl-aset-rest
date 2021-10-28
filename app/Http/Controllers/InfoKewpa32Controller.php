<?php

namespace App\Http\Controllers;

use App\Models\InfoKewpa32;
use Illuminate\Http\Request;

class InfoKewpa32Controller extends Controller
{
    public function index()
    {
      return InfoKewpa32::all();
    }

    public function store(Request $request)
    {
      
      $info_kewpa32 = new InfoKewpa32;
      $info_kewpa32->agensi=$request->agensi;
      $info_kewpa32->kuantiti=$request->kuantiti;
      $info_kewpa32->nilai_perolehan=$request->nilai_perolehan;
      $info_kewpa32->kaedahA=$request->kaedahA;
      $info_kewpa32->kaedahB=$request->kaedahB;
      $info_kewpa32->kaedahC=$request->kaedahC;
      $info_kewpa32->kaedahD=$request->kaedahD;
      $info_kewpa32->kaedahE=$request->kaedahE;
      $info_kewpa32->kaedahF=$request->kaedahF;
      $info_kewpa32->kaedahG=$request->kaedahG;
      $info_kewpa32->kaedahH=$request->kaedahH;
      $info_kewpa32->kaedahI=$request->kaedahI;
      $info_kewpa32->kaedahJ=$request->kaedahJ;
      $info_kewpa32->nilai_semasa=$request->nilai_semasa;
      $info_kewpa32->hasil_pelupusan =$request->hasil_pelupusan ;
      $info_kewpa32->kos_pengendalian =$request->kos_pengendalian ;
      $info_kewpa32->kewpa21_id=$request->kewpa21_id;
      $info_kewpa32->kewpa32_id=$request->kewpa32_id;
      $info_kewpa32 -> save();

      return $info_kewpa32;
    }

    public function show(InfoKewpa32 $info_kewpa32)
    {
      return $info_kewpa32;
    }

    public function update(Request $request, InfoKewpa32 $info_kewpa32)
    {

      $info_kewpa32->agensi=$request->agensi;
      $info_kewpa32->kuantiti=$request->kuantiti;
      $info_kewpa32->nilai_perolehan=$request->nilai_perolehan;
      $info_kewpa32->kaedahA=$request->kaedahA;
      $info_kewpa32->kaedahB=$request->kaedahB;
      $info_kewpa32->kaedahC=$request->kaedahC;
      $info_kewpa32->kaedahD=$request->kaedahD;
      $info_kewpa32->kaedahE=$request->kaedahE;
      $info_kewpa32->kaedahF=$request->kaedahF;
      $info_kewpa32->kaedahG=$request->kaedahG;
      $info_kewpa32->kaedahH=$request->kaedahH;
      $info_kewpa32->kaedahI=$request->kaedahI;
      $info_kewpa32->kaedahJ=$request->kaedahJ;
      $info_kewpa32->nilai_semasa=$request->nilai_semasa;
      $info_kewpa32->hasil_pelupusan =$request->hasil_pelupusan ;
      $info_kewpa32->kos_pengendalian =$request->kos_pengendalian ;
      $info_kewpa32->kewpa21_id=$request->kewpa21_id;
      $info_kewpa32->kewpa32_id=$request->kewpa32_id;
      $info_kewpa32 -> save();

      $info_kewpa32 -> save();

      return $info_kewpa32;

    }

    public function destroy(InfoKewpa32 $info_kewpa32)
    {
      return $info_kewpa32->delete();
    }



}
