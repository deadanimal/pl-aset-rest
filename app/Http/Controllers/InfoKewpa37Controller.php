<?php

namespace App\Http\Controllers;

use App\Models\InfoKewpa37;
use Illuminate\Http\Request;

class InfoKewpa37Controller extends Controller
{
    public function index()
    {
      return InfoKewpa37::all();
    }

    public function store(Request $request)
    {
      
      $info_kewpa37 = new InfoKewpa37;
      $info_kewpa37->agensi=$request->agensi;
      $info_kewpa37->kuantiti_hapus=$request->kuantiti_hapus;
      $info_kewpa37->nilai_perolehan_hapus=$request->nilai_perolehan_hapus;
      $info_kewpa37->nilai_semasa_hapus=$request->nilai_semasa_hapus;
      $info_kewpa37->kes_surcaj=$request->kes_surcaj;
      $info_kewpa37->nilai_surcaj=$request->nilai_surcaj;
      $info_kewpa37->kes_tatatertib=$request->kes_tatatertib;
      $info_kewpa37->kewpa33_id=$request->kewpa33_id;
      $info_kewpa37->kewpa37_id=$request->kewpa37_id;
      $info_kewpa37 -> save();

      return $info_kewpa37;
    }

    public function show(InfoKewpa37 $info_kewpa37)
    {
      return $info_kewpa37;
    }

    public function update(Request $request, InfoKewpa37 $info_kewpa37)
    {


      $info_kewpa37->agensi=$request->agensi;
      $info_kewpa37->kuantiti_hapus=$request->kuantiti_hapus;
      $info_kewpa37->nilai_perolehan_hapus=$request->nilai_perolehan_hapus;
      $info_kewpa37->nilai_semasa_hapus=$request->nilai_semasa_hapus;
      $info_kewpa37->kes_surcaj=$request->kes_surcaj;
      $info_kewpa37->nilai_surcaj=$request->nilai_surcaj;
      $info_kewpa37->kes_tatatertib=$request->kes_tatatertib;
      $info_kewpa37->kewpa33_id=$request->kewpa33_id;
      $info_kewpa37->kewpa37_id=$request->kewpa37_id;

      $info_kewpa37 -> save();

      return $info_kewpa37;

    }

    public function destroy(InfoKewpa37 $info_kewpa37)
    {
      return $info_kewpa37->delete();
    }



}
