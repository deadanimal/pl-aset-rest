<?php

namespace App\Http\Controllers;

use App\Models\InfoKewpa29;
use Illuminate\Http\Request;

class InfoKewpa29Controller extends Controller
{
    public function index()
    {
      return Kewpa29::all();
    }

    public function store(Request $request)
    {
      
      $kewpa29 = new Kewpa29;
      $info_kewpa29->kod_penyebut=$request->kod_penyebut;
      $info_kewpa29->harga=$request->harga;
      $info_kewpa29->no_sebut_harga=$request->no_sebut_harga;
      $info_kewpa29->kewpa29_id=$request->kewpa29_id;
      $kewpa29 -> save();

      return $kewpa29;
    }

    public function show(Kewpa29 $kewpa29)
    {
      return $kewpa29;
    }

    public function update(Request $request, Kewpa29 $kewpa29)
    {

      $info_kewpa29->kod_penyebut=$request->kod_penyebut;
      $info_kewpa29->harga=$request->harga;
      $info_kewpa29->no_sebut_harga=$request->no_sebut_harga;
      $info_kewpa29->kewpa29_id=$request->kewpa29_id;
      $kewpa29 -> save();

      return $kewpa29;

    }

    public function destroy(Kewpa29 $kewpa29)
    {
      return $kewpa29->delete();
    }
}
