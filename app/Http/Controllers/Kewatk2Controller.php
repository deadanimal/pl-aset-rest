<?php

namespace App\Http\Controllers;

use App\Models\InfoKewatk2;
use App\Models\InfoKewatk1;
use App\Models\Kewatk2;
use App\Models\Kewatk1;
use Illuminate\Http\Request;
use NcJoes\OfficeConverter\OfficeConverter;

class Kewatk2Controller extends Controller
{
    public function index()
    {

      $kewatk2 = Kewatk2::all();
      $kewatk1 = Kewatk1::all();

      $context = [
        "kewatk2" => $kewatk2,
        "kewatk1" => $kewatk1
      ];

      return view('modul.aset_tak_ketara.kewatk2.index', $context);

    }


    public function store(Request $request)
    {
      $kewatk2 = new Kewatk2;
      $kewatk2->tindakan_diterima=$request->tindakan_diterima;
      $kewatk2->pegawai_penerima=$request->user()->name;
      $kewatk2->pembekal=$request->pembekal;
      $kewatk2->no_rujukan_atk1=$request->no_rujukan_atk1;
      $kewatk2->jenis_penolakan=$request->jenis_penolakan;
      $kewatk2->status = "DRAFT";
      $kewatk2->save();

      $no_kod = $request->no_kod;
      $kuantiti_ditolak = $request->kuantiti_ditolak;
      $kuantiti_kurang_lebih = $request->kuantiti_kurang_lebih;
      $sebab_penolakan = $request->sebab_penolakan;
      $catatan = $request->catatan;

      foreach(range(0, count($no_kod)-1) as $i) {
        $info_kewatk2 = new InfoKewatk2;
        $info_kewatk2->no_kod = $no_kod[$i];
        $info_kewatk2->kuantiti_ditolak = $kuantiti_ditolak[$i];
        $info_kewatk2->kuantiti_kurang_lebih = $kuantiti_kurang_lebih[$i];
        $info_kewatk2->sebab_penolakan = $sebab_penolakan[$i];
        $info_kewatk2->catatan = $catatan[$i];
        $info_kewatk2->no_rujukan_atk2 = $kewatk2->id;
        $info_kewatk2->save();
      }
      

      return redirect('/kewatk2');
    }

    public function show(Kewatk2 $kewatk2)
    {

      $info_kewatk2 = InfoKewatk2::where('no_rujukan_atk2', $kewatk2->id)->get();
      $context = [
        "info_kewatk2" => $info_kewatk2,
        "rujukan_kewatk2" => $kewatk2->id
      ];
      return view('modul.aset_tak_ketara.kewatk2.info_kewatk2', $context);

    }


    public function update(Request $request, Kewatk2 $kewatk2)
    {
      $kewatk2->tindakan_diterima=$request->tindakan_diterima;
      $kewatk2->pembekal=$request->pembekal;
      $kewatk2->no_rujukan_atk1=$request->no_rujukan_atk1;
      $kewatk2->jenis_penolakan=$request->jenis_penolakan;
      $kewatk2->status=$request->status;
      $kewatk2->save();

      return redirect('/kewatk2');
    }

    public function destroy(Kewatk2 $kewatk2)
    {

      return $kewatk2->delete();
    }

    public function generatePdf(Request $request, Kewatk2 $kewatk2) {
      $kewatk1 = Kewatk1::where('id', $kewatk2->no_rujukan_atk1)->get();
      $all_kewatk2 = Kewatk2::all();
      $info_kewatk2 = InfoKewatk2::where('no_rujukan_atk2', $kewatk2->id)->get();

      $info_kewatk1 = array();
      foreach ($info_kewatk2 as $ik2) {
        $ik1 = InfoKewatk1::where('no_kod', $ik2->no_kod);
        array_push($info_kewatk1, $ik1);
      }
      
      echo "Not Implemented Yet";

    }

}
