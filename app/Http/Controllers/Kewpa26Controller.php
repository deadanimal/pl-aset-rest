<?php

namespace App\Http\Controllers;

use App\Models\Kewpa26;
use Illuminate\Http\Request;

class Kewpa26Controller extends Controller
{
    public function index()
    {
      return Kewpa26::all();
    }

    public function store(Request $request)
    {
      
      $kewpa26 = new Kewpa26;
      $kewpa26->staff_id=$request->staff_id;      
      $kewpa26 -> save();

      return $kewpa26;
    }

    public function show(Kewpa26 $kewpa26)
    {
      return $kewpa26;
    }

    public function update(Request $request, Kewpa26 $kewpa26)
    {

      $kewpa26->staff_id=$request->staff_id;      
      $kewpa15 -> save();

      return $kewpa26;

    }

    public function destroy(Kewpa26 $kewpa26)
    {
      return $kewpa26->delete();
    }
}
