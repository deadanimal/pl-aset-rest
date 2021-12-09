<?php

namespace App\Http\Controllers;

use App\Models\Plpk_pa_0206;
use Illuminate\Http\Request;

class PlpkPa0206Controller extends Controller
{
    public function index()
    {
      return Plpk_pa_0206::all();
    }

    public function store(Request $request)
    {

      $plpk_pa_0206 = new Plpk_pa_0206;
      $plpk_pa_0206->created_date=$request->created_date;
      $plpk_pa_0206->modified_date=$request->modified_date;
      $plpk_pa_0206->pemohon=$request->pemohon;
      $plpk_pa_0206->jurutera_kanan=$request->jurutera_kanan;
      $plpk_pa_0206->penolong_pengarah=$request->penolong_pengarah;

      $plpk_pa_0206->save();

      return $plpk_pa_0206;



    }

    public function show(Plpk_pa_0206 $plpk_pa_0206)
    {
      return $plpk_pa_0206;
    }

    public function update(Request $request, Plpk_pa_0206 $plpk_pa_0206)
    {

      $plpk_pa_0206->created_date=$request->created_date;
      $plpk_pa_0206->modified_date=$request->modified_date;
      $plpk_pa_0206->pemohon=$request->pemohon;
      $plpk_pa_0206->jurutera_kanan=$request->jurutera_kanan;
      $plpk_pa_0206->penolong_pengarah=$request->penolong_pengarah;
      $plpk_pa_0206->save();

      return $plpk_pa_0206;

    }

    public function destroy(Plpk_pa_0206 $plpk_pa_0206)
    {
      return $plpk_pa_0206->delete();
    }

  }