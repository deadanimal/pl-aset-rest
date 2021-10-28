<?php

namespace App\Http\Controllers;

use App\Models\InfoKewatk1;
use Illuminate\Http\Request;

class InfoKewatk1Controller extends Controller
{
    public function index()
    {
      return InfoKewatk1::all();
    }

    public function store(Request $request)
    {
      $info_kewatk1 = new InfoKewatk1;
      $info_kewatk1->keterangan_aset=$request->keterangan_aset;
      $info_kewatk1->medium=$request->medium;
      $info_kewatk1->kuantiti_dipesan=$request->kuantiti_dipesan;
      $info_kewatk1->kuantiti_do=$request->kuantiti_do;
      $info_kewatk1->kuantiti_diterima=$request->kuantiti_diterima;
      $info_kewatk1->catatan=$request->catatan;
      $info_kewatk1->no_rujukan=$request->rujukan_no;      
      $info_kewatk1->no_kod=$request->no_kod;      
      $info_kewatk1->save();

      return redirect('/kewatk1/'.$request -> rujukan_no);
      
    }

    public function show($no_rujukan_atk1)
    {
      return InfoKewatk1::where('no_rujukan', $no_rujukan_atk1)->get();
    }

    public function update(Request $request, InfoKewatk1 $info_kewatk1)
    {
      $info_kewatk1->keterangan_aset=$request->keterangan_aset;
      $info_kewatk1->medium=$request->medium;
      $info_kewatk1->kuantiti_dipesan=$request->kuantiti_dipesan;
      $info_kewatk1->kuantiti_do=$request->kuantiti_do;
      $info_kewatk1->kuantiti_diterima=$request->kuantiti_diterima;
      $info_kewatk1->catatan=$request->catatan;
      $info_kewatk1->no_rujukan=$request->rujukan_no;      
      $info_kewatk1->no_kod=$request->no_kod;      
      $info_kewatk1->save();

      return redirect('/kewatk1/'.$request -> rujukan_no);

    }

    public function destroy(Request $request, InfoKewatk1 $info_kewatk1)
    {
      $info_kewatk1->delete();
      return redirect('/kewatk1/'.$request -> $info_kewatk1-> no_rujukan);
    }
}
