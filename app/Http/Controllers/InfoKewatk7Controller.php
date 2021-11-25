<?php

namespace App\Http\Controllers;

use App\Models\Kewatk7;
use App\Models\InfoKewatk7;
use Illuminate\Http\Request;

class InfoKewatk7Controller extends Controller
{
    public function index()
    {
      return InfoKewatk7::all();
    }

    public function store(Request $request)
    {
      $kewatk7 = InfoKewatk7::create($request->all());
      $kewatk7->status="TIDAK LULUS";
      $kewatk7->save();

      return redirect('/kewatk7/'.$request->no_permohonan_atk7);

      
    }

    public function show(Kewatk7 $kewatk7)
    {
      $info_kewatk7 = InfoKewatk7::where('no_permohonan_atk7', $kewatk7->id)->get();
      return $info_kewatk7;
    }

    public function update(Request $request, InfoKewatk7 $info_kewatk7)
    {
      $info_kewatk7->update($request->all());
      return redirect('/kewatk7/'.$request->no_permohonan_atk7);
    }

    public function destroy(InfoKewatk7 $info_kewatk7)
    {
      return $info_kewatk7->delete();
    }
}
