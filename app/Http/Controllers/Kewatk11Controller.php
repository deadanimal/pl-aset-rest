<?php

namespace App\Http\Controllers;

use App\Models\Kewatk11;
use Illuminate\Http\Request;

class Kewatk11Controller extends Controller
{
public function index()
    {

      return Kewatk11::all();
    }


    public function store(Request $request)
    {
      $kewatk11 = new Kewatk11;
      $kewatk11->peratusan_diperiksa=$request->peratusan_diperiksa;
      $kewatk11->kewatk10_id=$request->kewatk10_id;
      $kewatk11->staff_id=$request->staff_id;      $kewatk11->save();
      return $kewatk11;
    }

    public function show(Kewatk11 $kewatk11)
    {

      return $kewatk11;
    }


    public function update(Request $request, Kewatk11 $kewatk11)
    {

      $kewatk11->peratusan_diperiksa=$request->peratusan_diperiksa;
      $kewatk11->kewatk10_id=$request->kewatk10_id;
      $kewatk11->staff_id=$request->staff_id;      
      $kewatk11->save();

      return $kewatk11;
    }

    public function destroy(Kewatk11 $kewatk11)
    {

      return $kewatk11->delete();
    }
}
