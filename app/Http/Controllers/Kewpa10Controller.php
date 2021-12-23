<?php

namespace App\Http\Controllers;

use App\Models\Kewpa10;
use App\Models\Kewpa3A;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class Kewpa10Controller extends Controller
{
    public function index()
    {
      $context = [
        "kewpa10" => Kewpa10::all(),
      ];
      return view('modul.aset_alih.kewpa10.index', $context);
    }

    public function store(Request $request)
    {

      $request['status'] ="DERAF";
      $kewpa10 = Kewpa10::create($request->all());
      return redirect('/kewpa10');

    }

    public function create() {
      $context = [
        "pengguna" => User::all(),
        "kewpa3a" => Kewpa3A::all(),
      ];

      return view('modul.aset_alih.kewpa10.create', $context);
    }


    public function show($kewpa10)
    {
      return Kewpa10::where('id', $kewpa10)->first();
    }

    public function edit(Request $request, Kewpa10 $kewpa10) {

      $context = [
        "pengguna" => User::all(),
        "kewpa3a" => Kewpa3A::all(),
        "kewpa10" => $kewpa10
      ];

      return view('modul.aset_alih.kewpa10.edit', $context);



    }


    public function update(Request $request, $kewpa10)
    {
      $kewpa10 = Kewpa10::where('id', $kewpa10)->first();
      $kewpa10->update($request->all());
      return redirect('/kewpa10');


    }

    public function destroy($kewpa10)
    {
      $kewpa10 = Kewpa10::where('id', $kewpa10)->first();
      return $kewpa10->delete();
    }

    public function generatePdf(Kewpa10 $kewpa10) {
      $response = Http::post('https://libreoffice.prototype.com.my/cetak/kpa10', [$kewpa10]);

      $res = $response->getBody()->getContents();
      $url = "data:application/pdf;base64,".$res;

      $context = [
        "url" => $url,
        "title" => "Kewpa10",
      ];

      return view('modul.borang_viewer_pa', $context);



    }


}
