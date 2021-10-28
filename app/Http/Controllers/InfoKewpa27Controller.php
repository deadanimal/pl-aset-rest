<?php

namespace App\Http\Controllers;

use App\Models\InfoKewpa27;
use Illuminate\Http\Request;

class InfoKewpa27Controller extends Controller
{
    public function index()
    {
      return InfoKewpa8::all();
    }

    public function store(Request $request)
    {
      
      $info_kewpa8 = new InfoKewpa8;
      $info_kewpa27->kuantiti=$request->kuantiti;
      $info_kewpa27->harga_simpanan=$request->harga_simpanan;
      $info_kewpa27->no_sebut_harga=$request->no_sebut_harga;
      $info_kewpa27->kewpa21_id=$request->kewpa21_id;
      $info_kewpa8 -> save();

      return $info_kewpa8;
    }

    public function show(InfoKewpa8 $info_kewpa8)
    {
      return $info_kewpa8;
    }

    public function update(Request $request, InfoKewpa8 $info_kewpa8)
    {

      $info_kewpa27->kuantiti=$request->kuantiti;
      $info_kewpa27->harga_simpanan=$request->harga_simpanan;
      $info_kewpa27->no_sebut_harga=$request->no_sebut_harga;
      $info_kewpa27->kewpa21_id=$request->kewpa21_id;

      $info_kewpa8 -> save();

      return $info_kewpa8;

    }

    public function destroy(InfoKewpa8 $info_kewpa8)
    {
      return $info_kewpa8->delete();
    }



}
