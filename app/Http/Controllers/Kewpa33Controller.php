<?php

namespace App\Http\Controllers;

use App\Models\Kewpa33;
use App\Models\Kewpa3A;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class Kewpa33Controller extends Controller
{
  public function index()
  {
    return view('modul.aset_alih.kewpa33.index', [
      'kewpa33' => Kewpa33::all()
    ]);
  }

  public function store(Request $request)
  {
    Kewpa33::create($request->all());
    return redirect('/kewpa33');
  }

  public function create()
  {
    return view('modul.aset_alih.kewpa33.create', [
      'kewpa3a' => Kewpa3A::all()
    ]);
  }

  public function show(Kewpa33 $kewpa33)
  {
    return view('modul.aset_alih.kewpa33.edit', [
      'kewpa3a' => Kewpa3A::all(),
      'kewpa33' => $kewpa33
    ]);
  }

  public function update(Request $request, Kewpa33 $kewpa33)
  {

    $kewpa33->update($request->all());
    return redirect('/kewpa33');
  }

  public function destroy(Kewpa33 $kewpa33)
  {
    $kewpa33->delete();
    return redirect('/kewpa33');
  }

  public function generatePdf(Kewpa33 $kewpa33)
  {

    $response = Http::post('https://libreoffice.prototype.com.my/cetak/kpa33', [$kewpa33]);

    $res = $response->getBody()->getContents();

    $url = "data:application/pdf;base64," . $res;

    $context = [
      "url" => $url,
      "title" => "kewpa33",
    ];

    return view('modul.borang_viewer_pa', $context);
  }
}
