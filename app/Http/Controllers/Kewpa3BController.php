<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kewpa3B;

class Kewpa3BController extends Controller
{
    public function index()
    {
      return Kewpa3B::all();
    }

    public function store(Request $request)
    {
      
      $kewpa3b = new Kewpa3B;

      $kewpa3b -> kewpa4_id = $request-> kewpa4_id;
      $kewpa3b -> kos = $request-> kos;
      $kewpa3b -> tempoh_jaminan = $request-> tempoh_jaminan;
      $kewpa3b -> status = $request-> status;
      $kewpa3b -> tarikh_dipasang = $request-> tarikh_dipasang;
      $kewpa3b -> tarikh_dikeluarkan = $request-> tarikh_dikeluarkan;
      $kewpa3b -> tarikh_dilupus_hapus = $request-> tarikh_dilupus_hapus;
      $kewpa3b -> catatan = $request-> catatan;
      $kewpa3b -> pegawai_bertanggungjawab = $request-> pegawai_bertanggungjawab;
      $kewpa3b -> no_siri_pendaftaran = $request-> no_siri_pendaftaran;

      $kewpa3b -> save();

      return $kewpa3b;
    }

    public function show(Kewpa3B $kewpa3b)
    {
      return $kewpa3b;
    }

    public function update(Request $request, Kewpa3B $kewpa3b)
    {
      $kewpa3b -> kewpa4_id = $request-> kewpa4_id;
      $kewpa3b -> kos = $request-> kos;
      $kewpa3b -> tempoh_jaminan = $request-> tempoh_jaminan;
      $kewpa3b -> status = $request-> status;
      $kewpa3b -> tarikh_dipasang = $request-> tarikh_dipasang;
      $kewpa3b -> tarikh_dikeluarkan = $request-> tarikh_dikeluarkan;
      $kewpa3b -> tarikh_dilupus_hapus = $request-> tarikh_dilupus_hapus;
      $kewpa3b -> catatan = $request-> catatan;
      $kewpa3b -> pegawai_bertanggungjawab = $request-> pegawai_bertanggungjawab;
      $kewpa3b -> no_siri_pendaftaran = $request-> no_siri_pendaftaran;

      $kewpa3b -> save();



      return $kewpa3b;

    }

    public function destroy(Kewpa3B $kewpa3b)
    {
      return $kewpa3b->delete();
    }

}
