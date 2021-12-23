<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; use App\Models\Kewpa7;
use App\Models\Kewpa3A;
use App\Models\KodJabatan;
use App\Models\KodLokasi;
use Illuminate\Support\Facades\Http;

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

      \Session::put('lokasi', $request->lokasi);
      \Session::put('bahagian', $request->bahagian);

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
    public function generatePdf() {
      $lokasi = \Session::get('lokasi');
      $bahagian = \Session::get('bahagian');

      $context = (object)[];
      $context->lokasi = $lokasi;
      $context->bahagian = $bahagian;
      $context->kewpa7 = Kewpa3A::where('lokasi_penempatan', $lokasi)->where('bahagian', $bahagian)->get();

      $response = Http::post('https://libreoffice.prototype.com.my/cetak/kpa7', [$context]);

      $res = $response->getBody()->getContents();
      $url = "data:application/pdf;base64,".$res;

      $context = [
        "url" => $url,
        "title" => "Kewpa7",
      ];

      return view('modul.borang_viewer_pa', $context);



    }


}
