<?php

namespace App\Http\Controllers;

use App\Models\Kewpa27;
use App\Models\Kewpa29;
use App\Models\InfoKewpa29;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class Kewpa29Controller extends Controller
{
  public function index()
  {
    return view('modul.aset_alih.kewpa29.index', [
      'kewpa29' => Kewpa29::all()
    ]);
  }

  public function store(Request $request)
  {
    $kewpa29 = Kewpa29::create($request->all());

    for ($i = 0; $i < count($request->kewpa27_id); $i++) {
      InfoKewpa29::create([
        'kod_penyebut' => $request->kod_penyebut[$i],
        'harga' => $request->harga[$i],
        'no_sebut_harga' => $request->kewpa27_id[$i],
        'kewpa29_id' => $kewpa29->id
      ]);
    }

    return redirect('/kewpa29');
  }
  public function create()
  {
    return view('modul.aset_alih.kewpa29.create', [
      'kewpa27' => Kewpa27::all()
    ]);
  }

  public function show(Kewpa29 $kewpa29)
  {
    return view('modul.aset_alih.kewpa29.edit', [
      'kewpa27' => Kewpa27::all(),
      'kewpa29' => $kewpa29
    ]);
  }

  public function update(Request $request, Kewpa29 $kewpa29)
  {
    $kewpa29->update($request->all());
    return redirect('/kewpa29');
  }

  public function destroy(Kewpa29 $kewpa29)
  {
    InfoKewpa29::where('kewpa29_id', $kewpa29->id)->delete();
    $kewpa29->delete();

    return redirect('/kewpa29');
  }

  public function generatePdf(Kewpa29 $kewpa29)
  {
    $response = Http::post('https://libreoffice.prototype.com.my/cetak/kpa29', [$kewpa29]);

    $res = $response->getBody()->getContents();

    $url = "data:application/pdf;base64," . $res;

    $context = [
      "url" => $url,
      "title" => "kewpa29",
    ];

    return view('modul.borang_viewer_pa', $context);
  }
}
