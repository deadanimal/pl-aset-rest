<?php

namespace App\Http\Controllers;

use App\Models\InfoKewpa21;
use App\Models\Kewpa21;
use App\Models\Kewpa24;
use App\Models\InfoKewpa24;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class Kewpa24Controller extends Controller
{
  public function index()
  {
    return view('modul.aset_alih.kewpa24.index', [
      'kewpa24' => Kewpa24::all(),
    ]);
  }

  public function store(Request $request)
  {
    $kewpa24 = Kewpa24::create($request->all());

    for ($i = 0; $i < count($request->kewpa21_id); $i++) {
      InfoKewpa24::create([
        'kuantiti' => $request->kuantiti[$i],
        'harga_simpanan' => $request->harga_simpanan[$i],
        'kewpa21_id' => $request->kewpa21_id[$i],
        'kewpa24_id' => $kewpa24->id,
      ]);
    }

    return redirect('/kewpa24');
  }

  public function create()
  {
    return view('modul.aset_alih.kewpa24.create', [
      'infokewpa21' => InfoKewpa21::all(),
    ]);
  }

  public function show(Kewpa24 $kewpa24)
  {
    return view('modul.aset_alih.kewpa24.edit', [
      'infokewpa21' => InfoKewpa21::all(),
      'kewpa24' => $kewpa24
    ]);
  }

  public function update(Request $request, Kewpa24 $kewpa24)
  {

    $kewpa24->update($request->all());
    return redirect('/kewpa24');
  }

  public function destroy(Kewpa24 $kewpa24)
  {
    InfoKewpa24::where('kewpa24_id', $kewpa24->id)->delete();
    $kewpa24->delete();

    return redirect('/kewpa24');
  }

  public function generatePdf(Kewpa24 $kewpa24)
  {


    $response = Http::post('https://libreoffice.prototype.com.my/cetak/kpa24', [$kewpa24]);

    $res = $response->getBody()->getContents();

    $url = "data:application/pdf;base64," . $res;

    $context = [
      "url" => $url,
      "title" => "kewpa24",
    ];

    return view('modul.borang_viewer_pa', $context);
  }
}
