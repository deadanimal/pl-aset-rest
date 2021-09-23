<?php

namespace App\Http\Controllers;

use App\Models\Lokasi;
use Illuminate\Http\Request;

class LokasiController extends Controller
{
public function index()
    {
      return Lokasi::all();
    }

    public function store(Request $request)
    {
      $lokasi = new Lokasi;
      $lokasi->nama_lokasi=$request->nama_lokasi;
      $lokasi->kod_lokasi=$request->kod_lokasi;
      $lokasi->staff_id=$request->staff_id;      
      $lokasi -> save();


      return $lokasi;

      
    }

    public function show(Lokasi $lokasi)
    {
      return $lokasi;
    }

    public function update(Request $request, Lokasi $lokasi)
    {
      $lokasi->nama_lokasi=$request->nama_lokasi;
      $lokasi->kod_lokasi=$request->kod_lokasi;
      $lokasi->staff_id=$request->staff_id;      
      $lokasi -> save();

      return $lokasi;


    }

    public function destroy(Lokasi $lokasi)
    {
      return $lokasi->delete();
    }
}
