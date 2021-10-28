<?php

namespace App\Http\Controllers;

use App\Models\InfoKewatk4;
use Illuminate\Http\Request;

class InfoKewatk4Controller extends Controller
{
    public function index()
    {
      return InfoKewatk4::all();
    }

    public function store(Request $request)
    {
      $info_kewatk4 = new InfoKewatk4;

      $info_kewatk4->jenis=$request->jenis;
      $info_kewatk4->tajuk=$request->tajuk;
      $info_kewatk4->no_pesanan=$request->no_pesanan;
      $info_kewatk4->tarikh_terima=$request->tarikh_terima;
      $info_kewatk4->kuantiti=$request->kuantiti;
      $info_kewatk4->harga=$request->harga;
      $info_kewatk4->tempoh_dari=$request->tempoh_dari;
      $info_kewatk4->tempoh_hingga=$request->tempoh_hingga;
      $info_kewatk4->catatan=$request->catatan;
      $info_kewatk4->pegawai_penempatan=$request->pegawai_penempatan;
      $info_kewatk4->kewatk4_id=$request->kewatk4_id;



      $info_kewatk4 -> save();

      return redirect('/kewatk4/'.$request -> kewatk4_id);

      
    }

    public function show(InfoKewatk4 $info_kewatk4)
    {
      return $info_kewatk4;
    }

    public function update(Request $request, InfoKewatk4 $info_kewatk4)
    {

      $info_kewatk4->jenis=$request->jenis;
      $info_kewatk4->tajuk=$request->tajuk;
      $info_kewatk4->no_pesanan=$request->no_pesanan;
      $info_kewatk4->tarikh_terima=$request->tarikh_terima;
      $info_kewatk4->kuantiti=$request->kuantiti;
      $info_kewatk4->harga=$request->harga;
      $info_kewatk4->tempoh_dari=$request->tempoh_dari;
      $info_kewatk4->tempoh_hingga=$request->tempoh_hingga;
      $info_kewatk4->catatan=$request->catatan;
      $info_kewatk4->pegawai_penempatan=$request->pegawai_penempatan;
      $info_kewatk4->kewatk4_id=$request->kewatk4_id;
      $info_kewatk4 -> save();

      return redirect('/kewatk4/'.$request -> kewatk4_id);

      return $info_kewatk4;


    }

    public function destroy(InfoKewatk4 $info_kewatk4)
    {
      return $info_kewatk4->delete();
      return redirect('/kewatk4/'.$request -> kewatk4_id);
    }
}
