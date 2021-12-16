<?php

namespace App\Http\Controllers;

use App\Models\Kewpa16;
use Illuminate\Http\Request;

class Kewpa16Controller extends Controller
{
    public function index()
    {
      return view('modul.aset_alih.kewpa16.index');
    }

    public function store(Request $request)
    {
      
      $kewpa16 = new Kewpa16;
      $kewpa16->tahun=$request->tahun;
      $kewpa16->ketua_jabatan=$request->ketua_jabatan;

      $kewpa16 -> save();

      return $kewpa16;
    }

    public function show(Kewpa16 $kewpa16)
    {
      return $kewpa16;
    }

    public function update(Request $request, Kewpa16 $kewpa16)
    {

      $kewpa16->tahun=$request->tahun;
      $kewpa16->ketua_jabatan=$request->ketua_jabatan;
      $kewpa15 -> save();

      return $kewpa16;

    }

    public function destroy(Kewpa16 $kewpa16)
    {
      return $kewpa16->delete();
    }
}
