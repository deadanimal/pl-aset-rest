<?php

namespace App\Http\Controllers;

use App\Models\Kewatk3b;
use Illuminate\Http\Request;

class Kewatk3bController extends Controller
{
public function index()
    {
      return Kewatk3b::all();
    }

    public function store(Request $request)
    {
      $kewatk3b = new Kewatk3b;
      $kewatk3b->kos=$request->kos;
      $kewatk3b->nilai_semasa=$request->nilai_semasa;
      $kewatk3b->tempoh_jaminan=$request->tempoh_jaminan;
      $kewatk3b->status=$request->status;
      $kewatk3b->tarikh_dipasang=$request->tarikh_dipasang;
      $kewatk3b->tarikh_dikeluarkan=$request->tarikh_dikeluarkan;
      $kewatk3b->tarikh_dilupus_hapus=$request->tarikh_dilupus_hapus;
      $kewatk3b->catatan=$request->catatan;
      $kewatk3b->staff_id=$request->staff_id;
      $kewatk3b->no_siri_pendaftaran=$request->no_siri_pendaftaran;

      $kewatk3b -> save();


      return $kewatk3b;

      
    }

    public function show(Kewatk3b $kewatk3b)
    {
      return $kewatk3b;
    }

    public function update(Request $request, Kewatk3b $kewatk3b)
    {
      $kewatk3b->kos=$request->kos;
      $kewatk3b->nilai_semasa=$request->nilai_semasa;
      $kewatk3b->tempoh_jaminan=$request->tempoh_jaminan;
      $kewatk3b->status=$request->status;
      $kewatk3b->tarikh_dipasang=$request->tarikh_dipasang;
      $kewatk3b->tarikh_dikeluarkan=$request->tarikh_dikeluarkan;
      $kewatk3b->tarikh_dilupus_hapus=$request->tarikh_dilupus_hapus;
      $kewatk3b->catatan=$request->catatan;
      $kewatk3b->staff_id=$request->staff_id;
      $kewatk3b->no_siri_pendaftaran=$request->no_siri_pendaftaran;

      $kewatk3b -> save();



      return $kewatk3b;


    }

    public function destroy(Kewatk3b $kewatk3b)
    {
      return $kewatk3b->delete();
    }
}
