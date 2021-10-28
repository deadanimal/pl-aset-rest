<?php

namespace App\Http\Controllers;

use App\Models\Kewatk7;
use App\Models\InfoKewatk7;
use Illuminate\Http\Request;

class InfoKewatk7Controller extends Controller
{
    public function index()
    {
      return InfoKewatk7::all();
    }

    public function store(Request $request)
    {
      $info_kewatk7 = new InfoKewatk7;
      $info_kewatk7->tarikh_dipinjam=$request->tarikh_dipinjam;
      $info_kewatk7->tarikh_pulang=$request->tarikh_pulang;
      $info_kewatk7->status="DERAF";
      $info_kewatk7->tarikh_dipulangkan=$request->tarikh_dipulangkan;
      $info_kewatk7->tarikh_diterima=$request->tarikh_diterima;
      $info_kewatk7->catatan=$request->catatan;
      $info_kewatk7->no_siri_pendaftaran=$request->no_siri_pendaftaran;
      $info_kewatk7->no_permohonan_atk7=$request->no_permohonan_atk7;
      $info_kewatk7 -> save();


      return $info_kewatk7;

      
    }

    public function show(Kewatk7 $kewatk7)
    {
      $info_kewatk7 = InfoKewatk7::where('no_permohonan_atk7', $kewatk7->id)->get();
      return $info_kewatk7;
    }

    public function update(Request $request, InfoKewatk7 $info_kewatk7)
    {
      $info_kewatk7->tarikh_dipinjam=$request->tarikh_dipinjam;
      $info_kewatk7->tarikh_pulang=$request->tarikh_pulang;
      $info_kewatk7->status=$request->status;
      $info_kewatk7->tarikh_dipulangkan=$request->tarikh_dipulangkan;
      $info_kewatk7->tarikh_diterima=$request->tarikh_diterima;
      $info_kewatk7->catatan=$request->catatan;
      $info_kewatk7->no_siri_pendaftaran=$request->no_siri_pendaftaran;
      $info_kewatk7->no_permohonan_atk7=$request->no_permohonan_atk7;

      $info_kewatk7 -> save();


      return $info_kewatk7;


    }

    public function destroy(InfoKewatk7 $info_kewatk7)
    {
      return $info_kewatk7->delete();
    }
}
