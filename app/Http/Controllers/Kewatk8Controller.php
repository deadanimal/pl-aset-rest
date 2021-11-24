<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Kewatk8;
use App\Models\Kewatk3a;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class Kewatk8Controller extends Controller
{
    public function index()
    {

      $kewatk3a = Kewatk3a::all();
      $pengguna = User::all();
      $kewatk8 = Kewatk8::all();

      $context = [
        "kewatk3a" => $kewatk3a,
        "pengguna" => $pengguna,
        "kewatk8" => $kewatk8,
      ];

      return view('modul.aset_tak_ketara.kewatk8.index', $context);


    }


    public function store(Request $request)
    {
      $kewatk8 = Kewatk8::create($request->all());
      $kewatk8->status = "DERAF";
      $kewatk8->pengadu = $request->user()->id;

      $kewatk8->save();
       

      return redirect('/kewatk8');
    }

    public function show(Kewatk8 $kewatk8)
    {

      return $kewatk8;
    }


    public function update(Request $request, Kewatk8 $kewatk8)
    {

      $kewatk8->update($request->all());

      return redirect('/kewatk8');

    }

    public function destroy(Kewatk8 $kewatk8)
    {

      return $kewatk8->delete();
    }

    public function generatePdf(Request $request, Kewatk8 $kewatk8) {

      $response = Http::post('https://libreoffice.prototype.com.my/cetak/atk8', [$kewatk8]);

      $res = $response->getBody()->getContents();
      $url = "data:application/pdf;base64,".$res;

      $context = [
        "url" => $url,
        "title" => "Kewatk8"
      ];

      return view('modul.borang_viewer_atk', $context);



    }


}
