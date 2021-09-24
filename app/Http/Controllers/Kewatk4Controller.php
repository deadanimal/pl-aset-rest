<?php

namespace App\Http\Controllers;

use App\Models\Kewatk4;
use Illuminate\Http\Request;

class Kewatk4Controller extends Controller
{
    public function index()
    {
      return Kewatk4::all();
    }

    public function store(Request $request)
    {

      $kewatk4 = new Kewatk4;
      $kewatk4->agensi=$request->agensi;
      $kewatk4->bahagian=$request->bahagian;
      $kewatk4->kategori=$request->kategori;
      $kewatk4->sub_kategori=$request->sub_kategori;
      $kewatk4->staff_id=$request->staff_id;
      $kewatk4 -> save();


      return $kewatk4;

      
    }

    public function show(Kewatk4 $kewatk4)
    {
      return $kewatk4;
    }

    public function update(Request $request, Kewatk4 $kewatk4)
    {
      $kewatk4->agensi=$request->agensi;
      $kewatk4->bahagian=$request->bahagian;
      $kewatk4->kategori=$request->kategori;
      $kewatk4->sub_kategori=$request->sub_kategori;
      $kewatk4->staff_id=$request->staff_id;

      $kewatk4 -> save();


      return $kewatk4;


    }

    public function destroy(Kewatk4 $kewatk4)
    {
      return $kewatk4->delete();
    }
}
