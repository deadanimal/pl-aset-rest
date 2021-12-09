<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kewpa7;
use App\Models\Kewpa3A;
use App\Models\KodJabatan;
use App\Models\KodLokasi;

class Kewpa7Controller extends Controller
{
    public function index()
    {

      $context = [
        "lokasi" => KodLokasi::all(),
        "jabatan" => KodJabatan::all(),
        "filter" => "off",
        "kewpa7" => Kewpa7::all(),
      ];

      return view('modul.aset_alih.kewpa7.index', $context);
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

    public function update(Request $request, $kewpa7)
    {
      $context = [
        "lokasi" => KodLokasi::all(),
        "jabatan" => KodJabatan::all(),
        "filter" => "on",
        "kewpa7" => Kewpa3A::where('lokasi_penempatan', $request->lokasi)->where('bahagian', $request->bahagian)->get()
      ];

      
      return view('modul.aset_alih.kewpa7.index', $context);
    }

    public function destroy(Kewpa7 $kewpa7)
    {
      return $kewpa7->delete();
    }

}
