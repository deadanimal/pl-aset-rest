<?php

namespace App\Http\Controllers;

use App\Models\Kewpa14;
use Illuminate\Http\Request;

class Kewpa14Controller extends Controller
{
    public function index()
    {
      return Kewpa14::all();
    }

    public function store(Request $request)
    {
      
      $kewpa14 = new Kewpa14;
      $kewpa14->agensi=$request->agensi;
      $kewpa14->bahagian=$request->bahagian;
      $kewpa14->staff_id=$request->staff_id;

      $kewpa14 -> save();

      return $kewpa14;
    }

    public function show(Kewpa14 $kewpa14)
    {
      return $kewpa14;
    }

    public function update(Request $request, Kewpa14 $kewpa14)
    {

      $kewpa14->agensi=$request->agensi;
      $kewpa14->bahagian=$request->bahagian;
      $kewpa14->staff_id=$request->staff_id;

      return $kewpa14;

    }

    public function destroy(Kewpa14 $kewpa14)
    {
      return $kewpa14->delete();
    }
}
