<?php

namespace App\Http\Controllers;

use App\Models\Kewpa22;
use Illuminate\Http\Request;

class Kewpa22Controller extends Controller
{
    public function index()
    {
      return Kewpa22::all();
    }

    public function store(Request $request)
    {
      
      $kewpa22 = new Kewpa22;
      $kewpa22->agensi=$request->agensi;
      $kewpa22->secara=$request->secara;
      $kewpa22->kuantiti=$request->kuantiti;
      $kewpa22->tarikh=$request->tarikh;
      $kewpa22->tempat=$request->tempat;
      $kewpa22->pegawai_saksi1=$request->pegawai_saksi1;
      $kewpa22->pegawai_saksi2=$request->pegawai_saksi2;

      $kewpa22 -> save();

      return $kewpa22;
    }

    public function show(Kewpa22 $kewpa22)
    {
      return $kewpa22;
    }

    public function update(Request $request, Kewpa22 $kewpa22)
    {

      $kewpa22->agensi=$request->agensi;
      $kewpa22->secara=$request->secara;
      $kewpa22->kuantiti=$request->kuantiti;
      $kewpa22->tarikh=$request->tarikh;
      $kewpa22->tempat=$request->tempat;
      $kewpa22->pegawai_saksi1=$request->pegawai_saksi1;
      $kewpa22->pegawai_saksi2=$request->pegawai_saksi2;
      $kewpa15 -> save();

      return $kewpa22;

    }

    public function destroy(Kewpa22 $kewpa22)
    {
      return $kewpa22->delete();
    }
}
