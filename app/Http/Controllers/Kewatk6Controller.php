<?php

namespace App\Http\Controllers;

use App\Models\Kewatk6;
use Illuminate\Http\Request;

class Kewatk6Controller extends Controller
{
    public function index()
    {
      return Kewatk6::all();
    }

    public function store(Request $request)
    {
      $kewatk6 = new Kewatk6;
      $kewatk6->tahun=$request->tahun;
      $kewatk6->staff_id=$request->staff_id;

      $kewatk6 -> save();


      return $kewatk6;

      
    }

    public function show(Kewatk6 $kewatk6)
    {
      return $kewatk6;
    }

    public function update(Request $request, Kewatk6 $kewatk6)
    {

      $kewatk6->tahun=$request->tahun;
      $kewatk6->staff_id=$request->staff_id;

      $kewatk6 -> save();


      return $kewatk6;


    }

    public function destroy(Kewatk6 $kewatk6)
    {
      return $kewatk6->delete();
    }
}
