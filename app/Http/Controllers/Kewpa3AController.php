<?php

namespace App\Http\Controllers;

use App\Models\Kewpa1;
use App\Models\Kewpa3A;
use App\Models\KodLokasi;
use App\Models\KodJabatan;
use Illuminate\Http\Request;
use Exception;

class Kewpa3AController extends Controller
{
  public function index()
  {
    $context = [
      "kewpa3a" => Kewpa3A::all(),
      "kewpa1" => Kewpa1::all(),
      "lokasi" => KodLokasi::all(),
      "jabatan" => KodJabatan::all()
    ];

    return view('modul.aset_alih.kewpa3a.index', $context);
  }

  public function store(Request $request)
  {
      $no_sekarang = sprintf("%'.05d\n", count(Kewpa3A::all()) + 1);
      
      $tahun_ini = substr(date("Y"), -2);
      
      $no_siri_pendaftaran = array("PL", "KPES", "PA", "HI", $tahun_ini, $no_sekarang);
      $no_siri_pendaftaran = implode(" /",$no_siri_pendaftaran);
      $no_siri_pendaftaran = trim(preg_replace('/\s\s+/', ' ', $no_siri_pendaftaran));


      $request['no_siri_pendaftaran'] = $no_siri_pendaftaran;
      $request['status'] = "DERAF";

      Kewpa3A::create($request->all());

      return redirect('/kewpa3a');

  }

  public function show(Kewpa3A $kewpa3a)
  {
    // $kewpa3as->update($request->all());
    return redirect('/kewpa3a');
  }

  public function edit(Request $request, Kewpa3A $kewpa3a)
  {
    $context = [
      "kewpa3a" => $kewpa3a,
      "kewpa1" => Kewpa1::all(),
      "lokasi" => KodLokasi::all(),
      "jabatan" => KodJabatan::all()

    ];
    return view('modul.aset_alih.kewpa3a.create', $context);
  }



  public function update(Request $request, Kewpa3A $kewpa3a)
  {
    $kewpa3a->update($request->all());
    return redirect('/kewpa3a');
  }

  public function destroy(Kewpa3A $kewpa3a)
  {
    return $kewpa3a->delete();
  }
}
