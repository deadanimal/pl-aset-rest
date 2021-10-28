<?php

namespace App\Http\Controllers;

use App\Models\InfoKewpa18;
use Illuminate\Http\Request;

class InfoKewpa18Controller extends Controller
{
    public function index()
    {
      return InfoKewpa18::all();
    }

    public function store(Request $request)
    {
      
      $info_kewpa18 = new InfoKewpa18;
      $info_kewpa18->agensi=$request->agensi;
      $info_kewpa18->kuantiti_terimaan=$request->kuantiti_terimaan;
      $info_kewpa18->jumlah_perolehan_terimaan=$request->jumlah_perolehan_terimaan;
      $info_kewpa18->jumlah_nilai_semasa_terimaan=$request->jumlah_nilai_semasa_terimaan;
      $info_kewpa18->kuantiti_pengeluaran=$request->kuantiti_pengeluaran;
      $info_kewpa18->jumlah_perolehan_pengeluaran=$request->jumlah_perolehan_pengeluaran;
      $info_kewpa18->jumlah_nilai_semasa_pengeluaran=$request->jumlah_nilai_semasa_pengeluaran;
      $info_kewpa18->kewpa17_id=$request->kewpa17_id;
      $info_kewpa18->kewpa18_id=$request->kewpa18_id;

      $info_kewpa18 -> save();

      return $info_kewpa18;
    }

    public function show(InfoKewpa18 $info_kewpa18)
    {
      return $info_kewpa18;
    }

    public function update(Request $request, InfoKewpa18 $info_kewpa18)
    {

      $info_kewpa18->agensi=$request->agensi;
      $info_kewpa18->kuantiti_terimaan=$request->kuantiti_terimaan;
      $info_kewpa18->jumlah_perolehan_terimaan=$request->jumlah_perolehan_terimaan;
      $info_kewpa18->jumlah_nilai_semasa_terimaan=$request->jumlah_nilai_semasa_terimaan;
      $info_kewpa18->kuantiti_pengeluaran=$request->kuantiti_pengeluaran;
      $info_kewpa18->jumlah_perolehan_pengeluaran=$request->jumlah_perolehan_pengeluaran;
      $info_kewpa18->jumlah_nilai_semasa_pengeluaran=$request->jumlah_nilai_semasa_pengeluaran;
      $info_kewpa18->kewpa17_id=$request->kewpa17_id;
      $info_kewpa18->kewpa18_id=$request->kewpa18_id;

      $info_kewpa18 -> save();

      return $info_kewpa18;

    }

    public function destroy(InfoKewpa18 $info_kewpa18)
    {
      return $info_kewpa18->delete();
    }



}
