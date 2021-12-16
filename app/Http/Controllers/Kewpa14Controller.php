<?php

namespace App\Http\Controllers;

use App\Models\Kewpa14;
use App\Models\Kewpa3A;
use Illuminate\Http\Request;

class Kewpa14Controller extends Controller
{
    public function index()
    {
      $context = [
        "kewpa14" => Kewpa3A::where('status_selenggara', 'Perlu' )->get(),
      ];

      return view('modul.aset_alih.kewpa14.index', $context);

    }

    public function store(Request $request)
    {
      
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
