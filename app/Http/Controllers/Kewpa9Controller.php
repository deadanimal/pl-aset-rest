<?php

namespace App\Http\Controllers;

use App\Models\Kewpa9;
use Illuminate\Http\Request;

class Kewpa9Controller extends Controller
{
    public function index()
    {
      return Kewpa9::all();
    }

    public function store(Request $request)
    {
      
      $kewpa9 = new Kewpa9;
      $kewpa9 -> no_permohonan = $request->no_permohonan;
      $kewpa9 -> pemohon_id = $request->pemohon_id;
      $kewpa9 -> tujuan = $request->tujuan;
      $kewpa9 -> tempat_digunakan = $request->tempat_digunakan;
      $kewpa9 -> pengeluar_id = $request->pengeluar_id;
      $kewpa9 -> pemulang_id = $request->pemulang_id;
      $kewpa9 -> pelulus_id = $request->pelulus_id;
      $kewpa9 -> penerima_id = $request->penerima_id;
      $kewpa9 -> save();

      return $kewpa9;
    }

    public function show(Kewpa9 $kewpa9)
    {
      return $kewpa9;
    }

    public function update(Request $request, Kewpa9 $kewpa9)
    {

      $kewpa9 -> no_permohonan = $request->no_permohonan;
      $kewpa9 -> pemohon_id = $request->pemohon_id;
      $kewpa9 -> tujuan = $request->tujuan;
      $kewpa9 -> tempat_digunakan = $request->tempat_digunakan;
      $kewpa9 -> pengeluar_id = $request->pengeluar_id;
      $kewpa9 -> pemulang_id = $request->pemulang_id;
      $kewpa9 -> pelulus_id = $request->pelulus_id;
      $kewpa9 -> penerima_id = $request->penerima_id;
      $kewpa9 -> save();

      return $kewpa9;

    }

    public function destroy(Kewpa9 $kewpa9)
    {
      return $kewpa9->delete();
    }

}
