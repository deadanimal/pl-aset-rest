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
      $kod_aset = KodAset::create($request->all());
      $kod_aset->staff_id = $request->user()->id;

      return redirect('/kod-aset');

      
    }

    public function show(KodAset $kod_assets)
    {
      return $kod_assets;
    }

    public function update(Request $request, KodAset $kod_aset)
    {
      $kod_aset->update($request->all());

      return redirect('/kod-aset');



    }

    public function destroy(KodAset $kod_aset)
    {
      $kod_aset->delete();
      return redirect('/kod-aset');
    }
}
