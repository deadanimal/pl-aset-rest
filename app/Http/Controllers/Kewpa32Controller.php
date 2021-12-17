<?php

namespace App\Http\Controllers;

use App\Models\Kewpa32;
use App\Models\InfoKewpa21;
use App\Models\InfoKewpa32;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class Kewpa32Controller extends Controller
{
  public function index()
  {
    return view('modul.aset_alih.kewpa32.index', [
      'kewpa32' => Kewpa32::all()
    ]);
  }

  public function store(Request $request)
  {
    $kewpa32 = Kewpa32::create($request->all());
    for ($i = 0; $i < count($request->kewpa21_id); $i++) {
      InfoKewpa32::create([
        'agensi' => $request->agensi[$i],
        'kuantiti' => $request->kuantiti[$i],
        'nilai_perolehan' => $request->nilai_perolehan[$i],
        'kaedahA' => $request->kaedahA[$i],
        'kaedahB' => $request->kaedahB[$i],
        'kaedahC' => $request->kaedahC[$i],
        'kaedahD' => $request->kaedahD[$i],
        'kaedahE' => $request->kaedahE[$i],
        'kaedahF' => $request->kaedahF[$i],
        'kaedahG' => $request->kaedahG[$i],
        'kaedahH' => $request->kaedahH[$i],
        'kaedahI' => $request->kaedahI[$i],
        'kaedahJ' => $request->kaedahJ[$i],
        'nilai_semasa' => $request->nilai_semasa[$i],
        'hasil_pelupusan' => $request->hasil_pelupusan[$i],
        'kos_pengendalian' => $request->kos_pengendalian[$i],
        'kewpa21_id' => $request->kewpa21_id[$i],
        'kewpa32_id' => $kewpa32->id,
      ]);
    }

    return redirect('/kewpa32');
  }

  public function create()
  {
    return view('modul.aset_alih.kewpa32.create', [
      'kewpa21' => InfoKewpa21::all()
    ]);
  }

  public function show(Kewpa32 $kewpa32)
  {
    return view('modul.aset_alih.kewpa32.edit', [
      'kewpa21' => InfoKewpa21::all(),
      'kewpa32' => $kewpa32
    ]);
  }

  public function update(Request $request, Kewpa32 $kewpa32)
  {
    $kewpa32->update($request->all());
    return redirect('/kewpa32');
  }

  public function destroy(Kewpa32 $kewpa32)
  {
    InfoKewpa32::where('kewpa32_id', $kewpa32->id)->delete();
    $kewpa32->delete();
    return redirect('/kewpa32');
  }

  public function generatePdf(Kewpa32 $kewpa32)
  {

    $j1 = 0;
    $j2 = 0;
    $j3 = 0;
    $j4 = 0;
    $j5 = 0;
    $j6 = 0;
    $j7 = 0;
    $j8 = 0;
    $j9 = 0;
    $j10 = 0;
    $j11 = 0;
    $j12 = 0;
    $j13 = 0;
    $j14 = 0;
    $j15 = 0;

    foreach ($kewpa32->infokewpa32 as $ik) {
      $j1 = $j1 + (int)$ik->kuantiti;
      $j2 = $j2 + (int)$ik->nilai_perolehan;
      $j3 = $j3 + (int)$ik->kaedahA;
      $j4 = $j4 + (int)$ik->kaedahB;
      $j5 = $j5 + (int)$ik->kaedahC;
      $j6 = $j6 + (int)$ik->kaedahD;
      $j7 = $j7 + (int)$ik->kaedahE;
      $j8 = $j8 + (int)$ik->kaedahF;
      $j9 = $j9 + (int)$ik->kaedahG;
      $j10 = $j10 + (int)$ik->kaedahH;
      $j11 = $j11 + (int)$ik->kaedahI;
      $j12 = $j12 + (int)$ik->kaedahJ;
      $j13 = $j13 + (int)$ik->nilai_semasa;
      $j14 = $j14 + (int)$ik->hasil_pelupusan;
      $j15 = $j15 + (int)$ik->kos_pengendalian;
    }

    $kewpa32['j1'] = $j1;
    $kewpa32['j2'] = $j2;
    $kewpa32['j3'] = $j3;
    $kewpa32['j4'] = $j4;
    $kewpa32['j5'] = $j5;
    $kewpa32['j6'] = $j6;
    $kewpa32['j7'] = $j7;
    $kewpa32['j8'] = $j8;
    $kewpa32['j9'] = $j9;
    $kewpa32['j10'] = $j10;
    $kewpa32['j11'] = $j11;
    $kewpa32['j12'] = $j12;
    $kewpa32['j13'] = $j13;
    $kewpa32['j14'] = $j14;
    $kewpa32['j15'] = $j15;

    $response = Http::post('https://libreoffice.prototype.com.my/cetak/kpa32', [$kewpa32]);

    $res = $response->getBody()->getContents();

    $url = "data:application/pdf;base64," . $res;

    $context = [
      "url" => $url,
      "title" => "kewpa32",
    ];

    return view('modul.borang_viewer_pa', $context);
  }
}
