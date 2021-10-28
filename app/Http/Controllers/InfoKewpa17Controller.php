<?php

namespace App\Http\Controllers;

use App\Models\InfoKewpa17;
use Illuminate\Http\Request;

class InfoKewpa17Controller extends Controller
{
    public function index()
    {
      return InfoKewpa17::all();
    }

    public function store(Request $request)
    {
      
      $info_kewpa17 = new InfoKewpa17;
      $info_kewpa17->catatan=$request->catatan;
      $info_kewpa17->no_siri_pendaftaran=$request->no_siri_pendaftaran;
      $info_kewpa17->no_permohonan_kewpa17=$request->no_permohonan_kewpa17;
      $info_kewpa17 -> save();

      return $info_kewpa17;
    }

    public function show(InfoKewpa17 $info_kewpa17)
    {
      return $info_kewpa17;
    }

    public function update(Request $request, InfoKewpa17 $info_kewpa17)
    {

      $info_kewpa17->catatan=$request->catatan;
      $info_kewpa17->no_siri_pendaftaran=$request->no_siri_pendaftaran;
      $info_kewpa17->no_permohonan_kewpa17=$request->no_permohonan_kewpa17;

      $info_kewpa17 -> save();

      return $info_kewpa17;

    }

    public function destroy(InfoKewpa17 $info_kewpa17)
    {
      return $info_kewpa17->delete();
    }



}
