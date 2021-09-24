<?php

namespace App\Http\Controllers;

use App\Models\Kewatk7;
use Illuminate\Http\Request;

class Kewatk7Controller extends Controller
{
    public function index()
    {

      return Kewatk7::all();
    }


    public function store(Request $request)
    {
      $kewatk7 = new Kewatk7;
      $kewatk7->bahagian=$request->bahagian;
      $kewatk7->tujuan=$request->tujuan;
      $kewatk7->created_date=$request->created_date;
      $kewatk7->modified_date=$request->modified_date;
      $kewatk7->pemohon=$request->pemohon;
      $kewatk7->pengeluar=$request->pengeluar;
      $kewatk7->pemulang=$request->pemulang;
      $kewatk7->pelulus=$request->pelulus;
      $kewatk7->penerima=$request->penerima;    
      $kewatk7->save();
    }

    public function show(Kewatk7 $kewatk7)
    {

      return $kewatk7;
    }


    public function update(Request $request, Kewatk7 $kewatk7)
    {
      $kewatk7->bahagian=$request->bahagian;
      $kewatk7->tujuan=$request->tujuan;
      $kewatk7->created_date=$request->created_date;
      $kewatk7->modified_date=$request->modified_date;
      $kewatk7->pemohon=$request->pemohon;
      $kewatk7->pengeluar=$request->pengeluar;
      $kewatk7->pemulang=$request->pemulang;
      $kewatk7->pelulus=$request->pelulus;
      $kewatk7->penerima=$request->penerima;    
      $kewatk7->save();
    }

    public function destroy(Kewatk7 $kewatk7)
    {

      return $kewatk7->delete();
    }
}
