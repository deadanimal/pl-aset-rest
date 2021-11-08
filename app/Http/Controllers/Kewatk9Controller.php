<?php

namespace App\Http\Controllers;

use App\Models\Kewatk3a;
use App\Models\InfoKewatk1;
use App\Models\Kewatk9;
use App\Models\InfoKewatk9;
use App\Models\KodLokasi;
use Illuminate\Http\Request;

use Exception;

use App\Http\Controllers\InfoKewatk9Controller;

class Kewatk9Controller extends Controller
{
    public function index()
    {

      $kewatk3a = Kewatk3a::all();
      $kewatk9 = Kewatk9::all();
      $info_kewatk1 = InfoKewatk1::all();
      $info_kewatk9 = InfoKewatk9::all();
      $lokasi = KodLokasi::all();

      $context = [
        "kewatk3a" => $kewatk3a,
        "kewatk9" => $kewatk9,
        "info_kewatk1" => $info_kewatk1,
        "info_kewatk9" => $info_kewatk9,
        "lokasi" => $lokasi,

      ];

      return view('modul.aset_tak_ketara.kewatk9.index', $context);

    }


    public function store(Request $request)
    {
      $kewatk9 = new Kewatk9;
      
      $kewatk9->agensi=$request->agensi;
      $kewatk9->bahagian=$request->bahagian;
      $kewatk9->pegawai_pemeriksa1=$request->user()->email;
      $kewatk9->status="DERAF";


      $kewatk9->save();
     
      $this->storeInfoKewatk9($request, $kewatk9->id);

      return redirect('/kewatk9');

    }

    public function show(Kewatk9 $kewatk9)
    {

      return $kewatk9;
    }


    public function update(Request $request, Kewatk9 $kewatk9)
    {
     
      $kewatk9->agensi=$request->agensi;
      $kewatk9->bahagian=$request->bahagian;
      $kewatk9->pegawai_pemeriksa1=$request->pegawai_pemeriksa1;
      $kewatk9->pegawai_pemeriksa2=$request->pegawai_pemeriksa2;
      $kewatk9->pegawai_aset=$request->pegawai_aset;
      $kewatk9->save();

      $this->updateInfoKewatk9($request, $kewatk9->id);

      return redirect('/kewatk9');
    }

    public function destroy(Kewatk9 $kewatk9)
    {

      return $kewatk9->delete();
    }

    public function storeInfoKewatk9($request, $kewatk9_id)
    {

      foreach(range(0, count($request->no_siri_pendaftaran)-1) as $i) {
        $temp = (object)[];
        $temp->no_siri_pendaftaran = $request->no_siri_pendaftaran[$i];
        $temp->lokasi_sebenar = $request->lokasi_sebenar[$i];
        $temp->status_harta = $request->status_harta[$i];
        $temp->catatan = $request->catatan[$i];
        $temp->no_rujukan_atk9 = $kewatk9_id;

        (new InfoKewatk9Controller)->store($temp);
      }

    }

    public function updateInfoKewatk9($request, $kewatk9_id)
    {

      foreach(range(0, count($request->no_siri_pendaftaran)-1) as $i) {
        try {

          $temp = (object)[];
          $temp->no_siri_pendaftaran = $request->no_siri_pendaftaran[$i];
          $temp->lokasi_sebenar = $request->lokasi_sebenar[$i];
          $temp->status_harta = $request->status_harta[$i];
          $temp->catatan = $request->catatan[$i];
          $temp->no_rujukan_atk9 = $kewatk9_id;

          (new InfoKewatk9Controller)->update($temp, $request->id[$i]);

        } catch (Exception $e) {

          (new InfoKewatk9Controller)->store($temp);

        }
      }

     }
}
