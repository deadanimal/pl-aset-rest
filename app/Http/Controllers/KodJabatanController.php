<?php

namespace App\Http\Controllers;

use App\Models\KodJabatan;
use Illuminate\Http\Request;

class KodJabatanController extends Controller
{
    public function index()
    {
      $jabatan = KodJabatan::all();
      $context = [
        "jabatans" => $jabatan
      ];

      return view('modul.umum.jabatan.index', $context);
    }

    public function store(Request $request)
    {
      $jabatan = new KodJabatan;
      $jabatan->singkatan=$request->singkatan;
      $jabatan->nama_jabatan=$request->nama_jabatan;
      $jabatan->staff_id=$request->user()->name;      
      $jabatan -> save();

      return redirect('/jabatan');
      
    }

    public function show(KodJabatan $jabatan)
    {
    }

    public function update(Request $request, KodJabatan $jabatan)
    {

      $jabatan->singkatan=$request->singkatan;
      $jabatan->nama_jabatan=$request->nama_jabatan;
      $jabatan->staff_id=$request->user()->name;      
      $jabatan -> save();


      return redirect('/jabatan');


    }

    public function destroy(KodJabatan $jabatan)
    {
      $jabatan->delete();
      return redirect('/jabatan');
    }

}
