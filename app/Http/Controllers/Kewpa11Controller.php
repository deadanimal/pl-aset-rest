<?php

namespace App\Http\Controllers;

use App\Models\Kewpa11;
use App\Models\InfoKewpa11;
use App\Models\KodJabatan;
use App\Models\Kewpa3A;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class Kewpa11Controller extends Controller
{
    public function index()
    {
      $context = [
        "kewpa11" => Kewpa11::all(),
      ];

      return view('modul.aset_alih.kewpa11.index', $context);

    }

    public function store(Request $request)
    {
      
      $request['status'] = "DERAF";
      $kewpa11 = Kewpa11::create($request->all());
      $kewpa11->save();

      foreach (range(0, count($request->no_siri_pendaftaran) - 1) as $i) {

          $info_kewpa11 = new InfoKewpa11;
          $info_kewpa11->lokasi_sebenar=$request->lokasi_sebenar[$i];
          $info_kewpa11->status_aset=$request->status_aset[$i];
          $info_kewpa11->catatan=$request->catatan[$i];
          $info_kewpa11->no_siri_pendaftaran=$request->no_siri_pendaftaran[$i];
          $info_kewpa11->rujukan_kewpa11_id=$kewpa11->id;      
          $info_kewpa11->save();

        }

      return redirect('/kewpa11');
    }

    public function create(Request $request) {
      $context = [
        "jabatan" => KodJabatan::all(),
        "kewpa3a" => Kewpa3A::all(),
      ];

      return view('modul.aset_alih.kewpa11.create', $context);
    }

    public function edit(Request $request, Kewpa11 $kewpa11) {

      $context = [
        "jabatan" => KodJabatan::all(),
        "kewpa3a" => Kewpa3A::all(),
        "kewpa11" => $kewpa11
      ];

      \Session::put('kewpa11', $kewpa11);

      return view('modul.aset_alih.kewpa11.edit', $context);

    }




    public function show(Kewpa11 $kewpa11)
    {
      return $kewpa11;
    }

    public function update(Request $request, Kewpa11 $kewpa11)
    {


      $kewpa11->update($request->all());

      return redirect('/kewpa11/'.$kewpa11->id.'/edit');
    }

    public function destroy(Kewpa11 $kewpa11)
    {
      return $kewpa11->delete();
    }

    public function generatePdf(Kewpa11 $kewpa11) {
      $response = Http::post('https://libreoffice.prototype.com.my/cetak/kpa11', [$kewpa11]);

      $res = $response->getBody()->getContents();
      $url = "data:application/pdf;base64,".$res;

      $context = [
        "url" => $url,
        "title" => "Kewpa11",
      ];

      return view('modul.borang_viewer_pa', $context);



    }


}
