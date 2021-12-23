<?php

namespace App\Http\Controllers;

use App\Models\Kewpa11;
use App\Models\Kewpa12;
use App\Models\Kewpa3A;
use App\Models\InfoKewpa11;
use Illuminate\Http\Request;
use App\Models\KodJabatan;
use Illuminate\Support\Facades\Http;

class Kewpa12Controller extends Controller
{
    public function index()
    {
      $context = [
        "kod_jabatans" => KodJabatan::all()
      ];

      return view('modul.aset_alih.kewpa12.index', $context);
    }

    public function store(Request $request)
    {
      
    }

    public function show(Kewpa12 $kewpa12)
    {
      return $kewpa12;
    }

    public function update(Request $request, $unused)
    {
      $tahun = $request->tahun;
      $jabatan = $request->jabatan;

      $context= (object)[];
      $context->keseluruhan = Count(Kewpa3A::all());
      $context->diperiksa = Count(InfoKewpa11::all());
      $context->tidak_diperiksa = $context->keseluruhan - $context->diperiksa;

      $context->a = Count(InfoKewpa11::where('status_aset',"Sedang Digunakan(A)")->get());
      $context->b = Count(InfoKewpa11::where('status_aset',"Tidak Digunakan(B)")->get());
      $context->c = Count(InfoKewpa11::where('status_aset',"Perlu Pembaikan(C)")->get());
      $context->d = Count(InfoKewpa11::where('status_aset',"Sedang Diselenggara(D)")->get());
      $context->e = Count(InfoKewpa11::where('status_aset',"Hilang(A)")->get());
      
      $peratusan_diperiksa = ($context->diperiksa/$context->keseluruhan)*100;

      $context->peratusan_diperiksa = $peratusan_diperiksa;
      $context->tahun = $tahun;
      $context->jabatan = $jabatan;

      $response = Http::post('https://libreoffice.prototype.com.my/cetak/kpa12', [$context]);

      $res = $response->getBody()->getContents();
      $url = "data:application/pdf;base64,".$res;

      $context = [
        "url" => $url,
        "title" => "Kewpa12",
      ];

      return view('modul.borang_viewer_pa', $context);



    }


    public function destroy(Kewpa12 $kewpa12)
    {
      return $kewpa12->delete();
    }
}
