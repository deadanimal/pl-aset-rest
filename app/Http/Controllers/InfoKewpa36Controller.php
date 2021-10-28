<?php

namespace App\Http\Controllers;

use App\Models\InfoKewpa36;
use Illuminate\Http\Request;

class InfoKewpa36Controller extends Controller
{
    public function index()
    {
      return InfoKewpa36::all();
    }

    public function store(Request $request)
    {
      
      $info_kewpa36 = new InfoKewpa36;
      $info_kewpa36->jenis_aset_alih=$request->jenis_aset_alih;
      $info_kewpa36->kewpa33_id=$request->kewpa33_id;
      $info_kewpa36->kewpa36_id=$request->kewpa36_id;

      $info_kewpa36 -> save();

      return $info_kewpa36;
    }

    public function show(InfoKewpa36 $info_kewpa36)
    {
      return $info_kewpa36;
    }

    public function update(Request $request, InfoKewpa36 $info_kewpa36)
    {

      $info_kewpa36->jenis_aset_alih=$request->jenis_aset_alih;
      $info_kewpa36->kewpa33_id=$request->kewpa33_id;
      $info_kewpa36->kewpa36_id=$request->kewpa36_id;



      $info_kewpa36 -> save();

      return $info_kewpa36;

    }

    public function destroy(InfoKewpa36 $info_kewpa36)
    {
      return $info_kewpa36->delete();
    }



}
