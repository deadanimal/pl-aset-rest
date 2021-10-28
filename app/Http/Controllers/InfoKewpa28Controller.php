<?php

namespace App\Http\Controllers;

use App\Models\InfoKewpa28;
use Illuminate\Http\Request;

class InfoKewpa28Controller extends Controller
{
    public function index()
    {
      return InfoKewpa28::all();
    }

    public function store(Request $request)
    {
      
      $info_kewpa28 = new InfoKewpa28;
      $kewpa28->nama=$request->nama;
      $kewpa28->no_pengenalan=$request->no_pengenalan;
      $kewpa28->agensi=$request->agensi;
      $kewpa28->alamat_agensi=$request->alamat_agensi;
      $kewpa28->deposit=$request->deposit;
      $kewpa28->no_bank=$request->no_bank;
      $kewpa28->nama_agensi=$request->nama_agensi;
      $kewpa28->staff_id=$request->staff_id;
      $info_kewpa28 -> save();

      return $info_kewpa28;
    }

    public function show(InfoKewpa28 $info_kewpa28)
    {
      return $info_kewpa28;
    }

    public function update(Request $request, InfoKewpa28 $info_kewpa28)
    {

      $kewpa28->nama=$request->nama;
      $kewpa28->no_pengenalan=$request->no_pengenalan;
      $kewpa28->agensi=$request->agensi;
      $kewpa28->alamat_agensi=$request->alamat_agensi;
      $kewpa28->deposit=$request->deposit;
      $kewpa28->no_bank=$request->no_bank;
      $kewpa28->nama_agensi=$request->nama_agensi;
      $kewpa28->staff_id=$request->staff_id;

      $info_kewpa28 -> save();

      return $info_kewpa28;

    }

    public function destroy(InfoKewpa28 $info_kewpa28)
    {
      return $info_kewpa28->delete();
    }



}
