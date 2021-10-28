<?php

namespace App\Http\Controllers;

use App\Models\Kewpa37;
use Illuminate\Http\Request;

class Kewpa37Controller extends Controller
{
    public function index()
    {
      return Kewpa37::all();
    }

    public function store(Request $request)
    {
      
      $kewpa37 = new Kewpa37;
      $kewpa37->tahun=$request->tahun;
      $kewpa37->ketua_jabatan=$request->ketua_jabatan;
      $kewpa37 -> save();

      return $kewpa37;
    }

    public function show(Kewpa37 $kewpa37)
    {
      return $kewpa37;
    }

    public function update(Request $request, Kewpa37 $kewpa37)
    {

      $kewpa37->tahun=$request->tahun;
      $kewpa37->ketua_jabatan=$request->ketua_jabatan;
      $kewpa37 -> save();

      return $kewpa37;

    }

    public function destroy(Kewpa37 $kewpa37)
    {
      return $kewpa37->delete();
    }
}
