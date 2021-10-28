<?php

namespace App\Http\Controllers;

use App\Models\Kewpa23;
use Illuminate\Http\Request;

class Kewpa23Controller extends Controller
{
    public function index()
    {
      return Kewpa23::all();
    }

    public function store(Request $request)
    {
      
      $kewpa23 = new Kewpa23;
      $kewpa23->no_resit=$request->no_resit;
      $kewpa23->bilangan_item=$request->bilangan_item;
      $kewpa23->tarikh=$request->tarikh;
      $kewpa23->salinan_rekod=$request->salinan_rekod;
      $kewpa23->ketua_jabatan=$request->ketua_jabatan;
      $kewpa23->kewpa21_id=$request->kewpa21_id;

      $kewpa23 -> save();

      return $kewpa23;
    }

    public function show(Kewpa23 $kewpa23)
    {
      return $kewpa23;
    }

    public function update(Request $request, Kewpa23 $kewpa23)
    {

      $kewpa23->no_resit=$request->no_resit;
      $kewpa23->bilangan_item=$request->bilangan_item;
      $kewpa23->tarikh=$request->tarikh;
      $kewpa23->salinan_rekod=$request->salinan_rekod;
      $kewpa23->ketua_jabatan=$request->ketua_jabatan;
      $kewpa23->kewpa21_id=$request->kewpa21_id;
      $kewpa15 -> save();

      return $kewpa23;

    }

    public function destroy(Kewpa23 $kewpa23)
    {
      return $kewpa23->delete();
    }
}
