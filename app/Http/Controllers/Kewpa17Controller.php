<?php

namespace App\Http\Controllers;

use App\Models\InfoKewpa17;
use App\Models\InfoKewps17;
use App\Models\Kewpa17;
use App\Models\Kewpa3A;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class Kewpa17Controller extends Controller
{
  public function index()
  {

    return view('modul.aset_alih.kewpa17.index', [
      'kewpa17' => Kewpa17::all(),
      'kewpa3a' => Kewpa3A::all(),
    ]);
  }

  public function store(Request $request)
  {
    $request['pemohon_id'] = Auth::user()->id;
    $kewpa17 = Kewpa17::create($request->all());

    foreach (range(0, count($request->catatan) - 1) as $i) {
      InfoKewpa17::create([
        'catatan' => $request->catatan[$i],
        'no_siri_pendaftaran' => $request->no_siri_pendaftaran[$i],
        'no_permohonan_kewpa17' => $kewpa17->id,
      ]);
    }

    return redirect("/kewpa17");
  }

  public function show(Kewpa17 $kewpa17)
  {
    return view('modul.aset_alih.kewpa17.info_kewpa17', [
      'kewpa17' => $kewpa17,
      'kewpa3a' => Kewpa3A::all(),
    ]);
  }

  public function update(Request $request, Kewpa17 $kewpa17)
  {
    return redirect('/kewpa17');
  }

  public function destroy(Kewpa17 $kewpa17)
  {
    return $kewpa17->delete();
  }

  public function generatePdf(Kewpa17 $kewpa17)
  {

    $response = Http::post('https://libreoffice.prototype.com.my/cetak/pa17', [$kewpa17]);

    $res = $response->getBody()->getContents();

    $url = "data:application/pdf;base64," . $res;

    $context = [
      "url" => $url,
      "title" => "kewpa17",
    ];

    return view('modul.borang_viewer_pa', $context);
  }
}
