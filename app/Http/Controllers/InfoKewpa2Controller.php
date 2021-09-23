<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InfoKewpa2;

class InfoKewpa2Controller extends Controller
{
    public function index()
    {
      return InfoKewpa2::all();
    }

    public function store(Request $request)
    {
      $info_kewpa2 = new InfoKewpa2; 
      $info_kewpa2 -> info_kewpa2 = $request -> info_kewpa2;
      $info_kewpa2 -> kuantiti_ditolak = $request -> kuantiti_ditolak;
      $info_kewpa2 -> kuantiti_kurang_lebih = $request -> kuantiti_kurang_lebih;
      $info_kewpa2 -> sebab_penolakan = $request -> sebab_penolakan;
      $info_kewpa2 -> catatan = $request -> catatan;
      $info_kewpa2 -> rujukan_kewpa1_id = $request -> rujukan_kewpa1_id;
      $info_kewpa2 -> save();

      return $info_kewpa2;

    }

    public function show(InfoKewpa2 $info_kewpa2)
    {
      return $info_kewpa2;
    }


    public function update(Request $request, InfoKewpa2 $info_kewpa2)
    {

      $info_kewpa2 -> info_kewpa2 = $request -> info_kewpa2;
      $info_kewpa2 -> kuantiti_ditolak = $request -> kuantiti_ditolak;
      $info_kewpa2 -> kuantiti_kurang_lebih = $request -> kuantiti_kurang_lebih;
      $info_kewpa2 -> sebab_penolakan = $request -> sebab_penolakan;
      $info_kewpa2 -> catatan = $request -> catatan;
      $info_kewpa2 -> rujukan_kewpa1_id = $request -> rujukan_kewpa1_id;
      $info_kewpa2 -> save();

      return $info_kewpa2;

    }

    public function destroy(InfoKewpa2 $info_kewpa2)
    {
      return $info_kewpa2->delete();
    }


}
