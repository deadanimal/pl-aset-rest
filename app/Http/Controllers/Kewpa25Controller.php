<?php

namespace App\Http\Controllers;

use App\Models\InfoKewpa24;
use App\Models\Kewpa24;
use App\Models\Kewpa25;
use App\Models\InfoKewpa25;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class Kewpa25Controller extends Controller
{
  public function index()
  {
    return view('modul.aset_alih.kewpa25.index', [
      'kewpa25' => Kewpa25::all()
    ]);
  }

  public function store(Request $request)
  {
    $kewpa25 = Kewpa25::create($request->all());
    for ($i = 0; $i < count($request->no_tender); $i++) {
      InfoKewpa25::create([
        'kuantiti' => $request->kuantiti[$i],
        'harga_tawaran' => $request->harga_tawaran[$i],
        'deposit_tender' => $request->deposit_tender1[$i],
        'no_tender' => $request->no_tender[$i],
        'kewpa25_id' => $kewpa25->id,
      ]);
    }

    return redirect('/kewpa25');
  }

  public function create()
  {
    return view('modul.aset_alih.kewpa25.create', [
      'kewpa24' => InfoKewpa24::all()
    ]);
  }
  public function show(Kewpa25 $kewpa25)
  {
    return view('modul.aset_alih.kewpa25.edit', [
      'kewpa24' => InfoKewpa24::all(),
      'kewpa25' => $kewpa25
    ]);
  }

  public function update(Request $request, Kewpa25 $kewpa25)
  {

    $kewpa25->update($request->all());

    return redirect('/kewpa25');
  }

  public function destroy(Kewpa25 $kewpa25)
  {
    InfoKewpa25::where('kewpa25_id', $kewpa25->id)->delete();
    $kewpa25->delete();
    return redirect('/kewpa25');
  }
  public function generatePdf(Kewpa25 $kewpa25)
  {

    $response = Http::post('https://libreoffice.prototype.com.my/cetak/kpa25', [$kewpa25]);

    $res = $response->getBody()->getContents();

    $url = "data:application/pdf;base64," . $res;

    $context = [
      "url" => $url,
      "title" => "kewpa25",
    ];

    return view('modul.borang_viewer_pa', $context);
  }
}
