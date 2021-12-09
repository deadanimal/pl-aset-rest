<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kewpa2;
use App\Models\InfoKewpa2;
use App\Models\Kewpa1;

class Kewpa2Controller extends Controller
{
    public function index()
    {
      $kewpa1 = Kewpa1::all();
      $kewpa2 = Kewpa2::all();

      $context = [
        "kewpa1" => $kewpa1,
        "kewpa2" => $kewpa2,
        "kewpa1All" => $kewpa1,
      ];

      return view('modul.aset_alih.kewpa2.index', $context);

    }

    public function store(Request $request)
    {
      $request['status'] = 'DERAF';
      $request['pegawai_penerima'] = $request->user()->id;
      $kewpa2 = Kewpa2::create($request->all());


      foreach (range(0, count($request->info_kewpa1_id) - 1) as $i) {
        $info_kewpa2 = new InfoKewpa2;
        $info_kewpa2->info_kewpa1_id=$request->info_kewpa1_id[$i];
        $info_kewpa2->kuantiti_ditolak=$request->kuantiti_ditolak[$i];
        $info_kewpa2->kuantiti_kurang_lebih=$request->kuantiti_kurang_lebih[$i];
        $info_kewpa2->sebab_penolakan=$request->sebab_penolakan[$i];
        $info_kewpa2->catatan=$request->catatan[$i];
        $info_kewpa2->rujukan_kewpa1_id = $kewpa2->rujukan_kewpa1_id;
        $info_kewpa2->rujukan_kewpa2=$kewpa2->id;
        $info_kewpa2->save();
      }

      return redirect('/kewpa2/');

    }

    public function show(Kewpa2 $kewpa2)
    {
      $context = [
        "kewpa2" => $kewpa2,
        "kewpa1" => Kewpa1::all()
      ];
      return view('modul.aset_alih.kewpa2.info_kewpa2', $context);
    }


    public function update(Request $request, Kewpa2 $kewpa2)
    {

      $kewpa2 -> rujukan_kewpa2 = $request -> rujukan_kewpa2;
      $kewpa2 -> tindakan = $request -> tindakan;
      $kewpa2 -> pegawai_penerima = $request -> pegawai_penerima;
      $kewpa2 -> rujukan_kewpa1_id = $request -> rujukan_kewpa1_id;
      $kewpa2 -> save();

      return $kewpa2;

    }

    public function destroy(Kewpa2 $kewpa2)
    {
      return $kewpa2->delete();
    }


}
