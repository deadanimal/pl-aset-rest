<?php

namespace App\Http\Controllers;

use App\Models\Kewpa27;
use Illuminate\Http\Request;

class Kewpa27Controller extends Controller
{
    public function index()
    {
      return Kewpa27::all();
    }

    public function store(Request $request)
    {
      
      $kewpa27 = new Kewpa27;
      $kewpa27->agensi=$request->agensi;
      $kewpa27->tarikh_mula=$request->tarikh_mula;
      $kewpa27->tarikh_tamat=$request->tarikh_tamat;
      $kewpa27->jam_mula=$request->jam_mula;
      $kewpa27->jam_tamat=$request->jam_tamat;
      $kewpa27->tempat=$request->tempat;
      $kewpa27->alamat=$request->alamat;
      $kewpa27->tarikh_tutup=$request->tarikh_tutup;
      $kewpa27->ketua_jabatan=$request->ketua_jabatan;

      $kewpa27 -> save();

      return $kewpa27;
    }

    public function show(Kewpa27 $kewpa27)
    {
      return $kewpa27;
    }

    public function update(Request $request, Kewpa27 $kewpa27)
    {

      $kewpa27->agensi=$request->agensi;
      $kewpa27->tarikh_mula=$request->tarikh_mula;
      $kewpa27->tarikh_tamat=$request->tarikh_tamat;
      $kewpa27->jam_mula=$request->jam_mula;
      $kewpa27->jam_tamat=$request->jam_tamat;
      $kewpa27->tempat=$request->tempat;
      $kewpa27->alamat=$request->alamat;
      $kewpa27->tarikh_tutup=$request->tarikh_tutup;
      $kewpa27->ketua_jabatan=$request->ketua_jabatan;
      $kewpa15 -> save();

      return $kewpa27;

    }

    public function destroy(Kewpa27 $kewpa27)
    {
      return $kewpa27->delete();
    }
}
