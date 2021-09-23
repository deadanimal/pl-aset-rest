<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kewpa7;

class Kewpa7Controller extends Controller
{
    public function index()
    {
      return Kewpa7::all();
    }

    public function store(Request $request)
    {
      
      $kewpa7 = new Kewpa7;
      $kewpa7 -> kewpa7_id = $request->kewpa7_id;
      $kewpa7 -> bahagian = $request->bahagian;
      $kewpa7 -> lokasi = $request->lokasi;
      $kewpa7 -> pegawai_menyediakan = $request->pegawai_menyediakan;
      $kewpa7 -> pegawai_mengesahkan = $request->pegawai_mengesahkan;
      $kewpa7 -> save();

      return $kewpa7;
    }

    public function show(Kewpa7 $kewpa7)
    {

      $kewpa7 -> kewpa7_id = $request->kewpa7_id;
      $kewpa7 -> bahagian = $request->bahagian;
      $kewpa7 -> lokasi = $request->lokasi;
      $kewpa7 -> pegawai_menyediakan = $request->pegawai_menyediakan;
      $kewpa7 -> pegawai_mengesahkan = $request->pegawai_mengesahkan;
      $kewpa7 -> save();

      return $kewpa7;
    }

    public function update(Request $request, Kewpa7 $kewpa7)
    {
      return $kewpa7;

    }

    public function destroy(Kewpa7 $kewpa7)
    {
      return $kewpa7->delete();
    }

}
