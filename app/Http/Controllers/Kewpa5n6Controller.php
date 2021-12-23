<?php

namespace App\Http\Controllers;


use App\Models\Kewpa5n6; 
use App\Models\Kewpa3B; 
use App\Models\Kewpa3A;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class Kewpa5n6Controller extends Controller
{
    public function index()
    {
      return Kewpa5n6::all();
    }

    public function store(Request $request)
    {
      
      $kewpa5n6 = new Kewpa5n6;
      $kewpa5n6 -> kewpa5n6 = $request->kewpa5n6;
      $kewpa5n6 -> kos = $request-> kos;
      $kewpa5n6 -> tempoh_jaminan = $request->tempoh_jaminan;
      $kewpa5n6 -> status = $request->status;
      $kewpa5n6 -> tarikh_dipasang = $request->tarikh_dipasang;
      $kewpa5n6 -> tarikh_dikeluarkan = $request->tarikh_dikeluarkan;
      $kewpa5n6 -> tarikh_dilupus_hapus = $request->tarikh_dilupus_hapus;
      $kewpa5n6 -> catatan = $request->catatan;
      $kewpa5n6 -> pegawai_bertanggungjawab = $request->pegawai_bertanggungjawab;
      $kewpa5n6 -> no_siri_pendaftaran = $request->no_siri_pendaftaran;
      $kewpa5n6 -> save();

      return $kewpa5n6;
    }

    public function show($kewpa5n6)
    {

      $title = "";

      if ($kewpa5n6 == "modal") {
        $title = "kewpa5";
        $kewpa5n6 = Kewpa3A::where('jenis_aset', 'Harta Modal')->get();
      }

      else {

        $title = "kewpa6";

        $kewpa5n6 = Kewpa3A::where('jenis_aset', 'Aset Bernilai Rendah')->get();

      }


      // set session for current page
      \Session::put('title', $title);


      $context = [
        "kewpa5n6" => $kewpa5n6,
        "title" => $title
      ];

      return view('modul.aset_alih.kewpa5n6.index', $context);

    }


    public function update(Request $request, Kewpa5n6 $kewpa5n6)
    {
      $kewpa5n6 -> kewpa5n6 = $request->kewpa5n6;
      $kewpa5n6 -> kos = $request-> kos;
      $kewpa5n6 -> tempoh_jaminan = $request->tempoh_jaminan;
      $kewpa5n6 -> status = $request->status;
      $kewpa5n6 -> tarikh_dipasang = $request->tarikh_dipasang;
      $kewpa5n6 -> tarikh_dikeluarkan = $request->tarikh_dikeluarkan;
      $kewpa5n6 -> tarikh_dilupus_hapus = $request->tarikh_dilupus_hapus;
      $kewpa5n6 -> catatan = $request->catatan;
      $kewpa5n6 -> pegawai_bertanggungjawab = $request->pegawai_bertanggungjawab;
      $kewpa5n6 -> no_siri_pendaftaran = $request->no_siri_pendaftaran;
      $kewpa5n6 -> save();

      return $kewpa5n6;

    }

    public function destroy(Kewpa5n6 $kewpa5n6)
    {
      return $kewpa5n6->delete();
    }

    public function generatePdf() {
      $mode = \Session::get('title');

      $context =(object)[];

      if ($mode == "kewpa5") {
        $filterField = "Harta Modal";
        $context->jenis_aset = "HARTA MODAL";
        $context->jenis_borang = "5";

      } else {
        $filterField = "Aset Bernilai Rendah";
        $context->jenis_aset = "ASET ALIH BERNILAI RENDAH";
        $context->jenis_borang = "6";
      }

      $context->kewpa5n6 = Kewpa3A::where('jenis_aset', $filterField)->get();


      $context->jenis = (object)[];
      $context->jenis->harga_perolehan_asal = $context->kewpa5n6->sum('harga_perolehan_asal');
      $context->jenis->nilai_semasa = $context->kewpa5n6->sum('nilai_semasa');

      $kewpa5n6_all = Kewpa3A::all();
      $context->total = (object)[];
      $context->total->harga_perolehan_asal = $kewpa5n6_all->sum('harga_perolehan_asal');
      $context->total->nilai_semasa = $kewpa5n6_all->sum('nilai_semasa');


      $response = Http::post('https://libreoffice.prototype.com.my/cetak/kpa5n6', [$context]);

      $res = $response->getBody()->getContents();
      $url = "data:application/pdf;base64,".$res;

      $context = [
        "url" => $url,
        "title" => $mode,
      ];

      return view('modul.borang_viewer_pa', $context);



    }


}
