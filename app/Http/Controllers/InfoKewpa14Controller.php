<?php

namespace App\Http\Controllers;

use App\Models\InfoKewpa14;
use Illuminate\Http\Request;

class InfoKewpa14Controller extends Controller
{
    public function index()
    {
      return InfoKewpa14::all();
    }

    public function store(Request $request)
    {
      
      $info_kewpa14 = new InfoKewpa14;
      $info_kewpa14->lokasi_aset=$request->lokasi_aset;
      $info_kewpa14->tempoh_penyelenggaraan=$request->tempoh_penyelenggaraan;
      $info_kewpa14->no_siri_pendaftaran=$request->no_siri_pendaftaran;
      $info_kewpa14->kewpa14_id=$request->kewpa14_id;      
      $info_kewpa14 -> save();

      return $info_kewpa14;
    }

    public function show(InfoKewpa14 $info_kewpa14)
    {
      return $info_kewpa14;
    }

    public function update(Request $request, InfoKewpa14 $info_kewpa14)
    {

      $info_kewpa14->lokasi_aset=$request->lokasi_aset;
      $info_kewpa14->tempoh_penyelenggaraan=$request->tempoh_penyelenggaraan;
      $info_kewpa14->no_siri_pendaftaran=$request->no_siri_pendaftaran;
      $info_kewpa14->kewpa14_id=$request->kewpa14_id;      
      $info_kewpa14 -> save();

      return $info_kewpa14;

    }

    public function destroy(InfoKewpa14 $info_kewpa14)
    {
      return $info_kewpa14->delete();
    }



}
