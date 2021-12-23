<?php

namespace App\Http\Controllers;

use App\Models\InfoKewpa21;
use App\Models\Kewpa21;
use App\Models\Kewpa30;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class Kewpa30Controller extends Controller
{
  public function index()
  {
    return view('modul.aset_alih.kewpa30.index', [
      'kewpa30' => Kewpa30::all()
    ]);
  }

  public function store(Request $request)
  {
    Kewpa30::create($request->all());
    return redirect('/kewpa30');
  }

  public function create()
  {
    return view('modul.aset_alih.kewpa30.create', [
      'kewpa21' => InfoKewpa21::all()
    ]);
  }

  public function show(Kewpa30 $kewpa30)
  {
    return view('modul.aset_alih.kewpa30.edit', [
      'kewpa21' => InfoKewpa21::all(),
      'kewpa30' => $kewpa30
    ]);
  }

  public function update(Request $request, Kewpa30 $kewpa30)
  {
    $kewpa30->update($request->all());
    return redirect('/kewpa30');
  }

  public function destroy(Kewpa30 $kewpa30)
  {
    $kewpa30->delete();
    return redirect('/kewpa30');
  }

  public function generatePdf(Kewpa30 $kewpa30)
  {
    $response = Http::post('https://libreoffice.prototype.com.my/cetak/kpa30', [$kewpa30]);

    $res = $response->getBody()->getContents();

    $url = "data:application/pdf;base64," . $res;

    $context = [
      "url" => $url,
      "title" => "kewpa30",
    ];

    return view('modul.borang_viewer_pa', $context);
  }
}
