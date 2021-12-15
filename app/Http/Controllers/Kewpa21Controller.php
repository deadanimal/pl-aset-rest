<?php

namespace App\Http\Controllers;

use App\Models\InfoKewpa21;
use App\Models\Kewpa21;
use App\Models\Kewpa3A;
use Illuminate\Http\Request;

class Kewpa21Controller extends Controller
{
  public function index()
  {
    return view('modul.aset_alih.kewpa21.index', [
      'kewpa21' => Kewpa21::all()
    ]);
  }

  public function store(Request $request)
  {
    $kewpa21 =  Kewpa21::create($request->all());

    for ($i = 0; $i < count($request->no_siri_pendaftaran); $i++) {
      InfoKewpa21::create([
        'keadaan_aset' => $request->keadaan_aset[$i],
        'kaedah_pelupusan' => $request->kaedah_pelupusan[$i],
        'justifikasi' => $request->justifikasi[$i],
        'keputusan_melulus' => $request->keputusan_melulus[$i],
        'catatan' => $request->catatan[$i],
        'no_siri_pendaftaran' => $request->no_siri_pendaftaran[$i],
        'kewpa21_id' => $kewpa21->id,
      ]);
    }

    return redirect('/kewpa21');
  }

  public function create()
  {
    return view('modul.aset_alih.kewpa21.create', [
      'kewpa3a' => Kewpa3A::all(),
    ]);
  }

  public function show(Kewpa21 $kewpa21)
  {
    return view('modul.aset_alih.kewpa21.edit', [
      'kewpa3a' => Kewpa3A::all(),
      'kewpa21' => $kewpa21,
    ]);
  }

  public function update(Request $request, Kewpa21 $kewpa21)
  {

    $kewpa21->update($request->all());

    return redirect('/kewpa21');
  }

  public function destroy(Kewpa21 $kewpa21)
  {
    InfoKewpa21::where('kewpa21_id', $kewpa21->id)->delete();
    $kewpa21->delete();
  }
}
