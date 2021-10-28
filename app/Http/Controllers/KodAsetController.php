<?php

namespace App\Http\Controllers;

use App\Models\KodAset;
use Illuminate\Http\Request;

class KodAsetController extends Controller
{
    public function index()
    {
      $kod_assets = KodAset::all();
      $context = [
        "kod_aset" => $kod_assets
      ];

      return view('modul.umum.aset.index', $context);
}
    public function store(Request $request)
    {
      $kod_aset = new KodAset;
      $kod_aset->singkatan=$request->singkatan;
      $kod_aset->kod_asset=$request->kod_asset;
      $kod_aset->penerangan=$request->penerangan;
      $kod_aset->created_date=$request->created_date;
      $kod_aset->modified_date=$request->modified_date;
      $kod_aset->staff_id=$request->staff_id;      
      $kod_aset -> save();

      return redirect('/kod-aset');

      
    }

    public function show(KodAset $kod_assets)
    {
      return $kod_assets;
    }

    public function update(Request $request, KodAset $kod_aset)
    {

      $kod_aset->singkatan=$request->singkatan;
      $kod_aset->kod_asset=$request->kod_asset;
      $kod_aset->penerangan=$request->penerangan;
      $kod_aset->created_date=$request->created_date;
      $kod_aset->modified_date=$request->modified_date;
      $kod_aset->staff_id=$request->staff_id;      
      $kod_aset -> save();

      return redirect('/kod-aset');



    }

    public function destroy(KodAset $kod_aset)
    {
      $kod_aset->delete();
      return redirect('/kod-aset');
    }
}
