<?php

namespace App\Http\Controllers;

use App\Models\Kewpa22;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class Kewpa22Controller extends Controller
{
  public function index()
  {
    return view('modul.aset_alih.kewpa22.index', [
      'kewpa22' => Kewpa22::all(),
    ]);
  }

  public function store(Request $request)
  {
    Kewpa22::create($request->all());
    return redirect('/kewpa22');
  }

  public function create()
  {
    return view('modul.aset_alih.kewpa22.create');
  }

  public function show(Kewpa22 $kewpa22)
  {
    return view('modul.aset_alih.kewpa22.edit', [
      'kewpa22' => $kewpa22,
    ]);
  }

  public function update(Request $request, Kewpa22 $kewpa22)
  {

    $kewpa22->update($request->all());

    return redirect('/kewpa22');
  }

  public function destroy(Kewpa22 $kewpa22)
  {
    $kewpa22->delete();
    return redirect('/kewpa22');
  }
  public function generatePdf(Kewpa22 $kewpa22)
  {

    $response = Http::post('https://libreoffice.prototype.com.my/cetak/kpa22', [$kewpa22]);

    $res = $response->getBody()->getContents();

    $url = "data:application/pdf;base64," . $res;

    $context = [
      "url" => $url,
      "title" => "kewpa22",
    ];

    return view('modul.borang_viewer_pa', $context);
  }
}
