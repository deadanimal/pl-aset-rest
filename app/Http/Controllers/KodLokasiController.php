<?php

namespace App\Http\Controllers;

use App\Models\KodLokasi;
use Illuminate\Http\Request;

class KodLokasiController extends Controller
{
    public function index()
    {
      $lokasi = KodLokasi::all();
      $context = [
        "lokasis" => $lokasi
      ];

      return view('modul.umum.lokasi.index', $context);
    }

    public function store(Request $request)
    {
      $lokasi = new KodLokasi;
      $lokasi->kod_lokasi=$request->kod_lokasi;
      $lokasi->nama_lokasi=$request->nama_lokasi;
      $lokasi->staff_id=$request->user()->id;
      $lokasi -> save();

      return redirect('/lokasi');
      
    }

    public function show(KodLokasi $lokasi)
    {
    }

    public function update(Request $request, KodLokasi $lokasi)
    {

      $lokasi->update($request->all());

      return redirect('/lokasi');


    }

    public function destroy(KodLokasi $lokasi)
    {
      $lokasi->delete();
      return redirect('/lokasi');
    }

}
