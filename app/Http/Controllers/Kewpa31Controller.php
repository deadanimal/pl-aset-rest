<?php

namespace App\Http\Controllers;

use App\Models\Kewpa30;
use App\Models\Kewpa31;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class Kewpa31Controller extends Controller
{
  public function index()
  {
    return view('modul.aset_alih.kewpa31.index', [
      'kewpa31' => Kewpa31::all()
    ]);
  }

  public function store(Request $request)
  {

    Kewpa31::create($request->all());
    return redirect('/kewpa31');
  }

  public function create()
  {
    return view('modul.aset_alih.kewpa31.create', [
      'kewpa30' => Kewpa30::all()
    ]);
  }

  public function show(Kewpa31 $kewpa31)
  {
    return view('modul.aset_alih.kewpa31.edit', [
      'kewpa30' => Kewpa30::all(),
      'kewpa31' => $kewpa31
    ]);
  }

  public function update(Request $request, Kewpa31 $kewpa31)
  {

    $kewpa31->update($request->all());
    return redirect('/kewpa31');
  }

  public function destroy(Kewpa31 $kewpa31)
  {
    $kewpa31->delete();
    return redirect('/kewpa31');
  }

  public function generatePdf(Kewpa31 $kewpa31)
  {
    $kewpa31 = $kewpa31->first();
    $kewpa31['agensi'] = $kewpa31->kewpa30->agensi;

    $kewpa31['data'] = $kewpa31->all();


    $response = Http::post('https://libreoffice.prototype.com.my/cetak/kpa31', [$kewpa31]);

    $res = $response->getBody()->getContents();

    $url = "data:application/pdf;base64," . $res;

    $context = [
      "url" => $url,
      "title" => "kewpa31",
    ];

    return view('modul.borang_viewer_pa', $context);
  }
}
