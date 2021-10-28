<?php

namespace App\Http\Controllers;

use App\Models\Kewpa20;
use Illuminate\Http\Request;

class Kewpa20Controller extends Controller
{
    public function index()
    {
      return Kewpa20::all();
    }

    public function store(Request $request)
    {
      
      $kewpa20 = new Kewpa20;
      $kewpa20->tarikh=$request->tarikh;
      $kewpa20->tempoh=$request->tempoh;
      $kewpa20->tarikh_mula=$request->tarikh_mula;
      $kewpa20->tarikh_tamat=$request->tarikh_tamat;
      $kewpa20->pegawai_dilantik=$request->pegawai_dilantik;
      $kewpa20->ketua_jabatan=$request->ketua_jabatan;
      $kewpa20 -> save();

      return $kewpa20;
    }

    public function show(Kewpa20 $kewpa20)
    {
      return $kewpa20;
    }

    public function update(Request $request, Kewpa20 $kewpa20)
    {

      $kewpa20->tarikh=$request->tarikh;
      $kewpa20->tempoh=$request->tempoh;
      $kewpa20->tarikh_mula=$request->tarikh_mula;
      $kewpa20->tarikh_tamat=$request->tarikh_tamat;
      $kewpa20->pegawai_dilantik=$request->pegawai_dilantik;
      $kewpa20->ketua_jabatan=$request->ketua_jabatan;
      $kewpa20 -> save();

      return $kewpa20;

    }

    public function destroy(Kewpa20 $kewpa20)
    {
      return $kewpa20->delete();
    }
}
