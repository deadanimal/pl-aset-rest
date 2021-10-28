<?php

namespace App\Http\Controllers;

use App\Models\Kewpa28;
use Illuminate\Http\Request;

class Kewpa28Controller extends Controller
{
    public function index()
    {
      return Kewpa28::all();
    }

    public function store(Request $request)
    {
      
      $kewpa28 = new Kewpa28;
      $kewpa28->nama=$request->nama;
      $kewpa28->no_pengenalan=$request->no_pengenalan;
      $kewpa28->agensi=$request->agensi;
      $kewpa28->alamat_agensi=$request->alamat_agensi;
      $kewpa28->deposit=$request->deposit;
      $kewpa28->no_bank=$request->no_bank;
      $kewpa28->nama_agensi=$request->nama_agensi;
      $kewpa28->staff_id=$request->staff_id;
      $kewpa28 -> save();

      return $kewpa28;
    }

    public function show(Kewpa28 $kewpa28)
    {
      return $kewpa28;
    }

    public function update(Request $request, Kewpa28 $kewpa28)
    {

      $kewpa28->nama=$request->nama;
      $kewpa28->no_pengenalan=$request->no_pengenalan;
      $kewpa28->agensi=$request->agensi;
      $kewpa28->alamat_agensi=$request->alamat_agensi;
      $kewpa28->deposit=$request->deposit;
      $kewpa28->no_bank=$request->no_bank;
      $kewpa28->nama_agensi=$request->nama_agensi;
      $kewpa28->staff_id=$request->staff_id;
      $kewpa28 -> save();

      return $kewpa28;

    }

    public function destroy(Kewpa28 $kewpa28)
    {
      return $kewpa28->delete();
    }
}
