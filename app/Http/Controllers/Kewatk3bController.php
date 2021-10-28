<?php

namespace App\Http\Controllers;

use App\Models\Kewatk3b;
use Illuminate\Http\Request;
use PDF;

class Kewatk3bController extends Controller
{
public function index()
    {
      $kewatk3b = Kewatk3b::all();

      $context = [
        "kewatk3b" => $kewatk3b,
      ];

      return view('modul.aset_tak_ketara.kewatk3.index_b', $context);


    }

    public function store(Request $request)
    {
      $kewatk3b = new Kewatk3b;
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

    public function generatePdf(Request $request, Kewatk3b $kewatk3b) 
    {

      $pdf = PDF::loadView('modul.aset_tak_ketara.kewatk3.kewatk3b_template', [
          
      ])->setPaper('a4', 'landscape');

      $pdf->save('kewatk3.pdf');

      $context = [
        "url" => "/kewatk3.pdf"
      ];

      return view('modul.aset_tak_ketara.kewatk1.pdf', $context);


    }


}
