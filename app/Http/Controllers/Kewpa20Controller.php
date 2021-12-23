<?php

namespace App\Http\Controllers;

use App\Models\Kewpa20;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class Kewpa20Controller extends Controller
{
  public function index()
  {
    return view('modul.aset_alih.kewpa20.index', [
      'kewpa20' => Kewpa20::all(),
    ]);
  }

  public function store(Request $request)
  {

    Kewpa20::create($request->all());

    return redirect('/kewpa20');
  }

  public function create()
  {
    return view('modul.aset_alih.kewpa20.create');
  }

  public function show(Kewpa20 $kewpa20)
  {
    return view('modul.aset_alih.kewpa20.edit', [
      'kewpa20' => $kewpa20,
    ]);
  }

  public function update(Request $request, Kewpa20 $kewpa20)
  {

    $kewpa20->update($request->all());

    return redirect('/kewpa20');
  }

  public function destroy(Kewpa20 $kewpa20)
  {
    $kewpa20->delete();

    return redirect('/kewpa20');
  }

  public function generatePdf(Kewpa20 $kewpa20)
  {

    $response = Http::post('https://libreoffice.prototype.com.my/cetak/kpa20', [$kewpa20]);

    $res = $response->getBody()->getContents();

    $url = "data:application/pdf;base64," . $res;

    $context = [
      "url" => $url,
      "title" => "kewpa20",
    ];

    return view('modul.borang_viewer_pa', $context);
  }
}
