<?php

namespace App\Http\Controllers;

use App\Models\InfoKewpa9;
use Illuminate\Http\Request;

class InfoKewpa9Controller extends Controller
{
     public function index()
    {
      return InfoKewpa9::all();
    }

    public function store(Request $request)
    {
      
      $info_kewpa9 = new InfoKewpa9;
      $info_kewpa9 -> info_kewpa9_id = $request-> info_kewpa9_id;
      $info_kewpa9 -> tarikh_dipinjam = $request-> tarikh_dipinjam;
      $info_kewpa9 -> tarikh_dijangka = $request-> tarikh_dijangka;
      $info_kewpa9 -> status = $request-> status;
      $info_kewpa9 -> tarikh_dipulangkan = $request-> tarikh_dipulangkan;
      $info_kewpa9 -> tarikh_diterima = $request-> tarikh_diterima;
      $info_kewpa9 -> catatan = $request-> catatan;
      $info_kewpa9 -> no_siri_pendaftaran = $request-> no_siri_pendaftaran;
      $info_kewpa9 -> kewpa9_id = $request-> kewpa9_id;
      $info_kewpa9 -> save();

      return $info_kewpa9;
    }

    public function show(InfoKewpa9 $info_kewpa9)
    {
      return $info_kewpa9;
    }

    public function update(Request $request, InfoKewpa9 $info_kewpa9)
    {

      $info_kewpa9 -> info_kewpa9_id = $request-> info_kewpa9_id;
      $info_kewpa9 -> tarikh_dipinjam = $request-> tarikh_dipinjam;
      $info_kewpa9 -> tarikh_dijangka = $request-> tarikh_dijangka;
      $info_kewpa9 -> status = $request-> status;
      $info_kewpa9 -> tarikh_dipulangkan = $request-> tarikh_dipulangkan;
      $info_kewpa9 -> tarikh_diterima = $request-> tarikh_diterima;
      $info_kewpa9 -> catatan = $request-> catatan;
      $info_kewpa9 -> no_siri_pendaftaran = $request-> no_siri_pendaftaran;
      $info_kewpa9 -> kewpa9_id = $request-> kewpa9_id;
      $info_kewpa9 -> save();

      return $info_kewpa9;

    }

    public function destroy(InfoKewpa9 $info_kewpa9)
    {
      return $info_kewpa9->delete();
    }



}
