<?php

namespace App\Http\Controllers;

use App\Models\Kewpa8;
use Illuminate\Http\Request;

class Kewpa8Controller extends Controller
{
    public function index()
    {
      return Kewpa8::all();
    }

    public function store(Request $request)
    {
      $kewpa8 = new Kewpa8;
      $kewpa8 -> kewpa8_id = $request->kewpa8_id;
      $kewpa8 -> tahun = $request->tahun;
      $kewpa8 -> staff_id = $request->staff_id;
      $kewpa8 -> save();

      return $kewpa8;

      
    }

    public function show(Kewpa8 $kewpa8)
    {
      return $kewpa8;
    }

    public function update(Request $request, Kewpa8 $kewpa8)
    {
      $kewpa8 -> kewpa8_id = $request->kewpa8_id;
      $kewpa8 -> tahun = $request->tahun;
      $kewpa8 -> staff_id = $request->staff_id;
      $kewpa8 -> save();

      return $kewpa8;


    }

    public function destroy(Kewpa8 $kewpa8)
    {
      return $kewpa8->delete();
    }

}

