<?php

namespace App\Http\Controllers;

use App\Models\InfoKewpa24;
use Illuminate\Http\Request;

class InfoKewpa24Controller extends Controller
{
    public function index()
    {
      return InfoKewpa24::all();
    }

    public function store(Request $request)
    {
      
      $info_kewpa24 = new InfoKewpa24;
      $info_kewpa24->kuantiti=$request->kuantiti;
      $info_kewpa24->harga simpanan=$request->harga simpanan;
      $info_kewpa24->kewpa21_id=$request->kewpa21_id;
      $info_kewpa24->kewpa24_id=$request->kewpa24_id;

      $info_kewpa24 -> save();

      return $info_kewpa24;
    }

    public function show(InfoKewpa24 $info_kewpa24)
    {
      return $info_kewpa24;
    }

    public function update(Request $request, InfoKewpa24 $info_kewpa24)
    {

      $info_kewpa24->kuantiti=$request->kuantiti;
      $info_kewpa24->harga simpanan=$request->harga simpanan;
      $info_kewpa24->kewpa21_id=$request->kewpa21_id;
      $info_kewpa24->kewpa24_id=$request->kewpa24_id;

      $info_kewpa24 -> save();

      return $info_kewpa24;

    }

    public function destroy(InfoKewpa24 $info_kewpa24)
    {
      return $info_kewpa24->delete();
    }



}
