<?php

namespace App\Http\Controllers;

use App\Models\Kewpa17;
use Illuminate\Http\Request;

class Kewpa17Controller extends Controller
{
    public function index()
    {
      return Kewpa17::all();
    }

    public function store(Request $request)
    {
      
      $kewpa17 = new Kewpa17;
      $kewpa17->pemohon_id=$request->pemohon_id;
      $kewpa17->penyerah_id=$request->penyerah_id;
      $kewpa17->pelulus_id=$request->pelulus_id;
      $kewpa17->penerima_id=$request->penerima_id;
      $kewpa17 -> save();

      return $kewpa17;
    }

    public function show(Kewpa17 $kewpa17)
    {
      return $kewpa17;
    }

    public function update(Request $request, Kewpa17 $kewpa17)
    {

      $kewpa17->pemohon_id=$request->pemohon_id;
      $kewpa17->penyerah_id=$request->penyerah_id;
      $kewpa17->pelulus_id=$request->pelulus_id;
      $kewpa17->penerima_id=$request->penerima_id;
      $kewpa15 -> save();

      return $kewpa17;

    }

    public function destroy(Kewpa17 $kewpa17)
    {
      return $kewpa17->delete();
    }
}
