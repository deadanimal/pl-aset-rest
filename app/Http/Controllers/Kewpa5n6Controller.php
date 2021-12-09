<?php

namespace App\Http\Controllers;


use App\Models\Kewpa5n6;
use App\Models\Kewpa3B;
use App\Models\Kewpa3A;
use Illuminate\Http\Request;

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
      if ($kewpa5n6 == "modal") {
        // todo 
        // add filter here (modal)
        $temp = Kewpa3A::all();

        $kewpa5n6 = [];
        foreach($temp as $t) {

          $obj = new \stdClass();
          $obj->no_siri_pendaftaran = $t->no_siri_pendaftaran;
          $obj->cara_aset_diperolehi = "NA";
          $obj->status_aset = "NA";
          $obj->jumlah_nilai_semasa = $t->nilai_semasa;
          $obj->jumlah_perolehan = $t->harga_perolehan_asal;

          array_push($kewpa5n6, $obj);

        }

      }

      else {
        // todo
        // add filter here (harta)

        $kewpa5n6 = [];
        $temp = Kewpa3A::all();
        foreach($temp as $t) {

          $obj = new \stdClass();
          $obj->no_siri_pendaftaran = $t->no_siri_pendaftaran;
          $obj->cara_aset_diperolehi = "NA";
          $obj->status_aset = "NA";
          $obj->jumlah_nilai_semasa = $t->nilai_semasa;
          $obj->jumlah_perolehan = $t->harga_perolehan_asal;

          array_push($kewpa5n6, $obj);

        }

      }


      $context = [
        "kewpa5n6" => $kewpa5n6,
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

}
