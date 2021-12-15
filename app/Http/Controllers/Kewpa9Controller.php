<?php

namespace App\Http\Controllers;

use App\Models\Kewpa9;
use App\Models\Kewpa3A;
use App\Models\InfoKewpa9;
use Illuminate\Http\Request;

class Kewpa9Controller extends Controller
{
    public function index()
    {
      $context = [
        "kewpa9" => Kewpa9::all(),
      ];

      return view('modul.aset_alih.kewpa9.index', $context);
    }

    public function store(Request $request)
    {
      $request['status'] = "DERAF";
      $kewpa9 = Kewpa9::create($request->all());
      $kewpa9->save();

      foreach (range(0, count($request->no_siri_pendaftaran) - 1) as $i) {

          $info_kewpa9 = new InfoKewpa9;
          $info_kewpa9->tarikh_dipinjam=$request->tarikh_dipinjam[$i];
          $info_kewpa9->tarikh_dijangka=$request->tarikh_dijangka[$i];
          $info_kewpa9->status=$request->status[$i];
          $info_kewpa9->tarikh_dipulangkan=$request->tarikh_dipulangkan[$i];
          $info_kewpa9->tarikh_diterima=$request->tarikh_diterima[$i];
          $info_kewpa9->catatan=$request->catatan[$i];
          $info_kewpa9->no_siri_pendaftaran=$request->no_siri_pendaftaran[$i];
          $info_kewpa9->kewpa9_id=$kewpa9->id;      
          $info_kewpa9->save();

        }

      return redirect('/kewpa9');

    }

    public function create(Request $request) {
      $context = [
        "kewpa3a" => Kewpa3A::all(),
      ];

      return view('modul.aset_alih.kewpa9.create', $context);
    }

    public function show(Kewpa9 $kewpa9)
    {
      return $kewpa9;
    }

    public function edit(Request $request, Kewpa9 $kewpa9) {

      $context = [
        "kewpa9" => $kewpa9
      ];

      \Session::put('kewpa9', $kewpa9);

      return view('modul.aset_alih.kewpa9.edit', $context);

    }


    public function update(Request $request, Kewpa9 $kewpa9)
    {
      $kewpa9->update($request->all());

      return redirect('/kewpa9/'.$kewpa9->id.'/edit');

    }

    public function destroy(Kewpa9 $kewpa9)
    {
      return $kewpa9->delete();
    }

}
