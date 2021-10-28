<?php

namespace App\Http\Controllers;

use App\Models\Kewpa29;
use Illuminate\Http\Request;

class Kewpa29Controller extends Controller
{
    public function index()
    {
      return Kewpa29::all();
    }

    public function store(Request $request)
    {
      
      $kewpa29 = new Kewpa29;
      $kewpa29->pengerusi=$request->pengerusi;
      $kewpa29->ahli1=$request->ahli1;
      $kewpa29->ahli2=$request->ahli2;
      $kewpa29 -> save();

      return $kewpa29;
    }

    public function show(Kewpa29 $kewpa29)
    {
      return $kewpa29;
    }

    public function update(Request $request, Kewpa29 $kewpa29)
    {

      $kewpa29->pengerusi=$request->pengerusi;
      $kewpa29->ahli1=$request->ahli1;
      $kewpa29->ahli2=$request->ahli2;
      $kewpa29 -> save();

      return $kewpa29;

    }

    public function destroy(Kewpa29 $kewpa29)
    {
      return $kewpa29->delete();
    }
}
