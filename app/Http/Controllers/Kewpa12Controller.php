<?php

namespace App\Http\Controllers;

use App\Models\Kewpa12;
use Illuminate\Http\Request;

class Kewpa12Controller extends Controller
{
    public function index()
    {
      return view('modul.aset_alih.kewpa12.index');
    }

    public function store(Request $request)
    {
      
    }

    public function show(Kewpa12 $kewpa12)
    {
      return $kewpa12;
    }

    public function update(Request $request, $unused)
    {

    }


    public function destroy(Kewpa12 $kewpa12)
    {
      return $kewpa12->delete();
    }
}
