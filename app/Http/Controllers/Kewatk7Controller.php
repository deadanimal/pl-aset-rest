<?php

namespace App\Http\Controllers;

use App\Models\Kewatk7;
use App\Models\InfoKewatk7;
use App\Models\Kewatk3a;
use App\Models\KodLokasi;
use App\Models\User;
use Illuminate\Support\Facades\Http;
use PDF;

use Illuminate\Http\Request;

class Kewatk7Controller extends Controller
{
    public function index()
    {

      $kewatk3a = Kewatk3a::all();
      $kewatk7 = Kewatk7::all();
      $kod_lokasis = KodLokasi::all();
      $pengeluar = User::all();

      $context = [
        "kewatk3a" => $kewatk3a,
        "kewatk7" => $kewatk7,
        "pengeluars" => $pengeluar,
        "kod_lokasis" => $kod_lokasis
      ];

      return view('modul.aset_tak_ketara.kewatk7.index', $context);


    }


    public function store(Request $request)
    {
      $kewatk7 = new Kewatk7;
      $kewatk7->bahagian="Perbadanan Labuan";
      $kewatk7->tujuan=$request->tujuan;
      $kewatk7->pemohon=$request->user()->id;
      $kewatk7->pengeluar=$request->pengeluar;
      $kewatk7->pemulang=$request->pemulang;
      $kewatk7->pelulus=$request->pelulus;
      $kewatk7->kod_lokasi=$request->kod_lokasi;
      $kewatk7->penerima=$request->user()->id;
      $kewatk7->status="DERAF";
      $kewatk7->save();

      // handle byk aset dalam 1 borang pinjaman

      $jumlah_aset_dipinjam = count($request->no_siri_pendaftaran);

      foreach(range(0, $jumlah_aset_dipinjam -1) as $i) {
        $info_kewatk7 = new InfoKewatk7;
        $info_kewatk7->no_siri_pendaftaran = $request->no_siri_pendaftaran[$i]; 
        $info_kewatk7->tarikh_dipinjam=$request->tarikh_dipinjam[$i];
        $info_kewatk7->tarikh_pulang=$request->tarikh_pulang[$i];
        $info_kewatk7->catatan=$request->catatan[$i];

        $info_kewatk7->status="TIDAK LULUS";
        $info_kewatk7->no_permohonan_atk7=$kewatk7->id;

        $info_kewatk7->save();

      }

      return redirect('/kewatk7');

    }

    public function show(Kewatk7 $kewatk7)
    {

      $pengeluar = User::all();
      $kewatk3a = Kewatk3a::all();
      $kod_lokasis = KodLokasi::all();
      $pengeluar = User::all();


      $context = [
        "kewatk7" => $kewatk7,
        "pengeluars" => $pengeluar,
        "kewatk3a" => $kewatk3a,
        "kod_lokasis" => $kod_lokasis
      ];

      return view('modul.aset_tak_ketara.kewatk7.info_index', $context);


    }


    public function update(Request $request, Kewatk7 $kewatk7)
    {
      
      $kewatk7->update($request->all());

      return redirect('/kewatk7/'.$kewatk7->id);


    }

    public function destroy(Kewatk7 $kewatk7)
    {

      return $kewatk7->delete();
    }

    public function generatePdf(Request $request, Kewatk7 $kewatk7) {

      $response = Http::post('https://libreoffice.prototype.com.my/cetak/atk7', [$kewatk7]);

      $res = $response->getBody()->getContents();
      $url = "data:application/pdf;base64,".$res;

      $context = [
        "url" => $url,
        "title" => "Kewatk7"
      ];

      return view('modul.borang_viewer_atk', $context);


    }

}
