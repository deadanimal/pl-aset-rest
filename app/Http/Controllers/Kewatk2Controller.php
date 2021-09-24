<?php

namespace App\Http\Controllers;

use App\Models\Kewatk2;
use Illuminate\Http\Request;

class Kewatk2Controller extends Controller
{
    public function index()
    {

      return Kewatk2::all();
    }


    public function store(Request $request)
    {
      $kewatk2 = new Kewatk2;
      $kewatk2->tindakan_diterima=$request->tindakan_diterima;
      $kewatk2->pegawai_penerima=$request->pegawai_penerima;
      $kewatk2->pembekal=$request->pembekal;
      $kewatk2->no_rujukan_atk1=$request->no_rujukan_atk1;
      $kewatk2->save();
      return $kewatk2;
    }

    public function show(Kewatk2 $kewatk2)
    {

      return $kewatk2;
    }


    public function update(Request $request, Kewatk2 $kewatk2)
    {
      $kewatk2->tindakan_diterima=$request->tindakan_diterima;
      $kewatk2->pegawai_penerima=$request->pegawai_penerima;
      $kewatk2->pembekal=$request->pembekal;
      $kewatk2->no_rujukan_atk1=$request->no_rujukan_atk1;
      $kewatk2->save();

      return $kewatk2;
    }

    public function destroy(Kewatk2 $kewatk2)
    {

      return $kewatk2->delete();
    }
}
