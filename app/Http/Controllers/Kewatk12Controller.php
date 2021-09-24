<?php

namespace App\Http\Controllers;

use App\Models\Kewatk12;
use Illuminate\Http\Request;

class Kewatk12Controller extends Controller
{
public function index()
    {

      return Kewatk12::all();
    }


    public function store(Request $request)
    {
      $kewatk12 = new Kewatk12;
      $kewatk12->agensi=$request->agensi;
      $kewatk12->bahagian=$request->bahagian;
      $kewatk12->staff_id=$request->staff_id;
      $kewatk12->save();
      return $kewatk12;
    }

    public function show(Kewatk12 $kewatk12)
    {

      return $kewatk12;
    }


    public function update(Request $request, Kewatk12 $kewatk12)
    {

      $kewatk12->agensi=$request->agensi;
      $kewatk12->bahagian=$request->bahagian;
      $kewatk12->staff_id=$request->staff_id;

      $kewatk12->save();

      return $kewatk12;
    }

    public function destroy(Kewatk12 $kewatk12)
    {

      return $kewatk12->delete();
    }
}
