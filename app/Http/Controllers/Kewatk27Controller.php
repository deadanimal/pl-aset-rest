<?php

namespace App\Http\Controllers;

use App\Models\Kewatk27;
use Illuminate\Http\Request;

class Kewatk27Controller extends Controller
{
    public function index()
    {
      return view('modul.aset_tak_ketara.kewatk27.index');

    }


    public function generatePdf(Request $request, Kewatk27 $ktahun) {

      $response = Http::post('https://libreoffice.prototype.com.my/cetak/atk27', [$data]);

      $res = $response->getBody()->getContents();
      $url = "data:application/pdf;base64,".$res;

      $context = [
        "url" => $url,
        "title" => "Kewatk26",
      ];

      return view('modul.borang_viewer_atk', $context);


    }


}
