<?php

namespace App\Http\Controllers;

use App\Models\Kewpa24;
use App\Models\Kewpa26;
use App\Models\InfoKewpa26;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class Kewpa26Controller extends Controller
{
  public function index()
  {
    return view('modul.aset_alih.kewpa26.index', [
      'kewpa26' => Kewpa26::all()
    ]);
  }

  public function store(Request $request)
  {
    $kewpa26 =  Kewpa26::create($request->all());

    for ($i = 0; $i < count($request->no_tender); $i++) {
      InfoKewpa26::create([
        'kod_petender' => $request->kod_petender[$i],
        'harga' => $request->harga[$i],
        'no_tender' => $request->no_tender[$i],
        'kewpa26_id' => $kewpa26->id,
      ]);
    }
    return redirect('/kewpa26');
  }

  public function create()
  {
    return view('modul.aset_alih.kewpa26.create', [
      'kewpa24' => Kewpa24::all()
    ]);
  }

  public function show(Kewpa26 $kewpa26)
  {
    return view('modul.aset_alih.kewpa26.edit', [
      'kewpa24' => Kewpa24::all(),
      'kewpa26' => $kewpa26
    ]);
  }

  public function update(Request $request, Kewpa26 $kewpa26)
  {
    $kewpa26->update($request->all());
    return redirect('/kewpa26');
  }

  public function destroy(Kewpa26 $kewpa26)
  {
    InfoKewpa26::where('kewpa26_id', $kewpa26->id)->delete();
    $kewpa26->delete();
    return redirect('/kewpa26');
  }

  public function generatePdf(Kewpa26 $kewpa26)
  {

    $response = Http::post('https://libreoffice.prototype.com.my/cetak/kpa26', [$kewpa26]);

    $res = $response->getBody()->getContents();

    $url = "data:application/pdf;base64," . $res;

    $context = [
      "url" => $url,
      "title" => "kewpa26",
    ];

    return view('modul.borang_viewer_pa', $context);
  }
}
