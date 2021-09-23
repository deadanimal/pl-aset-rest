<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kewpa2;

class Kewpa2Controller extends Controller
{
    public function index()
    {
      return Kewpa2::all();
    }

    public function store(Request $request)
    {
      $kewpa2 = new Kewpa2; 
      $kewpa2 -> rujukan_kewpa2 = $request -> rujukan_kewpa2;
      $kewpa2 -> tindakan = $request -> tindakan;
      $kewpa2 -> pegawai_penerima = $request -> pegawai_penerima;
      $kewpa2 -> rujukan_kewpa1_id = $request -> rujukan_kewpa1_id;
      $kewpa2 -> save();

      return $kewpa2;

    }

    public function show(Kewpa2 $kewpa2)
    {
      return $kewpa2;
    }


    public function update(Request $request, Kewpa2 $kewpa2)
    {

      $kewpa2 -> rujukan_kewpa2 = $request -> rujukan_kewpa2;
      $kewpa2 -> tindakan = $request -> tindakan;
      $kewpa2 -> pegawai_penerima = $request -> pegawai_penerima;
      $kewpa2 -> rujukan_kewpa1_id = $request -> rujukan_kewpa1_id;
      $kewpa2 -> save();

      return $kewpa2;

    }

    public function destroy(Kewpa2 $kewpa2)
    {
      return $kewpa2->delete();
    }


}
