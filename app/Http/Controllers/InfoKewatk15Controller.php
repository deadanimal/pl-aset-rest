<?php

namespace App\Http\Controllers;


use App\Models\Kewatk3a;
use App\Models\InfoKewatk15;
use Illuminate\Http\Request;

class InfoKewatk15Controller extends Controller
{
    public function index()
    {
      return InfoKewatk15::all();
    }

    public function store(Request $request)
    {
      $info_kewatk15 = new InfoKewatk15;
      $info_kewatk15->catatan=$request->catatan;
      $info_kewatk15->no_siri_pendaftaran=$request->no_siri_pendaftaran;
      $info_kewatk15->jenis_pindahan=$request->jenis_pindahan;
      $info_kewatk15->kewatk15_id=$request->kewatk15_id;
      $info_kewatk15 -> save();

      return redirect('/kewatk15/'.$request->kewatk15_id);
    }

    public function show(InfoKewatk15 $info_kewatk15)
    {

      
      $context = [
        "info_kewatk15" => $info_kewatk15,
        "kewatk3a" => Kewatk3a::all(),
      ];

      return view('modul.aset_tak_ketara.kewatk15.edit_info', $context);
    }

    public function update(Request $request, InfoKewatk15 $info_kewatk15)
    {
      $info_kewatk15->catatan=$request->catatan;
      $info_kewatk15->no_siri_pendaftaran=$request->no_siri_pendaftaran;
      $info_kewatk15->jenis_pindahan=$request->jenis_pindahan;
      $info_kewatk15->kewatk15_id=$request->kewatk15_id;
      $info_kewatk15 -> save();

      return redirect('/kewatk15/'.$request->kewatk15_id);

    }

    public function destroy(InfoKewatk15 $info_kewatk15)
    {
      $info_kewatk15->delete();

    }

    public function destroy_related($kewatk15_id)
    {
      $info_kewatk15 = InfoKewatk15::where('kewatk15_id', $kewatk15_id)->get();
      $info_kewatk15->delete();
    }

}
