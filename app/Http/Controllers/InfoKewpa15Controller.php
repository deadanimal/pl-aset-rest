<?php

namespace App\Http\Controllers;

use App\Models\InfoKewpa15;
use Illuminate\Http\Request;

class InfoKewpa15Controller extends Controller
{
    public function index()
    {
      return InfoKewpa15::all();
    }

    public function store(Request $request)
    {
      
      $info_kewpa15 = new InfoKewpa15;
      $info_kewpa15->tarikh=$request->tarikh;
      $info_kewpa15->jenis_penyelenggaraan=$request->jenis_penyelenggaraan;
      $info_kewpa15->butir_kerja=$request->butir_kerja;
      $info_kewpa15->nama_syarikat=$request->nama_syarikat;
      $info_kewpa15->kos=$request->kos;
      $info_kewpa15->pegawai_pengesah=$request->pegawai_pengesah;
      $info_kewpa15->no_siri_pendaftaran=$request->no_siri_pendaftaran;
      $info_kewpa15->kewpa15_id=$request->kewpa15_id;
      $info_kewpa15 -> save();

      return $info_kewpa15;
    }

    public function show(InfoKewpa15 $info_kewpa15)
    {
      return $info_kewpa15;
    }

    public function update(Request $request, InfoKewpa15 $info_kewpa15)
    {

      $info_kewpa15->tarikh=$request->tarikh;
      $info_kewpa15->jenis_penyelenggaraan=$request->jenis_penyelenggaraan;
      $info_kewpa15->butir_kerja=$request->butir_kerja;
      $info_kewpa15->nama_syarikat=$request->nama_syarikat;
      $info_kewpa15->kos=$request->kos;
      $info_kewpa15->pegawai_pengesah=$request->pegawai_pengesah;
      $info_kewpa15->no_siri_pendaftaran=$request->no_siri_pendaftaran;
      $info_kewpa15->kewpa15_id=$request->kewpa15_id;
      $info_kewpa15 -> save();

      return $info_kewpa15;

    }

    public function destroy(InfoKewpa15 $info_kewpa15)
    {
      return $info_kewpa15->delete();
    }



}
