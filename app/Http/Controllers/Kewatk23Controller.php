<?php

namespace App\Http\Controllers;

use App\Models\Kewatk23;
use App\Models\Kewatk3a;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class Kewatk23Controller extends Controller
{
    public function index()
    {

      $kewatk3a = Kewatk3a::all();
      $kewatk23 = Kewatk23::all();

      $context = [
        "kewatk3a" => $kewatk3a,
        "kewatk23" => $kewatk23,
      ];

      return view('modul.aset_tak_ketara.kewatk23.index', $context);


    }


    public function store(Request $request)
    {
      $kewatk23 = new Kewatk23;
      $kewatk23->tempat_kehilangan=$request->tempat_kehilangan;
      $kewatk23->tarikh_kehilangan=$request->tarikh_kehilangan;
      $kewatk23->cara_kehilangan=$request->cara_kehilangan;
      $kewatk23->no_rujukan_polis=$request->no_rujukan_polis;
      $kewatk23->tarikh_polis=$request->tarikh_polis;
      $kewatk23->langkah_sedia_ada=$request->langkah_sedia_ada;
      $kewatk23->langkah_segera=$request->langkah_segera;
      #$kewatk23->dokumen_sokongan=$request->dokumen_sokongan;
      #$kewatk23->gambar=$request->gambar;
      $kewatk23->catatan=$request->catatan;
      $kewatk23->no_siri_pendaftaran=$request->no_siri_pendaftaran;
      $kewatk23->save();

      return redirect('/kewatk23');
    }

    public function show(Kewatk23 $kewatk23)
    {

      return $kewatk23;
    }


    public function update(Request $request, Kewatk23 $kewatk23)
    {

      $kewatk23->tempat_kehilangan=$request->tempat_kehilangan;
      $kewatk23->tarikh_kehilangan=$request->tarikh_kehilangan;
      $kewatk23->cara_kehilangan=$request->cara_kehilangan;
      $kewatk23->no_rujukan_polis=$request->no_rujukan_polis;
      $kewatk23->tarikh_polis=$request->tarikh_polis;
      $kewatk23->langkah_sedia_ada=$request->langkah_sedia_ada;
      $kewatk23->langkah_segera=$request->langkah_segera;
      #$kewatk23->dokumen_sokongan=$request->dokumen_sokongan;
      #$kewatk23->gambar=$request->gambar;
      $kewatk23->catatan=$request->catatan;
      $kewatk23->no_siri_pendaftaran=$request->no_siri_pendaftaran;
      $kewatk23->save();

      return redirect('/kewatk23');

    }

    public function destroy(Kewatk23 $kewatk23)
    {

      return $kewatk23->delete();
    }

    public function generatePdf(Request $request, Kewatk23 $kewatk23) {
      # TO DO : add logic to group the data by quarter 

      $data = Kewatk23::
      join('kewatk3as','kewatk23s.no_siri_pendaftaran', '=', 'kewatk3as.no_siri_pendaftaran')
      ->where('kewatk23s.id', $kewatk23->id)
      ->select('kewatk3as.*', 'kewatk23s.*')
      ->first();

      //additional information
      $data->pelapor = "created_by";
      $data->pelapor = "jawatan";

      $response = Http::post('https://libreoffice.prototype.com.my/cetak/atk23', [$data]);

      $res = $response->getBody()->getContents();
      $url = "data:application/pdf;base64,".$res;

      $context = [
        "url" => $url,
        "title" => "Kewatk23",
      ];

      return view('modul.borang_viewer_atk', $context);


    }


}
