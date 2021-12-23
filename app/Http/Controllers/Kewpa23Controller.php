<?php

namespace App\Http\Controllers;

use App\Models\InfoKewpa21;
use App\Models\Kewpa23;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class Kewpa23Controller extends Controller
{
  public function index()
  {
    return view('modul.aset_alih.kewpa23.index', [
      'kewpa23' => Kewpa23::all()
    ]);
  }

  public function store(Request $request)
  {
    Kewpa23::create($request->all());
    return redirect('/kewpa23');
  }

  public function create()
  {
    return view('modul.aset_alih.kewpa23.create', [
      'infokewpa21' => InfoKewpa21::all()
    ]);
  }
  public function show(Kewpa23 $kewpa23)
  {
    return view('modul.aset_alih.kewpa23.edit', [
      'infokewpa21' => InfoKewpa21::all(),
      'kewpa23' => $kewpa23
    ]);
  }

  public function update(Request $request, Kewpa23 $kewpa23)
  {

    $kewpa23->update($request->all());
    return redirect('/kewpa23');
  }

  public function destroy(Kewpa23 $kewpa23)
  {
    $kewpa23->delete();
    return redirect('/kewpa23');
  }

  public function generatePdf(Kewpa23 $kewpa23)
  {

    $response = Http::post('https://libreoffice.prototype.com.my/cetak/kpa23', [$kewpa23]);

    $res = $response->getBody()->getContents();

    $url = "data:application/pdf;base64," . $res;

    $context = [
      "url" => $url,
      "title" => "kewpa23",
    ];

    return view('modul.borang_viewer_pa', $context);
  }
}
