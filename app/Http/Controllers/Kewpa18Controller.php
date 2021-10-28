<?php

namespace App\Http\Controllers;

use App\Models\Kewpa18;
use Illuminate\Http\Request;

class Kewpa18Controller extends Controller
{
    public function index()
    {
      return Kewpa18::all();
    }

    public function store(Request $request)
    {
      
      $kewpa18 = new Kewpa18;
      $kewpa18->kewpa18_id=$request->kewpa18_id;
      $kewpa18->tahun=$request->tahun;
      $kewpa18->ketua_jabatan=$request->ketua_jabatan;

      $kewpa18 -> save();

      return $kewpa18;
    }

    public function show(Kewpa18 $kewpa18)
    {
      return $kewpa18;
    }

    public function update(Request $request, Kewpa18 $kewpa18)
    {

      $kewpa18->kewpa18_id=$request->kewpa18_id;
      $kewpa18->tahun=$request->tahun;
      $kewpa18->ketua_jabatan=$request->ketua_jabatan;
      $kewpa15 -> save();

      return $kewpa18;

    }

    public function destroy(Kewpa18 $kewpa18)
    {
      return $kewpa18->delete();
    }
}
