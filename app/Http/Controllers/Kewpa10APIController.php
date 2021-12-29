<?php

namespace App\Http\Controllers;

use App\Models\Kewpa10;
use Illuminate\Http\Request;

class Kewpa10APIController extends Controller
{
    public function index()
    {
      return Kewpa10::all();
    }

    public function store(Request $request)
    {
      
      return Kewpa10::create($request->all());

    }

    public function show($kewpa10)
    {
      return Kewpa10::where('id', $kewpa10)->first();
    }

    public function update(Request $request, $kewpa10)
    {
      $kewpa10 = Kewpa10::where('id', $kewpa10)->first();
      $kewpa10->update($request->all());
      return $kewpa10;


    }

    public function destroy($kewpa10)
    {
      $kewpa10 = Kewpa10::where('id', $kewpa10)->first();
      return $kewpa10->delete();
    }
}
