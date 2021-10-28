<?php

namespace App\Http\Controllers;

use App\Models\Kewpa32;
use Illuminate\Http\Request;

class Kewpa32Controller extends Controller
{
    public function index()
    {
      return Kewpa32::all();
    }

    public function store(Request $request)
    {
      
      $kewpa32 = new Kewpa32;
      $kewpa32->tahun=$request->tahun;
      $kewpa32->ketua_jabatan=$request->ketua_jabatan;

      $kewpa32 -> save();

      return $kewpa32;
    }

    public function show(Kewpa32 $kewpa32)
    {
      return $kewpa32;
    }

    public function update(Request $request, Kewpa32 $kewpa32)
    {

      $kewpa32->tahun=$request->tahun;
      $kewpa32->ketua_jabatan=$request->ketua_jabatan;

      $kewpa32 -> save();

      return $kewpa32;

    }

    public function destroy(Kewpa32 $kewpa32)
    {
      return $kewpa32->delete();
    }
}
