<?php

namespace App\Http\Controllers;

use App\Models\InfoKewatk6;
use Illuminate\Http\Request;

class InfoKewatk6Controller extends Controller
{
    public function index()
    {
      return InfoKewatk6::all();
    }

    public function store(Request $request)
    {
      $info_kewatk6 = new InfoKewatk6;
      $info_kewatk6->agensi=$request->agensi;
      $info_kewatk6->kuantiti=$request->kuantiti;
      $info_kewatk6->nilai_perolehan_asal=$request->nilai_perolehan_asal;
      $info_kewatk6->nilai_semasa=$request->nilai_semasa;
      $info_kewatk6->no_siri_pendaftaran=$request->no_siri_pendaftaran;
      $info_kewatk6->kewatk6_id=$request->kewatk6_id;
      $info_kewatk6 -> save();


      return $info_kewatk6;

      
    }

    public function show(InfoKewatk6 $info_kewatk6)
    {
      return $info_kewatk6;
    }

    public function update(Request $request, InfoKewatk6 $info_kewatk6)
    {

      $info_kewatk6->agensi=$request->agensi;
      $info_kewatk6->kuantiti=$request->kuantiti;
      $info_kewatk6->nilai_perolehan_asal=$request->nilai_perolehan_asal;
      $info_kewatk6->nilai_semasa=$request->nilai_semasa;
      $info_kewatk6->no_siri_pendaftaran=$request->no_siri_pendaftaran;
      $info_kewatk6->kewatk6_id=$request->kewatk6_id;
      $info_kewatk6 -> save();



      return $info_kewatk6;


    }

    public function destroy(InfoKewatk6 $info_kewatk6)
    {
      return $info_kewatk6->delete();
    }
}
