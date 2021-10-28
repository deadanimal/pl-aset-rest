<?php

namespace App\Http\Controllers;

use App\Models\Kewpa19;
use Illuminate\Http\Request;

class Kewpa19Controller extends Controller
{
    public function index()
    {
      return Kewpa19::all();
    }

    public function store(Request $request)
    {
      
      $kewpa19 = new Kewpa19;
      $kewpa19->agensi=$request->agensi;
      $kewpa19->alamat=$request->alamat;
      $kewpa19->pegawai_pemeriksa1=$request->pegawai_pemeriksa1;
      $kewpa19->pegawai_pemeriksa2=$request->pegawai_pemeriksa2;

      $kewpa19 -> save();

      return $kewpa19;
    }

    public function show(Kewpa19 $kewpa19)
    {
      return $kewpa19;
    }

    public function update(Request $request, Kewpa19 $kewpa19)
    {

      $kewpa19->agensi=$request->agensi;
      $kewpa19->alamat=$request->alamat;
      $kewpa19->pegawai_pemeriksa1=$request->pegawai_pemeriksa1;
      $kewpa19->pegawai_pemeriksa2=$request->pegawai_pemeriksa2;

      $kewpa15 -> save();

      return $kewpa19;

    }

    public function destroy(Kewpa19 $kewpa19)
    {
      return $kewpa19->delete();
    }
}
