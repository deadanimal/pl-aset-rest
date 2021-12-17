<?php

namespace App\Http\Controllers;

use App\Models\Kewpa33;
use App\Models\Kewpa35;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class Kewpa35Controller extends Controller
{
  public function index()
  {
    return view('modul.aset_alih.kewpa35.index', [
      'kewpa35' => Kewpa35::all()
    ]);
  }

  public function store(Request $request)
  {
    Kewpa35::create($request->all());

    return redirect('/kewpa35');
  }

  public function create()
  {
    return view('modul.aset_alih.kewpa35.create', [
      'kewpa33' => Kewpa33::all()
    ]);
  }

  public function show(Kewpa35 $kewpa35)
  {
    return view('modul.aset_alih.kewpa35.edit', [
      'kewpa33' => Kewpa33::all(),
      'kewpa35' => $kewpa35
    ]);
  }

  public function update(Request $request, Kewpa35 $kewpa35)
  {
    $kewpa35->update($request->all());
    return redirect('/kewpa35');
  }

  public function destroy(Kewpa35 $kewpa35)
  {
    $kewpa35->delete();
    return redirect('/kewpa35');
  }
  public function generatePdf(Kewpa35 $kewpa35)
  {
    $response = Http::post('https://libreoffice.prototype.com.my/cetak/kpa35', [$kewpa35]);

    $res = $response->getBody()->getContents();

    $url = "data:application/pdf;base64," . $res;

    $context = [
      "url" => $url,
      "title" => "kewpa35",
    ];

    return view('modul.borang_viewer_pa', $context);
  }
}
