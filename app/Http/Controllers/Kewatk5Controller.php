<?php

namespace App\Http\Controllers;

use App\Models\Kewatk5;
use Illuminate\Http\Request;

class Kewatk5Controller extends Controller
{
public function index()
    {
      return Kewatk5::all();
    }

    public function store(Request $request)
    {
      $kewatk5 = new Kewatk5;

      $kewatk5->cara_diperolehi=$request->cara_diperolehi;
      $kewatk5->tarikh_terima=$request->tarikh_terima;
      $kewatk5->harga_perolehan_asal=$request->harga_perolehan_asal;
      $kewatk5->anggaran_nilai_semasa=$request->anggaran_nilai_semasa;
      $kewatk5->status_aset=$request->status_aset;
      $kewatk5->staff_id=$request->staff_id;
      $kewatk5->no_siri_pendaftaran=$request->no_siri_pendaftaran;

      $kewatk5 -> save();


      return $kewatk5;

      
    }

    public function show(Kewatk5 $kewatk5)
    {
      return $kewatk5;
    }

    public function update(Request $request, Kewatk5 $kewatk5)
    {
      $kewatk5->cara_diperolehi=$request->cara_diperolehi;
      $kewatk5->tarikh_terima=$request->tarikh_terima;
      $kewatk5->harga_perolehan_asal=$request->harga_perolehan_asal;
      $kewatk5->anggaran_nilai_semasa=$request->anggaran_nilai_semasa;
      $kewatk5->status_aset=$request->status_aset;
      $kewatk5->staff_id=$request->staff_id;
      $kewatk5->no_siri_pendaftaran=$request->no_siri_pendaftaran;

      $kewatk5 -> save();


      return $kewatk5;


    }

    public function destroy(Kewatk5 $kewatk5)
    {
      return $kewatk5->delete();
    }
}
