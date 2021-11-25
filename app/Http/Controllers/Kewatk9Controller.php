<?php

namespace App\Http\Controllers;

use App\Http\Controllers\InfoKewatk9Controller;
use App\Models\InfoKewatk1;
use App\Models\InfoKewatk9;
use App\Models\Kewatk3a;
use App\Models\Kewatk9;
use App\Models\KodLokasi;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

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

        $kewatk9->agensi = $request->agensi;
        $kewatk9->bahagian = $request->bahagian;
        $kewatk9->pegawai_pemeriksa1 = $request->user()->email;
        $kewatk9->status = "DERAF";

        $kewatk9->save();

        $this->storeInfoKewatk9($request, $kewatk9->id);

        return redirect('/kewatk9');

    }

    public function show(Kewatk9 $kewatk9)
    {
        $kewatk3a = Kewatk3a::all();
        $info_kewatk1 = InfoKewatk1::all();
        $lokasi = KodLokasi::all();

        $context = [
            "kewatk3a" => $kewatk3a,
            "kewatk9" => $kewatk9,
            "info_kewatk1" => $info_kewatk1,
            "lokasi" => $lokasi,

        ];

        return view('modul.aset_tak_ketara.kewatk9.info_index', $context);



    }

    public function update(Request $request, Kewatk9 $kewatk9)
    {
        $kewatk9->update($request->all());
        return redirect('/kewatk9/'.$kewatk9->id);
    }

    public function destroy(Kewatk9 $kewatk9)
    {

        return $kewatk9->delete();
    }

    public function storeInfoKewatk9($request, $kewatk9_id)
    {

        foreach (range(0, count($request->no_siri_pendaftaran) - 1) as $i) {
            $temp = new InfoKewatk9;
            $temp->no_siri_pendaftaran = $request->no_siri_pendaftaran[$i];
            $temp->lokasi_sebenar = $request->lokasi_sebenar[$i];
            $temp->status_harta = $request->status_harta[$i];
            $temp->catatan = $request->catatan[$i];
            $temp->no_rujukan_atk9 = $kewatk9_id;
            $temp->save();

        }

    }

    public function generatePdf(Request $request, Kewatk9 $kewatk9) {

      $response = Http::post('https://libreoffice.prototype.com.my/cetak/atk9', [$kewatk9]);

      $res = $response->getBody()->getContents();
      $url = "data:application/pdf;base64,".$res;

      $context = [
        "url" => $url,
        "title" => "Kewatk9"
      ];

      return view('modul.borang_viewer_atk', $context);



    }


}
