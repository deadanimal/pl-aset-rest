<?php

namespace App\Http\Controllers;

use App\Models\Kewatk5;
use App\Models\Kewatk3a;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

use PDF;

class Kewatk5Controller extends Controller
{
    public function index()
    {
      $kewatk3a = Kewatk3a::all();

      $context = [
        "kewatk5" => $kewatk3a,
      ];

      return view('modul.aset_tak_ketara.kewatk5.index', $context);

    }

    public function generatePdf(Request $request) 
    {

      $kewatk3a = Kewatk3a::all();
      $data = [
        "kewatk3a" => $kewatk3a,
        "j1" => 1,
        "j2" => 2,
        "j3" => 3,
        "jk1" => 4,
        "jk2" => 5,
        "jk3" => 6,
      ];

      $response = Http::post('https://libreoffice.prototype.com.my/cetak/atk5', [$data]);

      $res = $response->getBody()->getContents();
      $url = "data:application/pdf;base64,".$res;

      $context = [
        "url" => $url,
        "title" => "Kewatk3a"
      ];

      return view('modul.borang_viewer_atk', $context);


    }



}
