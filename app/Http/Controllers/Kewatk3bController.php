<?php

namespace App\Http\Controllers;

use App\Models\Kewatk3b;
use App\Models\Kewatk3a;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use PDF;

class Kewatk3bController extends Controller
{
public function index()
    {
      $kewatk3b = Kewatk3b::all();
      $kewatk3a = Kewatk3a::all();

      $context = [
        "kewatk3b" => $kewatk3b,
        "kewatk3a" => $kewatk3a,
      ];

      return view('modul.aset_tak_ketara.kewatk3.index_b', $context);


    }

    public function store(Request $request)
    {
      $kewatk3b = Kewatk3b::create($request->all());
      $kewatk3b->staff_id=$request->user()->id;
      $kewatk3b->save();

      return redirect('/kewatk3b');

      
    }

    public function show(Kewatk3b $kewatk3b)
    {
      return $kewatk3b;
    }

    public function update(Request $request, Kewatk3b $kewatk3b)
    {
      $kewatk3b->kos=$request->kos;
      $kewatk3b->nilai_semasa=$request->nilai_semasa;
      $kewatk3b->tempoh_jaminan=$request->tempoh_jaminan;
      $kewatk3b->status=$request->status;
      $kewatk3b->tarikh_dipasang=$request->tarikh_dipasang;
      $kewatk3b->tarikh_dikeluarkan=$request->tarikh_dikeluarkan;
      $kewatk3b->tarikh_dilupus_hapus=$request->tarikh_dilupus_hapus;
      $kewatk3b->catatan=$request->catatan;
      $kewatk3b->staff_id=$request->staff_id;
      $kewatk3b->no_siri_pendaftaran=$request->no_siri_pendaftaran;

      $kewatk3b -> save();


      return redirect('/kewatk3b');


    }

    public function destroy(Kewatk3b $kewatk3b)
    {
      return $kewatk3b->delete();
    }

    public function generatePdf(Request $request, $kewatk3b) 
    {
      $temp = Kewatk3b::where('id', $kewatk3b)->first();

      $data = Kewatk3b::where('no_siri_pendaftaran', $temp->no_siri_pendaftaran)->get();

      $array_data = [
        "data" => $data
      ];


      $response = Http::post('https://libreoffice.prototype.com.my/cetak/atk3b', [$array_data]);

      $res = $response->getBody()->getContents();
      $url = "data:application/pdf;base64,".$res;

      $context = [
        "url" => $url,
        "title" => "Kewatk3b"
      ];

      return view('modul.borang_viewer_atk', $context);


    }


}
