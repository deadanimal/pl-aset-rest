<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InfoKewpa1;

class InfoKewpa1Controller extends Controller
{
    public function index()
    {
      return InfoKewpa1::all();
    }

    public function store(Request $request)
    {
      $info_kewpa1 = new InfoKewpa1; 
      $info_kewpa1 -> no_kod = $request -> no_kod;
      $info_kewpa1 -> keterangan_aset_alih = $request -> keterangan_aset_alih;
      $info_kewpa1 -> kuantiti_dipesan = $request -> kuantiti_dipesan;
      $info_kewpa1 -> kuantiti_do = $request -> kuantiti_do;
      $info_kewpa1 -> kuantiti_diterima = $request -> kuantiti_diterima;
      $info_kewpa1 -> catatan = $request -> catatan;
      $info_kewpa1 -> rujukan_kewpa1_id = $request -> rujukan_kewpa1_id;
      $info_kewpa1 -> save();

      return $info_kewpa1;

    }

    public function show(InfoKewpa1 $info_kewpa1)
    {
      return $info_kewpa1;
    }


    public function update(Request $request, InfoKewpa1 $info_kewpa1)
    {

      $info_kewpa1 -> no_kod = $request -> no_kod;
      $info_kewpa1 -> keterangan_aset_alih = $request -> keterangan_aset_alih;
      $info_kewpa1 -> kuantiti_dipesan = $request -> kuantiti_dipesan;
      $info_kewpa1 -> kuantiti_do = $request -> kuantiti_do;
      $info_kewpa1 -> kuantiti_diterima = $request -> kuantiti_diterima;
      $info_kewpa1 -> catatan = $request -> catatan;
      $info_kewpa1 -> rujukan_kewpa1_id = $request -> rujukan_kewpa1_id;
      $info_kewpa1 -> save();

      return $info_kewpa1;

    }

    public function destroy(InfoKewpa1 $info_kewpa1)
    {
      return $info_kewpa1->delete();
    }

}
