<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Kewatk8;
use App\Models\Kewatk3a;
use Illuminate\Http\Request;

class Kewatk8Controller extends Controller
{
    public function index()
    {

      $kewatk3a = Kewatk3a::all();
      $pengguna = User::all();
      $kewatk8 = Kewatk8::all();

      $context = [
        "kewatk3a" => $kewatk3a,
        "pengguna" => $pengguna,
        "kewatk8" => $kewatk8,
      ];

      return view('modul.aset_tak_ketara.kewatk8.index', $context);


    }


    public function store(Request $request)
    {
      #dd(Kewatk3a::all());
      #dd($request->no_siri_pendaftaran."\n");
       
      $kewatk8 = new Kewatk8;
      $kewatk8->no_siri_pendaftaran=$request->no_siri_pendaftaran;      
      $kewatk8->tajuk=Kewatk3a::where('no_siri_pendaftaran', $request->no_siri_pendaftaran)->first()->rajuk;
      $kewatk8->tarikh_kerosakan=$request->tarikh_kerosakan;
      $kewatk8->perihal_kerosakan=$request->perihal_kerosakan;

      $kewatk8->tarikh_aduan=date('Y-m-d H:i:s');;

      $kewatk8->catatan=$request->catatan;
      $kewatk8->jumlah_kos=$request->jumlah_kos;
      $kewatk8->anggaran_kos=$request->anggaran_kos;
      $kewatk8->syor_ulasan=$request->syor_ulasan;
      $kewatk8->tarikh_pegawai=$request->tarikh_pegawai;
      $kewatk8->status="DERAF";
      $kewatk8->pengadu=$request->user()->name;
      $kewatk8->pengguna_terakhir=$request->pengguna_terakhir;
      $kewatk8->pegawai_aset=$request->pegawai_aset;
      $kewatk8->ketua_jabatan=$request->ketua_jabatan;
      $kewatk8->save();

      return redirect('/kewatk8');
    }

    public function show(Kewatk8 $kewatk8)
    {

      return $kewatk8;
    }


    public function update(Request $request, Kewatk8 $kewatk8)
    {


      $kewatk8->tajuk=Kewatk3a::where('no_siri_pendaftaran', $request->no_siri_pendaftaran)->first()->rajuk;
      $kewatk8->tarikh_kerosakan=$request->tarikh_kerosakan;
      $kewatk8->perihal_kerosakan=$request->perihal_kerosakan;
      $kewatk8->tarikh_aduan=$request->tarikh_aduan;
      $kewatk8->catatan=$request->catatan;
      $kewatk8->jumlah_kos=$request->jumlah_kos;
      $kewatk8->anggaran_kos=$request->anggaran_kos;
      $kewatk8->syor_ulasan=$request->syor_ulasan;
      $kewatk8->tarikh_pegawai=$request->tarikh_pegawai;
      $kewatk8->status=$request->status;
      $kewatk8->pengadu=$request->pengadu;
      $kewatk8->pengguna_terakhir=$request->pengguna_terakhir;
      $kewatk8->pegawai_aset=$request->pegawai_aset;
      $kewatk8->ketua_jabatan=$request->ketua_jabatan;
      $kewatk8->no_siri_pendaftaran=$request->no_siri_pendaftaran;      
      $kewatk8->save();

      return redirect('/kewatk8');

    }

    public function destroy(Kewatk8 $kewatk8)
    {

      return $kewatk8->delete();
    }
}
