<?php

namespace App\Http\Controllers;

use App\Models\Kewpa33;
use App\Models\Kewpa34;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class Kewpa34Controller extends Controller
{
  public function index()
  {
    return view('modul.aset_alih.kewpa34.index', [
      'kewpa34' => Kewpa34::all()
    ]);
  }

  public function store(Request $request)
  {
    Kewpa34::create($request->all());
    return redirect('/kewpa34');
  }

  public function create()
  {
    return view('modul.aset_alih.kewpa34.create', [
      'kewpa33' => Kewpa33::all()
    ]);
  }

  public function show(Kewpa34 $kewpa34)
  {
    return view('modul.aset_alih.kewpa34.edit', [
      'kewpa33' => Kewpa33::all(),
      'kewpa34' => $kewpa34
    ]);
  }

  public function update(Request $request, Kewpa34 $kewpa34)
  {
    $kewpa34->update($request->all());
    return redirect('/kewpa34');
  }

  public function destroy(Kewpa34 $kewpa34)
  {
    $kewpa34->delete();
    return redirect('/kewpa34');
  }

  public function generatePdf(Kewpa34 $kewpa34)
  {

    $response = Http::post('https://libreoffice.prototype.com.my/cetak/kpa34', [$kewpa34]);

    $res = $response->getBody()->getContents();

    $url = "data:application/pdf;base64," . $res;

    $context = [
      "url" => $url,
      "title" => "kewpa34",
    ];

    return view('modul.borang_viewer_pa', $context);
  }
}
