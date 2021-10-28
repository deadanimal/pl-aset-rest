<?php

namespace App\Http\Controllers;

use App\Models\InfoKewpa25;
use Illuminate\Http\Request;

class InfoKewpa25Controller extends Controller
{
    public function index()
    {
      return InfoKewpa25::all();
    }

    public function store(Request $request)
    {
      
      $info_kewpa25 = new InfoKewpa25;
      $info_kewpa25->kuantiti=$request->kuantiti;
      $info_kewpa25->harga_tawaran=$request->harga_tawaran;
      $info_kewpa25->deposit_tender=$request->deposit_tender;
      $info_kewpa25->no_tender=$request->no_tender;
      $info_kewpa25->kewpa25_id=$request->kewpa25_id;

      $info_kewpa25 -> save();

      return $info_kewpa25;
    }

    public function show(InfoKewpa25 $info_kewpa25)
    {
      return $info_kewpa25;
    }

    public function update(Request $request, InfoKewpa25 $info_kewpa25)
    {

      $info_kewpa25->kuantiti=$request->kuantiti;
      $info_kewpa25->harga_tawaran=$request->harga_tawaran;
      $info_kewpa25->deposit_tender=$request->deposit_tender;
      $info_kewpa25->no_tender=$request->no_tender;
      $info_kewpa25->kewpa25_id=$request->kewpa25_id;

      $info_kewpa25 -> save();

      return $info_kewpa25;

    }

    public function destroy(InfoKewpa25 $info_kewpa25)
    {
      return $info_kewpa25->delete();
    }



}
