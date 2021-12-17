<?php

namespace App\Http\Controllers;

use App\Models\Kewpa21;
use App\Models\Kewpa3A;
use App\Models\InfoKewpa21;
use App\Models\KaedahPelupusan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class Kewpa21Controller extends Controller
{
  public function index()
  {
    return view('modul.aset_alih.kewpa21.index', [
      'kewpa21' => Kewpa21::all()
    ]);
  }

  public function store(Request $request)
  {
    $kewpa21 =  Kewpa21::create($request->all());

    for ($i = 0; $i < count($request->no_siri_pendaftaran); $i++) {
      InfoKewpa21::create([
        'keadaan_aset' => $request->keadaan_aset[$i],
        'kaedah_pelupusan' => $request->kaedah_pelupusan[$i],
        'justifikasi' => $request->justifikasi[$i],
        'keputusan_melulus' => $request->keputusan_melulus[$i],
        'catatan' => $request->catatan[$i],
        'no_siri_pendaftaran' => $request->no_siri_pendaftaran[$i],
        'kewpa21_id' => $kewpa21->id,
      ]);
    }

    return redirect('/kewpa21');
  }

  public function create()
  {
    return view('modul.aset_alih.kewpa21.create', [
      'kewpa3a' => Kewpa3A::all(),
      'kaedah_pelupusan' => KaedahPelupusan::all()
    ]);
  }

  public function show(Kewpa21 $kewpa21)
  {
    return view('modul.aset_alih.kewpa21.edit', [
      'kaedah_pelupusan' => KaedahPelupusan::all(),
      'kewpa3a' => Kewpa3A::all(),
      'kewpa21' => $kewpa21,
    ]);
  }

  public function update(Request $request, Kewpa21 $kewpa21)
  {

    $kewpa21->update($request->all());

    return redirect('/kewpa21');
  }

  public function destroy(Kewpa21 $kewpa21)
  {
    InfoKewpa21::where('kewpa21_id', $kewpa21->id)->delete();
    $kewpa21->delete();

    return redirect('/kewpa21');
  }

  public function generatePdf(Kewpa21 $kewpa21)
  {

    $kewpa21['kewpa3a'] = $kewpa21->infokewpa21->first()->kewpa3a;

    $j_harga_perolehan = 0;
    $j_nilai_semasa = 0;
    foreach ($kewpa21->infokewpa21 as $ik) {
      $j_harga_perolehan = $j_harga_perolehan + (int)$ik->kewpa3a->harga_perolehan_asal;
      $j_nilai_semasa = $j_nilai_semasa + (int)$ik->kewpa3a->nilai_semasa;
    }


    $kewpa21['j_harga_perolehan'] = $j_harga_perolehan;
    $kewpa21['j_nilai_semasa'] = $j_nilai_semasa;

    $response = Http::post('https://libreoffice.prototype.com.my/cetak/kpa21', [$kewpa21]);

    $res = $response->getBody()->getContents();

    $url = "data:application/pdf;base64," . $res;

    $context = [
      "url" => $url,
      "title" => "kewpa21",
    ];

    return view('modul.borang_viewer_pa', $context);
  }
}
