<?php

namespace App\Http\Controllers;

use App\Models\Kewatk5;
use App\Models\Kewatk3a;
use Illuminate\Http\Request;
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

      $pdf = PDF::loadView('modul.aset_tak_ketara.kewatk5.kewatk5_template', [
        'kewatk3' => $kewatk3a
          
      ])->setPaper('a4', 'potrait');

      $pdf->save('kewatk5.pdf');

      $context = [
        "url" => "/kewatk5.pdf"
      ];

      return view('modul.aset_tak_ketara.kewatk1.pdf', $context);


    }



}
