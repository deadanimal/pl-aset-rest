<?php

namespace App\Http\Controllers;

use App\Models\Kewpa8;
use App\Models\Kewpa3A;
use Illuminate\Http\Request;
use App\Models\KodJabatan;
use Illuminate\Support\Facades\Http;

class Kewpa8Controller extends Controller
{
    public function index()
    {
      $context = [
        "filter" => "off",
        "kod_jabatans" => KodJabatan::all()
      ];
      return view('modul.aset_alih.kewpa8.index', $context);

    }

    public function store(Request $request)
    {
      $kewpa8 = new Kewpa8;
      $kewpa8 -> kewpa8_id = $request->kewpa8_id;
      $kewpa8 -> tahun = $request->tahun;
      $kewpa8 -> staff_id = $request->staff_id;
      $kewpa8 -> save();

      return $kewpa8;

      
    }

    public function show(Kewpa8 $kewpa8)
    {
      return $kewpa8;
    }

    public function update(Request $request, $unused)
    {
      $tahun = $request->tahun;
      $jabatan = $request->jabatan;
      $jenis_aset = ['Harta Modal', 'Aset Bernilai Rendah'];

      $context= (object)[];

      foreach($jenis_aset as $jenis) {

        if ($jenis == 'Harta Modal') {
          $key = "harta_modal";
        } else {
          $key = "aset_bernilai_rendah";
        }

        $kewpa3A = Kewpa3A::where('jenis_aset', $jenis)->where('bahagian', $jabatan)->get();

        $context->$key = (object)[];
        $context->$key->kuantiti = count($kewpa3A);
        $context->$key->nilai_perolehan_asal = $kewpa3A->sum('harga_perolehan_asal');
        $context->$key->nilai_semasa = $kewpa3A->sum('nilai_semasa');

      }

      //compute total
      
      $kewpa3A = Kewpa3A::all();
      $context->total = (object)[];
      $context->total->kuantiti = count($kewpa3A);
      $context->total->nilai_perolehan_asal = $kewpa3A->sum('harga_perolehan_asal');
      $context->total->nilai_semasa = $kewpa3A->sum('nilai_semasa');

      //extra data
      $context->tahun = $tahun;
      $context->jabatan = $jabatan;

      $response = Http::post('https://libreoffice.prototype.com.my/cetak/kpa8', [$context]);

      $res = $response->getBody()->getContents();
      $url = "data:application/pdf;base64,".$res;

      $context = [
        "url" => $url,
        "title" => "Kewpa8",
      ];

      return view('modul.borang_viewer_pa', $context);


    }

    public function destroy(Kewpa8 $kewpa8)
    {
      return $kewpa8->delete();
    }

    public function generatePdf($tahun, $jabatan) {
      $jenis_aset = ['Harta Modal', 'Aset Bernilai Rendah'];

      $context= (object)[];

      foreach($jenis_aset as $jenis) {

        if ($jenis == 'Harta Modal') {
          $key = "harta_modal";
        } else {
          $key = "aset_bernilai_rendah";
        }

        $kewpa3A = Kewpa3A::where('jenis_aset', $jenis)->where('bahagian', $jabatan)->get();

        $context->$key = (object)[];
        $context->$key->kuantiti = count($kewpa3A);
        $context->$key->nilai_perolehan_asal = $kewpa3A->sum('harga_perolehan_asal');
        $context->$key->nilai_semasa = $kewpa3A->sum('nilai_semasa');

      }

      //compute total
      
      $kewpa3A = Kewpa3A::all();
      $context->total = (object)[];
      $context->total->kuantiti = count($kewpa3A);
      $context->total->nilai_perolehan_asal = $kewpa3A->sum('harga_perolehan_asal');
      $context->total->nilai_semasa = $kewpa3A->sum('nilai_semasa');

      $response = Http::post('https://libreoffice.prototype.com.my/cetak/kpa8', [$context]);

      $res = $response->getBody()->getContents();
      dd($res);
      $url = "data:application/pdf;base64,".$res;

      $context = [
        "url" => $url,
        "title" => "Kewpa8",
      ];

      return view('modul.borang_viewer_pa', $context);



    }


}

