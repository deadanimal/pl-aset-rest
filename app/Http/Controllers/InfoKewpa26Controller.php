<?php

namespace App\Http\Controllers;

use App\Models\InfoKewpa26;
use Illuminate\Http\Request;

class InfoKewpa26Controller extends Controller
{
    public function index()
    {
      return InfoKewpa26::all();
    }

    public function store(Request $request)
    {
      
      $info_kewpa26 = new InfoKewpa26;
      $info_kewpa26->kod_petender=$request->kod_petender;
      $info_kewpa26->harga=$request->harga;
      $info_kewpa26->no_tender=$request->no_tender;
      $info_kewpa26->kewpa26_id=$request->kewpa26_id;

      $info_kewpa26 -> save();

      return $info_kewpa26;
    }

    public function show(InfoKewpa26 $info_kewpa26)
    {
      return $info_kewpa26;
    }

    public function update(Request $request, InfoKewpa26 $info_kewpa26)
    {

      $info_kewpa26->kod_petender=$request->kod_petender;
      $info_kewpa26->harga=$request->harga;
      $info_kewpa26->no_tender=$request->no_tender;
      $info_kewpa26->kewpa26_id=$request->kewpa26_id;


      $info_kewpa26 -> save();

      return $info_kewpa26;

    }

    public function destroy(InfoKewpa26 $info_kewpa26)
    {
      return $info_kewpa26->delete();
    }



}
