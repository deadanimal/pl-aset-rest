<?php

namespace App\Http\Controllers;

use App\Models\Kewpa19;
use App\Models\Kewpa3A;
use App\Models\InfoKewpa19;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class Kewpa19Controller extends Controller
{
  public function index()
  {
    return view('modul.aset_alih.kewpa19.index', [
      'kewpa19' => Kewpa19::all(),
    ]);
  }

  public function store(Request $request)
  {
    $request['pegawai_pemeriksa1'] = Auth::user()->id;
    $kewpa19 = Kewpa19::create($request->all());
    for ($i = 0; $i < count($request->no_siri_pendaftaran); $i++) {
      InfoKewpa19::create([
        'butiran_penambahbaikan' => $request->butiran_penambahbaikan[$i],
        'laporan_pemeriksaan' => $request->laporan_pemeriksaan[$i],
        'no_siri_pendaftaran' => $request->no_siri_pendaftaran[$i],
        'kewpa19_id' => $kewpa19->id,
      ]);
    }
    return redirect('/kewpa19');
  }

  public function create()
  {
    return view('modul.aset_alih.kewpa19.create', [
      'kewpa3a' => Kewpa3A::all(),
    ]);
  }

  public function show(Kewpa19 $kewpa19)
  {
    return view('modul.aset_alih.kewpa19.edit', [
      'kewpa3a' => Kewpa3A::all(),
      'kewpa19' => $kewpa19,
    ]);
  }

  public function update(Request $request, Kewpa19 $kewpa19)
  {
    $kewpa19->update($request->all());
    return redirect('/kewpa19');
  }

  public function destroy(Kewpa19 $kewpa19)
  {
    InfoKewpa19::where('kewpa19_id', $kewpa19->id)->delete();
    $kewpa19->delete();

    return redirect('/kewpa19');
  }

  public function generatePdf(Kewpa19 $kewpa19)
  {

    $infoid = $kewpa19->infokewpa19->first()->no_siri_pendaftaran;

    $kewpa3a = Kewpa3A::where('no_siri_pendaftaran', $infoid)->first();

    $kewpa19['kod_nasional'] = $kewpa3a->kod_nasional;
    $kewpa19['status_aset'] = $kewpa3a->status_aset;
    $kewpa19['jenis'] = $kewpa3a->jenis;
    $kewpa19['no_kenderaan'] = $kewpa3a->no_pendaftaraan_kenderaan;
    $kewpa19['no_chasis'] = $kewpa3a->no_chasis;
    $kewpa19['no_enjin'] = $kewpa3a->no_enjin;
    $kewpa19['nilai_semasa'] = $kewpa3a->nilai_semasa;
    $kewpa19['tarikh_perolehan'] = $kewpa3a->tarikh_perolehan;
    $kewpa19['harga_perolehan_asal'] = $kewpa3a->harga_perolehan_asal;
    $kewpa19['usia_guna'] = $kewpa3a->usia_guna;


    $response = Http::post('https://libreoffice.prototype.com.my/cetak/kpa19', [$kewpa19]);

    $res = $response->getBody()->getContents();

    $url = "data:application/pdf;base64," . $res;

    $context = [
      "url" => $url,
      "title" => "kewpa19",
    ];

    return view('modul.borang_viewer_pa', $context);
  }
}
