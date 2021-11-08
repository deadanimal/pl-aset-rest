<?php

namespace App\Http\Controllers;


use App\Http\Controllers\InfoKewatk10Controller;

use App\Models\Kewatk10;
use App\Models\Kewatk11;
use App\Models\InfoKewatk10;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use PDF;

class Kewatk11Controller extends Controller
{
public function index()
    {

      return Kewatk11::all();
    }


    public function store(Request $request)
    {
      $kewatk11 = new Kewatk11;
      $kewatk11->peratusan_diperiksa=$request->peratusan_diperiksa;
      $kewatk11->kewatk10_id=$request->kewatk10_id;
      $kewatk11->staff_id=$request->staff_id;      $kewatk11->save();
      return $kewatk11;
    }

    public function show(Kewatk11 $kewatk11)
    {

      return $kewatk11;
    }


    public function update(Request $request, Kewatk11 $kewatk11)
    {

      $kewatk11->peratusan_diperiksa=$request->peratusan_diperiksa;
      $kewatk11->kewatk10_id=$request->kewatk10_id;
      $kewatk11->staff_id=$request->staff_id;      
      $kewatk11->save();

      return $kewatk11;
    }

    public function destroy(Kewatk11 $kewatk11)
    {

      return $kewatk11->delete();
    }

    public function generatePdf(Request $request, $tahun) {
      $info_kewatk10 = InfoKewatk10::where('tahun_semasa', $tahun)->first();
      $info_kewatk10->tarikh = date_format($info_kewatk10->updated_at,"Y/m/d"); 
      $response = Http::post('http://127.0.0.1:8001/cetak/atk11', [$info_kewatk10]);

      $res = $response->getBody()->getContents();
      $url = "data:application/pdf;base64,".$res;

      $context = [
        "url" => $url
      ];

      return view('modul.borang_viewer', $context);


    }

}
