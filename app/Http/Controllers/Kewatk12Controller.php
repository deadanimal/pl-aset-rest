<?php

namespace App\Http\Controllers;


use App\Models\Kewatk3a;
use App\Models\Kewatk12;
use App\Models\KodLokasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class Kewatk12Controller extends Controller
{

    public function index()
    {

      $kewatk12 = Kewatk3a::where('status_selenggara', 'ya')->get();

      $context = [
        "kewatk12" => $kewatk12,
      ];

      return view('modul.aset_tak_ketara.kewatk12.index', $context);

    }


    public function store(Request $request)
    {
    }

    public function show(Kewatk12 $kewatk12)
    {
    }


    public function update(Request $request, Kewatk12 $kewatk12)
    {
    }

    public function destroy(Kewatk12 $kewatk12)
    {
    }

    public function generatePdf(Request $request)
    {


      $kewatk12 = Kewatk3a::where('status_selenggara', 'ya')->get()->toArray();

      $k12_array = [];
      $no = 0;
      foreach($kewatk12 as $k12) {
        $k12['kumpulan_aset'] = "harta intelek";
        $k12['lokasi'] = "temp_data";

        $no = $no + 1;
        $k12['no'] = $no;
        array_push($k12_array, $k12);
      }

      $context = [
        "data" => $k12_array
      ];

      $response = Http::post('http://127.0.0.1:8001/cetak/atk12', [$context]);

      $res = $response->getBody()->getContents();
      $url = "data:application/pdf;base64,".$res;

      $context = [
        "url" => $url
      ];

      return view('modul.borang_viewer', $context);



    }
}
