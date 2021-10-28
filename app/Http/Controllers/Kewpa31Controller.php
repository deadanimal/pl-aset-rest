<?php

namespace App\Http\Controllers;

use App\Models\Kewpa31;
use Illuminate\Http\Request;

class Kewpa31Controller extends Controller
{
    public function index()
    {
      return Kewpa31::all();
    }

    public function store(Request $request)
    {
      
      $kewpa31 = new Kewpa31;
      $kewpa31->harga_simpanan=$request->harga_simpanan;
      $kewpa31->deposit=$request->deposit;
      $kewpa31->kewpa30_id=$request->kewpa30_id;
      $kewpa31->ketua_jabatan=$request->ketua_jabatan;

      $kewpa31 -> save();

      return $kewpa31;
    }

    public function show(Kewpa31 $kewpa31)
    {
      return $kewpa31;
    }

    public function update(Request $request, Kewpa31 $kewpa31)
    {

      $kewpa31->harga_simpanan=$request->harga_simpanan;
      $kewpa31->deposit=$request->deposit;
      $kewpa31->kewpa30_id=$request->kewpa30_id;
      $kewpa31->ketua_jabatan=$request->ketua_jabatan;
      $kewpa31 -> save();

      return $kewpa31;

    }

    public function destroy(Kewpa31 $kewpa31)
    {
      return $kewpa31->delete();
    }
}
