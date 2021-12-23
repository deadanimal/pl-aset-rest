<?php

namespace App\Http\Controllers;

use App\Models\Kewpa18;
use App\Models\InfoKewpa18;
use App\Models\Kewpa17;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class Kewpa18Controller extends Controller
{
  public function index()
  {
    return view('modul.aset_alih.kewpa18.index', [
      'kewpa18' => Kewpa18::all(),
    ]);
  }

  public function store(Request $request)
  {
    $kewps18 = Kewpa18::create($request->all());

    for ($i = 0; $i < count($request->kewpa17_id); $i++) {
      InfoKewpa18::create([
        'agensi' => $request->agensi[$i],
        'kuantiti_terimaan' => $request->kuantiti_terimaan[$i],
        'jumlah_perolehan_terimaan' => $request->jumlah_perolehan_terimaan[$i],
        'jumlah_nilai_semasa_terimaan' => $request->jumlah_nilai_semasa_terimaan[$i],
        'kuantiti_pengeluaran' => $request->kuantiti_pengeluaran[$i],
        'jumlah_perolehan_pengeluaran' => $request->jumlah_perolehan_pengeluaran[$i],
        'jumlah_nilai_semasa_pengeluaran' => $request->jumlah_nilai_semasa_pengeluaran[$i],
        'kewpa17_id' => $request->kewpa17_id[$i],
        'kewpa18_id' => $kewps18->id,
      ]);
    }
    return redirect('/kewpa18');
  }

  public function create()
  {
    return view('modul.aset_alih.kewpa18.create', [
      'kewpa18' => Kewpa18::all(),
      'kewpa17' => Kewpa17::all()
    ]);
  }

  public function show(Kewpa18 $kewpa18)
  {
    return view('modul.aset_alih.kewpa18.edit', [
      'kewpa18' => Kewpa18::all(),
      'kewpa18' => $kewpa18,
    ]);
  }

  public function update(Request $request, Kewpa18 $kewpa18)
  {
    $kewpa18->update($request->all());

    foreach (range(0, count($request->kewps3a_id) - 1) as $i) {
      InfoKewpa18::where('id', $request->info_k18)->update([
        'agensi' => $request->agensi[$i],
        'kuantiti_terimaan' => $request->kuantiti_terimaan[$i],
        'jumlah_perolehan_terimaan' => $request->jumlah_perolehan_terimaan[$i],
        'jumlah_nilai_semasa_terimaan' => $request->jumlah_nilai_semasa_terimaan[$i],
        'kuantiti_pengeluaran' => $request->kuantiti_pengeluaran[$i],
        'jumlah_perolehan_pengeluaran' => $request->jumlah_perolehan_pengeluaran[$i],
        'jumlah_nilai_semasa_pengeluaran' => $request->jumlah_nilai_semasa_pengeluaran[$i],
        'kewpa18_id' => $request->kewpa18_id[$i],
      ]);
    }

    return redirect('/kewps18');
  }

  public function destroy(Kewpa18 $kewpa18)
  {
    InfoKewpa18::where('kewpa18_id', $kewpa18->id)->delete();
    $kewpa18->delete();
    return redirect('/kewpa18');
  }

  public function generatePdf(Kewpa18 $kewpa18)
  {
    $kewpa18['j1'] = 0;
    $kewpa18['j2'] = 0;
    $kewpa18['j3'] = 0;
    $kewpa18['j4'] = 0;
    $kewpa18['j5'] = 0;
    $kewpa18['j6'] = 0;
    foreach ($kewpa18->infokewpa18 as $ik18) {
      $kewpa18->j1 = $kewpa18->j1 + $ik18->kuantiti_terimaan;
      $kewpa18->j2 = $kewpa18->j2 + $ik18->jumlah_perolehan_terimaan;
      $kewpa18->j3 = $kewpa18->j3 + $ik18->jumlah_nilai_semasa_terimaan;
      $kewpa18->j4 = $kewpa18->j4 + $ik18->kuantiti_pengeluaran;
      $kewpa18->j5 = $kewpa18->j5 + $ik18->jumlah_perolehan_pengeluaran;
      $kewpa18->j6 = $kewpa18->j6 + $ik18->jumlah_nilai_semasa_pengeluaran;
    }

    $response = Http::post('https://libreoffice.prototype.com.my/cetak/kpa18', [$kewpa18]);

    $res = $response->getBody()->getContents();

    $url = "data:application/pdf;base64," . $res;

    $context = [
      "url" => $url,
      "title" => "kewpa18",
    ];

    return view('modul.borang_viewer_pa', $context);
  }
}
