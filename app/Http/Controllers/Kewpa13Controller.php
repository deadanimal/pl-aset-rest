<?php

namespace App\Http\Controllers;

use App\Models\Kewpa13;
use Illuminate\Http\Request;

class Kewpa13Controller extends Controller
{
    public function index()
    {
      return Kewpa13::all();
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
}
