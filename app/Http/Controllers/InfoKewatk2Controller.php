<?php

namespace App\Http\Controllers;

use App\Models\InfoKewatk2;
use Illuminate\Http\Request;

class InfoKewatk2Controller extends Controller
{
    public function index()
    {
      return InfoKewatk2::all();
    }

    public function store(Request $request)
    {
      $info_kewatk2 = new InfoKewatk2;
      $info_kewatk2->kuantiti_ditolak=$request->kuantiti_ditolak;
      $info_kewatk2->kuantiti_kurang_lebih=$request->kuantiti_kurang_lebih;
      $info_kewatk2->sebab_penolakan=$request->sebab_penolakan;
      $info_kewatk2->catatan=$request->catatan;
      $info_kewatk2->no_rujukan_atk2=$request->no_rujukan_atk2;

      $info_kewatk2 -> save();


      return $info_kewatk2;

      
    }

    public function show(InfoKewatk2 $info_kewatk2)
    {
      return $info_kewatk2;
    }

    public function update(Request $request, InfoKewatk2 $info_kewatk2)
    {
      $info_kewatk2->kuantiti_ditolak=$request->kuantiti_ditolak;
      $info_kewatk2->kuantiti_kurang_lebih=$request->kuantiti_kurang_lebih;
      $info_kewatk2->sebab_penolakan=$request->sebab_penolakan;
      $info_kewatk2->catatan=$request->catatan;
      $info_kewatk2->no_rujukan_atk2=$request->no_rujukan_atk2;

      $info_kewatk2 -> save();


      return $info_kewatk2;


    }

    public function destroy(InfoKewatk2 $info_kewatk2)
    {
      return $info_kewatk2->delete();
    }
}
