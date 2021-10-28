<?php

namespace App\Http\Controllers;

use App\Models\Kewpa11;
use Illuminate\Http\Request;

class Kewpa11Controller extends Controller
{
    public function index()
    {
      return Kewpa11::all();
    }

    public function store(Request $request)
    {
      
      $kewpa11 = new Kewpa11;
      $kewpa11->agensi=$request->agensi;
      $kewpa11->bahagian=$request->bahagian;
      $kewpa11->pegawai_pemeriksa1=$request->pegawai_pemeriksa1;
      $kewpa11->pegawai_pemeriksa2=$request->pegawai_pemeriksa2;

      $kewpa11 -> save();

      return $kewpa11;
    }

    public function show(Kewpa11 $kewpa11)
    {
      return $kewpa11;
    }

    public function update(Request $request, Kewpa11 $kewpa11)
    {

      $kewpa11->agensi=$request->agensi;
      $kewpa11->bahagian=$request->bahagian;
      $kewpa11->pegawai_pemeriksa1=$request->pegawai_pemeriksa1;
      $kewpa11->pegawai_pemeriksa2=$request->pegawai_pemeriksa2;

      $kewpa11 -> save();

      return $kewpa11;

    }

    public function destroy(Kewpa11 $kewpa11)
    {
      return $kewpa11->delete();
    }
}
