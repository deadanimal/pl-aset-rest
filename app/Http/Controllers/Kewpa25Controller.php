<?php

namespace App\Http\Controllers;

use App\Models\Kewpa25;
use Illuminate\Http\Request;

class Kewpa25Controller extends Controller
{
    public function index()
    {
      return Kewpa25::all();
    }

    public function store(Request $request)
    {
      
      $kewpa25 = new Kewpa25;
      $kewpa25->nama_syarikat=$request->nama_syarikat;
      $kewpa25->no_pengenalan=$request->no_pengenalan;
      $kewpa25->alamat=$request->alamat;
      $kewpa25->agensi=$request->agensi;
      $kewpa25->alamat_agensi=$request->alamat_agensi;
      $kewpa25->deposit_tender=$request->deposit_tender;
      $kewpa25->no_bank=$request->no_bank;
      $kewpa25->nama_agensi=$request->nama_agensi;
      $kewpa25->ketua_jabatan=$request->ketua_jabatan;
      $kewpa25 -> save();

      return $kewpa25;
    }

    public function show(Kewpa25 $kewpa25)
    {
      return $kewpa25;
    }

    public function update(Request $request, Kewpa25 $kewpa25)
    {

      $kewpa25->nama_syarikat=$request->nama_syarikat;
      $kewpa25->no_pengenalan=$request->no_pengenalan;
      $kewpa25->alamat=$request->alamat;
      $kewpa25->agensi=$request->agensi;
      $kewpa25->alamat_agensi=$request->alamat_agensi;
      $kewpa25->deposit_tender=$request->deposit_tender;
      $kewpa25->no_bank=$request->no_bank;
      $kewpa25->nama_agensi=$request->nama_agensi;
      $kewpa25->ketua_jabatan=$request->ketua_jabatan;
      $kewpa15 -> save();

      return $kewpa25;

    }

    public function destroy(Kewpa25 $kewpa25)
    {
      return $kewpa25->delete();
    }
}
