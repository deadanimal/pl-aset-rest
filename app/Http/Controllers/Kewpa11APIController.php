<?php

namespace App\Http\Controllers;

use App\Models\InfoKewpa11;
use App\Models\Kewpa11;
use Illuminate\Http\Request;

class Kewpa11APIController extends Controller
{
    public function index()
    {
      return InfoKewpa11::where('scan_status', 'scanned')->orWhere('scan_status', 'diperiksa')->get();
    }

    public function store(Request $request)
    {
      return Kewpa11::create($request->all());
    }

    public function show($info_kewpa11)
    {
      $info_kewpa11 = InfoKewpa11::where('id', $info_kewpa11)->first();
      $info_kewpa11->kewpa11 = Kewpa11::where('id', $info_kewpa11->rujukan_kewpa11_id)->first();
      return $info_kewpa11;
    }

    public function update(Request $request, $kewpa11)
    {
      $info_kewpa11 = InfoKewpa11::where('id', $kewpa11)->first();

      $info_kewpa11->update($request->all());
      return $info_kewpa11;
    }

    public function destroy($kewpa11)
    {
      $kewpa11 = InfoKewpa11::where('id', $kewpa11)->first();
      return $kewpa11->delete();
    }

    public function get_scanned_infokewpa11(Request $request) {
      $info_kewpa11 = InfoKewpa11::where('no_siri_pendaftaran', $request->no_siri_pendaftaran)->first();
      $info_kewpa11->scan_status = "scanned";
      $info_kewpa11->save();

      $info_kewpa11->kewpa11 = Kewpa11::where('id', $info_kewpa11->rujukan_kewpa11_id)->first();

      return $info_kewpa11;
    }
}
