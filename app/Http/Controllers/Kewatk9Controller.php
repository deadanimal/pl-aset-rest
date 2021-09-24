<?php

namespace App\Http\Controllers;

use App\Models\Kewatk9;
use Illuminate\Http\Request;

class Kewatk9Controller extends Controller
{
    public function index()
    {

      return Kewatk9::all();
    }


    public function store(Request $request)
    {
      $kewatk9 = new Kewatk9;
      
      $kewatk9->agensi=$request->agensi;
      $kewatk9->bahagian=$request->bahagian;
      $kewatk9->created_date=$request->created_date;
      $kewatk9->modified_date=$request->modified_date;
      $kewatk9->pegawai_pemeriksa1=$request->pegawai_pemeriksa1;
      $kewatk9->pegawai_pemeriksa2=$request->pegawai_pemeriksa2;
      $kewatk9->pegawai_aset=$request->pegawai_aset;
      $kewatk9->save();
      return $kewatk9;
    }

    public function show(Kewatk9 $kewatk9)
    {

      return $kewatk9;
    }


    public function update(Request $request, Kewatk9 $kewatk9)
    {
     
      $kewatk9->agensi=$request->agensi;
      $kewatk9->bahagian=$request->bahagian;
      $kewatk9->created_date=$request->created_date;
      $kewatk9->modified_date=$request->modified_date;
      $kewatk9->pegawai_pemeriksa1=$request->pegawai_pemeriksa1;
      $kewatk9->pegawai_pemeriksa2=$request->pegawai_pemeriksa2;
      $kewatk9->pegawai_aset=$request->pegawai_aset;
      $kewatk9->save();
      return $kewatk9;


      return $kewatk9;
    }

    public function destroy(Kewatk9 $kewatk9)
    {

      return $kewatk9->delete();
    }
}
