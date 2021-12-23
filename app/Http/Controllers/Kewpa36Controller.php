<?php

namespace App\Http\Controllers;

use App\Models\Kewpa33;
use App\Models\Kewpa36;
use App\Models\InfoKewpa36;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class Kewpa36Controller extends Controller
{
  public function index()
  {
    return view('modul.aset_alih.kewpa36.index', [
      'kewpa36' => Kewpa36::all()
    ]);
  }

  public function store(Request $request)
  {

    $kewpa36 = Kewpa36::create($request->all());

    for ($i = 0; $i < count($request->kewpa33_id); $i++) {

      InfoKewpa36::create([
        'jenis_aset_alih' => $request->jenis_aset_alih[$i],
        'kewpa33_id' => $request->kewpa33_id[$i],
        'kewpa36_id' => $kewpa36->id
      ]);
    }

    return redirect('/kewpa36');
  }

  public function create()
  {
    return view('modul.aset_alih.kewpa36.create', [
      'kewpa33' => Kewpa33::all()
    ]);
  }

  public function show(Kewpa36 $kewpa36)
  {
    return view('modul.aset_alih.kewpa36.edit', [
      'kewpa33' => Kewpa33::all(),
      'kewpa36' => $kewpa36
    ]);
  }

  public function update(Request $request, Kewpa36 $kewpa36)
  {

    $kewpa36->update($request->all());
    return redirect('/kewpa36');
  }

  public function destroy(Kewpa36 $kewpa36)
  {
    InfoKewpa36::where('kewpa36_id', $kewpa36->id)->delete();
    $kewpa36->delete();
    return redirect('/kewpa36');
  }
  public function generatePdf(Kewpa36 $kewpa36)
  {

    $response = Http::post('https://libreoffice.prototype.com.my/cetak/kpa36', [$kewpa36]);

    $res = $response->getBody()->getContents();

    $url = "data:application/pdf;base64," . $res;

    $context = [
      "url" => $url,
      "title" => "kewpa36",
    ];

    return view('modul.borang_viewer_pa', $context);
  }
}
