<?php

namespace App\Http\Controllers;

use App\Models\Kewpa15;
use Illuminate\Http\Request;

class Kewpa15Controller extends Controller
{
    public function index()
    {
      return Kewpa15::all();
    }

    public function store(Request $request)
    {
      
      $kewpa15 = new Kewpa15;
      $kewpa15->sub_kategori=$request->sub_kategori;
      $kewpa15->jenis=$request->jenis;
      $kewpa15->lokasi=$request->lokasi;
      $kewpa15->staff_id=$request->staff_id;
      $kewpa15 -> save();

      return $kewpa15;
    }

    public function show(Kewpa15 $kewpa15)
    {
      return $kewpa15;
    }

    public function update(Request $request, Kewpa15 $kewpa15)
    {

      $kewpa15->sub_kategori=$request->sub_kategori;
      $kewpa15->jenis=$request->jenis;
      $kewpa15->lokasi=$request->lokasi;
      $kewpa15->staff_id=$request->staff_id;
      $kewpa15 -> save();

      return $kewpa15;

    }

    public function destroy(Kewpa15 $kewpa15)
    {
      return $kewpa15->delete();
    }
}
