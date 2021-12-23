<?php

namespace App\Http\Controllers;

use App\Models\Kewpa33;
use App\Models\Kewpa37;
use App\Models\InfoKewpa37;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class Kewpa37Controller extends Controller
{
  public function index()
  {
    return view('modul.aset_alih.kewpa37.index', [
      'kewpa37' => Kewpa37::all()
    ]);
  }

  public function store(Request $request)
  {

    $kewpa37 = Kewpa37::create($request->all());
    for ($i = 0; $i < count($request->kewpa33_id); $i++) {
      InfoKewpa37::create([
        'agensi' => $request->agensi[$i],
        'kuantiti_hapus' => $request->kuantiti_hapus[$i],
        'nilai_perolehan_hapus' => $request->nilai_perolehan_hapus[$i],
        'nilai_semasa_hapus' => $request->nilai_semasa_hapus[$i],
        'kes_surcaj' => $request->kes_surcaj[$i],
        'nilai_surcaj' => $request->nilai_surcaj[$i],
        'kes_tatatertib' => $request->kes_tatatertib[$i],
        'kewpa33_id' => $request->kewpa33_id[$i],
        'kewpa37_id' => $kewpa37->id
      ]);
    }
    return redirect('/kewpa37');
  }

  public function create()
  {
    return view('modul.aset_alih.kewpa37.create', [
      'kewpa33' => Kewpa33::all()
    ]);
  }

  public function show(Kewpa37 $kewpa37)
  {
    return view('modul.aset_alih.kewpa37.edit', [
      'kewpa33' => Kewpa33::all(),
      'kewpa37' => $kewpa37
    ]);
  }

  public function update(Request $request, Kewpa37 $kewpa37)
  {

    $kewpa37->update($request->all());
    return redirect('/kewpa37');
  }

  public function destroy(Kewpa37 $kewpa37)
  {
    InfoKewpa37::where('kewpa37_id', $kewpa37->id)->delete();
    $kewpa37->delete();
    return redirect('/kewpa37');
  }

  public function generatePdf(Kewpa37 $kewpa37)
  {
    $response = Http::post('https://libreoffice.prototype.com.my/cetak/kpa37', [$kewpa37]);

    $res = $response->getBody()->getContents();

    $url = "data:application/pdf;base64," . $res;

    $context = [
      "url" => $url,
      "title" => "kewpa37",
    ];

    return view('modul.borang_viewer_pa', $context);
  }
}
