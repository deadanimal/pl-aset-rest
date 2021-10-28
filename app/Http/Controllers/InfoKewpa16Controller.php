<?php

namespace App\Http\Controllers;

use App\Models\InfoKewpa16;
use Illuminate\Http\Request;

class InfoKewpa16Controller extends Controller
{
    public function index()
    {
      return InfoKewpa16::all();
    }

    public function store(Request $request)
    {
      

      $info_kewpa16 = new InfoKewpa16;
      $info_kewpa16->agensi=$request->agensi;
      $info_kewpa16->kuantiti_aset_pencegahan=$request->kuantiti_aset_pencegahan;
      $info_kewpa16->kos_aset_pencegahan=$request->kos_aset_pencegahan;
      $info_kewpa16->kuantiti_aset_pembaikan=$request->kuantiti_aset_pembaikan;
      $info_kewpa16->kos_aset_pembaikan=$request->kos_aset_pembaikan;
      $info_kewpa16->jumlah_aset=$request->jumlah_aset;
      $info_kewpa16->jumlah_kos=$request->jumlah_kos;
      $info_kewpa16->kewpa14_id=$request->kewpa14_id;
      $info_kewpa16->kewpa16_id=$request->kewpa16_id;      


      $info_kewpa16 -> save();

      return $info_kewpa16;
    }

    public function show(InfoKewpa16 $info_kewpa16)
    {
      return $info_kewpa16;
    }

    public function update(Request $request, InfoKewpa16 $info_kewpa16)
    {

      $info_kewpa16->agensi=$request->agensi;
      $info_kewpa16->kuantiti_aset_pencegahan=$request->kuantiti_aset_pencegahan;
      $info_kewpa16->kos_aset_pencegahan=$request->kos_aset_pencegahan;
      $info_kewpa16->kuantiti_aset_pembaikan=$request->kuantiti_aset_pembaikan;
      $info_kewpa16->kos_aset_pembaikan=$request->kos_aset_pembaikan;
      $info_kewpa16->jumlah_aset=$request->jumlah_aset;
      $info_kewpa16->jumlah_kos=$request->jumlah_kos;
      $info_kewpa16->kewpa14_id=$request->kewpa14_id;
      $info_kewpa16->kewpa16_id=$request->kewpa16_id;      
      $info_kewpa16 -> save();

      return $info_kewpa16;

    }

    public function destroy(InfoKewpa16 $info_kewpa16)
    {
      return $info_kewpa16->delete();
    }



}
