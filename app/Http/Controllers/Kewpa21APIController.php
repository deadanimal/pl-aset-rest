<?php

namespace App\Http\Controllers;

use App\Models\InfoKewpa21;
use App\Models\Kewpa21;
use Illuminate\Http\Request;

class Kewpa21APIController extends Controller
{
    public function index()
    {
      return InfoKewpa21::where('scan_status', "scanned")->orWhere('scan_status', 'diperiksa')->get();
    }

    public function store(Request $request)
    {
      return Kewpa21::create($request->all());
    }

    public function show($info_kewpa21)
    {
      $info_kewpa21 = InfoKewpa21::where('id', $info_kewpa21)->first();
      $info_kewpa21->kewpa21 = Kewpa21::where('id', $info_kewpa21->kewpa21_id)->first();
      return $info_kewpa21;
    }

    public function update(Request $request, $kewpa21)
    {
      $info_kewpa21 = InfoKewpa21::where('id', $kewpa21)->first();

      $info_kewpa21->update($request->all());
      return $info_kewpa21;
    }

    public function destroy($kewpa21)
    {
      $kewpa21 = InfoKewpa21::where('id', $kewpa21)->first();
      $kewpa21->scan_status = "";
      $kewpa21->save();
      return $kewpa21;

      //return $kewpa21->delete();
    }

    public function get_scanned_infokewpa21(Request $request) {
      $info_kewpa21 = InfoKewpa21::where('no_siri_pendaftaran', $request->no_siri_pendaftaran)->first();
      $info_kewpa21->scan_status = "scanned";
      $info_kewpa21->save();

      $info_kewpa21->kewpa21 = Kewpa21::where('id', $info_kewpa21->kewpa21_id)->first();

      return $info_kewpa21;
    }
}
