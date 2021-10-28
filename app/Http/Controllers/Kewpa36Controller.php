<?php

namespace App\Http\Controllers;

use App\Models\Kewpa36;
use Illuminate\Http\Request;

class Kewpa36Controller extends Controller
{
    public function index()
    {
      return Kewpa36::all();
    }

    public function store(Request $request)
    {
      
      $kewpa36 = new Kewpa36;
      $kewpa36->no_surat=$request->no_surat;
      $kewpa36->tarikh_surat=$request->tarikh_surat;
      $kewpa36 -> save();

      return $kewpa36;
    }

    public function show(Kewpa36 $kewpa36)
    {
      return $kewpa36;
    }

    public function update(Request $request, Kewpa36 $kewpa36)
    {

      $kewpa36->no_surat=$request->no_surat;
      $kewpa36->tarikh_surat=$request->tarikh_surat;
      $kewpa36 -> save();

      return $kewpa36;

    }

    public function destroy(Kewpa36 $kewpa36)
    {
      return $kewpa36->delete();
    }
}
