<?php

namespace App\Http\Controllers;

use App\Models\Kewpa34;
use Illuminate\Http\Request;

class Kewpa34Controller extends Controller
{
    public function index()
    {
      return Kewpa34::all();
    }

    public function store(Request $request)
    {
      
      $kewpa34 = new Kewpa34;
      $kewpa34->tarikh=$request->tarikh;
      $kewpa34->tarikh_tamat=$request->tarikh_tamat;
      $kewpa34->pegawai_dilantik=$request->pegawai_dilantik;
      $kewpa34->kewpa33_id=$request->kewpa33_id;
      $kewpa34->pegawai_pengawal=$request->pegawai_pengawal;

      $kewpa34 -> save();

      return $kewpa34;
    }

    public function show(Kewpa34 $kewpa34)
    {
      return $kewpa34;
    }

    public function update(Request $request, Kewpa34 $kewpa34)
    {

      $kewpa34->tarikh=$request->tarikh;
      $kewpa34->tarikh_tamat=$request->tarikh_tamat;
      $kewpa34->pegawai_dilantik=$request->pegawai_dilantik;
      $kewpa34->kewpa33_id=$request->kewpa33_id;
      $kewpa34->pegawai_pengawal=$request->pegawai_pengawal;

      $kewpa34 -> save();

      return $kewpa34;

    }

    public function destroy(Kewpa34 $kewpa34)
    {
      return $kewpa34->delete();
    }
}
