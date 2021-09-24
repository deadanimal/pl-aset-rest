<?php

namespace App\Http\Controllers;

use App\Models\Kewatk10;
use Illuminate\Http\Request;

class Kewatk10Controller extends Controller
{
    public function index()
    {

      return Kewatk10::all();
    }


    public function store(Request $request)
    {
      $kewatk10 = new Kewatk10;
      $kewatk10->tahun=$request->tahun;
      $kewatk10->agensi=$request->agensi;
      $kewatk10->staff_id=$request->staff_id;
      $kewatk10->save();
      return $kewatk10;
    }

    public function show(Kewatk10 $kewatk10)
    {

      return $kewatk10;
    }


    public function update(Request $request, Kewatk10 $kewatk10)
    {

      $kewatk10->tahun=$request->tahun;
      $kewatk10->agensi=$request->agensi;
      $kewatk10->staff_id=$request->staff_id;

      $kewatk10->save();

      return $kewatk10;
    }

    public function destroy(Kewatk10 $kewatk10)
    {

      return $kewatk10->delete();
    }
}
