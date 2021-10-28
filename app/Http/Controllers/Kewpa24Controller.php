<?php

namespace App\Http\Controllers;

use App\Models\Kewpa24;
use Illuminate\Http\Request;

class Kewpa24Controller extends Controller
{
    public function index()
    {
      return Kewpa24::all();
    }

    public function store(Request $request)
    {
      
      $kewpa24 = new Kewpa24;
      $kewpa24->tarikh_mula=$request->tarikh_mula;
      $kewpa24->tarikh_tamat=$request->tarikh_tamat;
      $kewpa24->jam_mula=$request->jam_mula;
      $kewpa24->jam_tamat=$request->jam_tamat;
      $kewpa24->tempat=$request->tempat;
      $kewpa24->tarikh_tutup=$request->tarikh_tutup;
      $kewpa24->alamat=$request->alamat;
      $kewpa24->agensi=$request->agensi;
      $kewpa24->staff_id=$request->staff_id;
      $kewpa24 -> save();

      return $kewpa24;
    }

    public function show(Kewpa24 $kewpa24)
    {
      return $kewpa24;
    }

    public function update(Request $request, Kewpa24 $kewpa24)
    {

      $kewpa24->tarikh_mula=$request->tarikh_mula;
      $kewpa24->tarikh_tamat=$request->tarikh_tamat;
      $kewpa24->jam_mula=$request->jam_mula;
      $kewpa24->jam_tamat=$request->jam_tamat;
      $kewpa24->tempat=$request->tempat;
      $kewpa24->tarikh_tutup=$request->tarikh_tutup;
      $kewpa24->alamat=$request->alamat;
      $kewpa24->agensi=$request->agensi;
      $kewpa24->staff_id=$request->staff_id;
      $kewpa15 -> save();

      return $kewpa24;

    }

    public function destroy(Kewpa24 $kewpa24)
    {
      return $kewpa24->delete();
    }
}
