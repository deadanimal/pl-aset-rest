<?php

namespace App\Http\Controllers;

use App\Models\Kewpa13;
use App\Models\KodJabatan;
use App\Models\Kewpa3A;
use App\Models\InfoKewpa11;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class Kewpa13Controller extends Controller
{
    public function index()
    {
      $context = [
        "kewpa13" => Kewpa13::all(),
      ];

      return view('modul.aset_alih.kewpa13.index', $context);

    }

    public function store(Request $request)
    {
      
      $kewpa13 = new Kewpa13;
      $kewpa13->tahun=$request->tahun;
      $kewpa13->agensi=$request->agensi;
      $kewpa13->peratus=$request->peratus;
      $kewpa13->created_date=$request->created_date;
      $kewpa13->modified_date=$request->modified_date;
      $kewpa13->ketua_jabatan=$request->ketua_jabatan;
      $kewpa13->kewpa12_id=$request->kewpa12_id;
      $kewpa13 -> save();

      return $kewpa13;
    }

    public function show(Kewpa13 $kewpa13)
    {
      return $kewpa13;
    }

    public function update(Request $request, Kewpa13 $kewpa13)
    {

      $kewpa13->tahun=$request->tahun;
      $kewpa13->agensi=$request->agensi;
      $kewpa13->peratus=$request->peratus;
      $kewpa13->created_date=$request->created_date;
      $kewpa13->modified_date=$request->modified_date;
      $kewpa13->ketua_jabatan=$request->ketua_jabatan;
      $kewpa13->kewpa12_id=$request->kewpa12_id;
      return $kewpa13;

    }

    public function destroy(Kewpa13 $kewpa13)
    {
      return $kewpa13->delete();
    }

    public function generatePdf($tahun, $jabatan_id) {
      $context = (object)[];
      $context->tahun = $tahun;
      $context->jabatan = KodJabatan::where('id', $jabatan_id)->first()->nama_jabatan;
      $context->peratusan = $this->kiraPeratusanPemeriksaan($tahun, $jabatan_id);

      $response = Http::post('https://libreoffice.prototype.com.my/cetak/kpa13', [$context]);

      $res = $response->getBody()->getContents();
      $url = "data:application/pdf;base64,".$res;

      $context = [
        "url" => $url,
        "title" => "Kewpa13",
      ];

      return view('modul.borang_viewer_pa', $context);


    }

  public function kiraPeratusanPemeriksaan($tahun, $jabatan_id) {
      $keseluruhan = Count(Kewpa3A::all());
      $diperiksa = Count(InfoKewpa11::all());
      $tidak_diperiksa = $keseluruhan - $diperiksa;
      $peratusan_diperiksa = ($diperiksa - $keseluruhan)*100;

      return $peratusan_diperiksa;

  }

    

}
