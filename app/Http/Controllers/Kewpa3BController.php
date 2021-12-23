<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kewpa3B;
use App\Models\Kewpa3A;
use App\Models\KodLokasi;
use App\Models\KodJabatan;
use App\Models\User;
use Illuminate\Support\Facades\Http;

class Kewpa3BController extends Controller
{
    public function index()
    {
      $context = [
        "kewpa3b" => Kewpa3B::all()
      ];

      return view('modul.aset_alih.kewpa3b.index', $context);
    }

    public function store(Request $request)
    {
      
      $request['status'] = "DERAF";
      Kewpa3B::create($request->all());
      return redirect('/kewpa3b');
    }

    public function create() {
      $context = [
        "kewpa3b" => Kewpa3B::all(),
        "pegawais" => User::all(),
        "kewpa3a" => Kewpa3A::all(),
      ];

      return view('modul.aset_alih.kewpa3b.create', $context);
    }

    public function edit(Request $request, Kewpa3B $kewpa3b) {

      $context = [
        "kewpa3b" => $kewpa3b,
        "pegawais" => User::all(),
        "kewpa3a" => Kewpa3A::all(),
      ];

      return view('modul.aset_alih.kewpa3b.edit', $context);



    }

    public function show(Kewpa3B $kewpa3b)
    {
      return $kewpa3b;
    }

    public function update(Request $request, Kewpa3B $kewpa3b)
    {

      $kewpa3b->update($request->all());
      return redirect('/kewpa3b');
      



    }

    public function destroy(Kewpa3B $kewpa3b)
    {
      return $kewpa3b->delete();
    }

    public function generatePdf() {
      $context = [
        "kewpa3b" => Kewpa3B::all(),
      ];
      $response = Http::post('https://libreoffice.prototype.com.my/cetak/kpa3B', [$context]);

      $res = $response->getBody()->getContents();
      $url = "data:application/pdf;base64,".$res;

      $context = [
        "url" => $url,
        "title" => "Kewpa1",
      ];

      return view('modul.borang_viewer_pa', $context);



    }


}
