<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kewpa1;
use App\Models\User;
use App\Models\InfoKewpa1;

class Kewpa1Controller extends Controller
{
    public function index()
    {
      $kewpa1 = Kewpa1::all();

      $context = [
        "kewpa1" => $kewpa1
      ];

      return view('modul.aset_alih.kewpa1.index', $context);
    }

    public function store(Request $request)
    {
      
      $kewpa1 = Kewpa1::create($request->all());
      $kewpa1->status="DERAF";
      $kewpa1->pegawai_penerima=$request->user()->id;
      $kewpa1->save();

      foreach (range(0, count($request->keterangan_aset_alih) - 1) as $i) {

          $info_kewpa1 = new InfoKewpa1;
          $info_kewpa1->keterangan_aset_alih=$request->keterangan_aset_alih[$i];
          $info_kewpa1->kuantiti_dipesan=$request->kuantiti_dipesan[$i];
          $info_kewpa1->kuantiti_do=$request->kuantiti_do[$i];
          $info_kewpa1->kuantiti_diterima=$request->kuantiti_diterima[$i];
          $info_kewpa1->catatan=$request->catatan[$i];
          $info_kewpa1->no_kod=$request->no_kod[$i];
          $info_kewpa1->rujukan_kewpa1_id=$kewpa1->id;      
          $info_kewpa1->save();

        }

      return redirect('/kewpa1');


    }

    public function show(Kewpa1 $kewpa1)
    {
      //Link to infoKewpa1 index
      $info_kewpa1 = InfoKewpa1::where('rujukan_kewpa1_id', $kewpa1->id)->get();
      $context = [
        "info_kewpa1" => $info_kewpa1,
        "rujukan_kewpa1_id" => $kewpa1->id,
        "kewpa1" => $kewpa1

      ];
      return view('modul.aset_alih.kewpa1.info_kewpa1', $context);
    }

    public function update(Request $request, Kewpa1 $kewpa1)
    {

      $kewpa1->update($request->all());

      return redirect('/kewpa1/'.$kewpa1->id);

    }

    public function destroy(Kewpa1 $kewpa1)
    {
      $kewpa1->delete();
      return redirect('/kewpa1');

    }
}
