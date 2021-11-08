<?php

namespace App\Http\Controllers;

use App\Models\InfoKewatk9;
use Illuminate\Http\Request;

class InfoKewatk9Controller extends Controller
{
    public function index()
    {
      return InfoKewatk9::all();
    }

    public function store($request)
    {
      $info_kewatk9 = new InfoKewatk9;
      $info_kewatk9->lokasi_sebenar=$request->lokasi_sebenar;
      $info_kewatk9->status_harta=$request->status_harta;
      $info_kewatk9->catatan=$request->catatan;
      $info_kewatk9->no_siri_pendaftaran=$request->no_siri_pendaftaran;
      $info_kewatk9->no_rujukan_atk9=$request->no_rujukan_atk9;

      $info_kewatk9 -> save();

      return $info_kewatk9;
    }

    public function show($kewatk9)
    {
      $info_kewatk9 = InfoKewatk9::where('no_rujukan_atk9', $kewatk9)->get();
      return $info_kewatk9;
    }

    public function update($request, $info_kewatk9_id)
    {
      $info_kewatk9 = InfoKewatk9::where('id', $info_kewatk9_id)->first();
      $info_kewatk9->lokasi_sebenar=$request->lokasi_sebenar;
      $info_kewatk9->status_harta=$request->status_harta;
      $info_kewatk9->catatan=$request->catatan;
      $info_kewatk9->no_siri_pendaftaran=$request->no_siri_pendaftaran;
      $info_kewatk9->no_rujukan_atk9=$request->no_rujukan_atk9;

      $info_kewatk9 -> save();

      return $info_kewatk9;

    }

    public function destroy(InfoKewatk9 $info_kewatk9)
    {
      return $info_kewatk9->delete();
    }
}
