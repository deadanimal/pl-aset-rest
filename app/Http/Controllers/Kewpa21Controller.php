<?php

namespace App\Http\Controllers;

use App\Models\Kewpa21;
use Illuminate\Http\Request;

class Kewpa21Controller extends Controller
{
    public function index()
    {
      return Kewpa21::all();
    }

    public function store(Request $request)
    {
      
      $kewpa21 = new Kewpa21;
      $kewpa21->pegawai_pemeriksa1=$request->pegawai_pemeriksa1;
      $kewpa21->pegawai_pemeriksa2=$request->pegawai_pemeriksa2;
      $kewpa21->kuasa_melulus=$request->kuasa_melulus;

      $kewpa21 -> save();

      return $kewpa21;
    }

    public function show(Kewpa21 $kewpa21)
    {
      return $kewpa21;
    }

    public function update(Request $request, Kewpa21 $kewpa21)
    {

      $kewpa21->pegawai_pemeriksa1=$request->pegawai_pemeriksa1;
      $kewpa21->pegawai_pemeriksa2=$request->pegawai_pemeriksa2;
      $kewpa21->kuasa_melulus=$request->kuasa_melulus;

      $kewpa15 -> save();

      return $kewpa21;

    }

    public function destroy(Kewpa21 $kewpa21)
    {
      return $kewpa21->delete();
    }
}
