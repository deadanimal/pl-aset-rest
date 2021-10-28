<?php

namespace App\Http\Controllers;

use App\Models\Kewpa30;
use Illuminate\Http\Request;

class Kewpa30Controller extends Controller
{
    public function index()
    {
      return Kewpa30::all();
    }

    public function store(Request $request)
    {
      
      $kewpa30 = new Kewpa30;
      $kewpa30->agensi=$request->agensi;
      $kewpa30->tarikh=$request->tarikh;
      $kewpa30->masa=$request->masa;
      $kewpa30->tempat=$request->tempat;
      $kewpa30->tarikh_mula=$request->tarikh_mula;
      $kewpa30->tarikh_tamat=$request->tarikh_tamat;
      $kewpa30->alamat=$request->alamat;
      $kewpa30->jam_mula=$request->jam_mula;
      $kewpa30->jam_tamat=$request->jam_tamat;
      $kewpa30->kewpa21_id=$request->kewpa21_id;
      $kewpa30->staff_id=$request->staff_id;

      $kewpa30 -> save();

      return $kewpa30;
    }

    public function show(Kewpa30 $kewpa30)
    {
      return $kewpa30;
    }

    public function update(Request $request, Kewpa30 $kewpa30)
    {

      $kewpa30->agensi=$request->agensi;
      $kewpa30->tarikh=$request->tarikh;
      $kewpa30->masa=$request->masa;
      $kewpa30->tempat=$request->tempat;
      $kewpa30->tarikh_mula=$request->tarikh_mula;
      $kewpa30->tarikh_tamat=$request->tarikh_tamat;
      $kewpa30->alamat=$request->alamat;
      $kewpa30->jam_mula=$request->jam_mula;
      $kewpa30->jam_tamat=$request->jam_tamat;
      $kewpa30->kewpa21_id=$request->kewpa21_id;
      $kewpa30->staff_id=$request->staff_id;

      $kewpa30 -> save();

      return $kewpa30;

    }

    public function destroy(Kewpa30 $kewpa30)
    {
      return $kewpa30->delete();
    }
}
