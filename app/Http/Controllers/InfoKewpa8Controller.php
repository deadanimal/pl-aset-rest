<?php

namespace App\Http\Controllers;

use App\Models\InfoKewpa8;
use Illuminate\Http\Request;

class InfoKewpa8Controller extends Controller
{
    public function index()
    {
      return InfoKewpa8::all();
    }

    public function store(Request $request)
    {
      
      $info_kewpa8 = new InfoKewpa8;
      $info_kewpa8 -> info_kewpa8 = $request->info_kewpa8;
      $info_kewpa8 -> agensi = $request->agensi;
      $info_kewpa8 -> kuantiti_harta_modal = $request->kuantiti_harta_modal;
      $info_kewpa8 -> nilai_perolehan_harta = $request->nilai_perolehan_harta;
      $info_kewpa8 -> nilai_semasa_harta = $request->nilai_semasa_harta;
      $info_kewpa8 -> kuantiti_aset_alih = $request->kuantiti_aset_alih;
      $info_kewpa8 -> nilai_perolehan_aset = $request->nilai_perolehan_aset;
      $info_kewpa8 -> nilai_semasa_aset = $request->nilai_semasa_aset;
      $info_kewpa8 -> jumlah_kuantiti = $request->jumlah_kuantiti;
      $info_kewpa8 -> jumlah_nilai_perolehan = $request->jumlah_nilai_perolehan;
      $info_kewpa8 -> jumlah_nilai_semasa = $request->jumlah_nilai_semasa;
      $info_kewpa8 -> no_siri_pendaftaran = $request->no_siri_pendaftaran;
      $info_kewpa8 -> kewpa8_id = $request->kewpa8_id;


      $info_kewpa8 -> save();

      return $info_kewpa8;
    }

    public function show(InfoKewpa8 $info_kewpa8)
    {
      return $info_kewpa8;
    }

    public function update(Request $request, InfoKewpa8 $info_kewpa8)
    {

      $info_kewpa8 -> info_kewpa8 = $request->info_kewpa8;
      $info_kewpa8 -> agensi = $request->agensi;
      $info_kewpa8 -> kuantiti_harta_modal = $request->kuantiti_harta_modal;
      $info_kewpa8 -> nilai_perolehan_harta = $request->nilai_perolehan_harta;
      $info_kewpa8 -> nilai_semasa_harta = $request->nilai_semasa_harta;
      $info_kewpa8 -> kuantiti_aset_alih = $request->kuantiti_aset_alih;
      $info_kewpa8 -> nilai_perolehan_aset = $request->nilai_perolehan_aset;
      $info_kewpa8 -> nilai_semasa_aset = $request->nilai_semasa_aset;
      $info_kewpa8 -> jumlah_kuantiti = $request->jumlah_kuantiti;
      $info_kewpa8 -> jumlah_nilai_perolehan = $request->jumlah_nilai_perolehan;
      $info_kewpa8 -> jumlah_nilai_semasa = $request->jumlah_nilai_semasa;
      $info_kewpa8 -> no_siri_pendaftaran = $request->no_siri_pendaftaran;
      $info_kewpa8 -> kewpa8_id = $request->kewpa8_id;


      $info_kewpa8 -> save();

      return $info_kewpa8;

    }

    public function destroy(InfoKewpa8 $info_kewpa8)
    {
      return $info_kewpa8->delete();
    }



}
