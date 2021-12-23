<?php

namespace App\Http\Controllers;

use App\Models\Kewpa16;
use App\Models\Kewpa15;
use App\Models\InfoKewpa15;
use App\Models\KodJabatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class Kewpa16Controller extends Controller
{
public function index()
    {
      $context = [
        "kod_jabatans" => KodJabatan::all()
      ];
      return view('modul.aset_alih.kewpa16.index', $context);
    }

  public function store(Request $request)
  {


    $context = (object)[];

    $context->tahun = $request->tahun;
    $context->jabatan = $request->jabatan;

    #$info_kewpa15 = InfoKewpa11::whereYear('created_at',$request->tahun)->get();

    $jenis_penyelenggaraan = ['Penyelenggaraan Pencegahan', 'Penyelenggaran Pembaikan'];
    foreach($jenis_penyelenggaraan as $jenis) {

        if ($jenis == 'Penyelenggaraan Pencegahan') {
          $key = "pencegahan";
        } else {
          $key = "pembaikan";
        }


        //TODO
        //filter by jabatan
        $info_kewpa15 = InfoKewpa15::where('jenis_penyelenggaraan', $jenis)->get();

        $context->$key = (object)[];
        $context->$key->kuantiti = count($info_kewpa15);
        $context->$key->kos = $info_kewpa15->sum('kos');

      }

    $info_kewpa15 = InfoKewpa15::all();
    $context->total = (object)[];
    $context->total->kuantiti = count($info_kewpa15);
    $context->total->kos = $info_kewpa15->sum('kos');

    $response = Http::post('https://libreoffice.prototype.com.my/cetak/kpa16', [$context]);

    $res = $response->getBody()->getContents();
    $url = "data:application/pdf;base64,".$res;

    $context = [
      "url" => $url,
      "title" => "Kewpa16",
    ];

    return view('modul.borang_viewer_pa', $context);


  }

  public function show(Kewpa16 $kewpa16)
  {
    return $kewpa16;
  }

  public function update(Request $request, Kewpa16 $kewpa16)
  {

  }

  public function destroy(Kewpa16 $kewpa16)
  {
    return $kewpa16->delete();
  }



}
