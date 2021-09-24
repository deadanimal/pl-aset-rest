<?php

namespace App\Http\Controllers;

use App\Models\Kewatk1;
use Illuminate\Http\Request;

class Kewatk1Controller extends Controller
{
    public function index()
    {
      return Kewatk1::all();
    }

    public function store(Request $request)
    {
      $kewatk1 = new Kewatk1;
      $kewatk1->nama_pembekal=$request->nama_pembekal;
      $kewatk1->alamat_pembekal=$request->alamat_pembekal;
      $kewatk1->jenis_penerimaan=$request->jenis_penerimaan;
      $kewatk1->no_pk=$request->no_pk;
      $kewatk1->tarikh_pk=$request->tarikh_pk;
      $kewatk1->no_do=$request->no_do;
      $kewatk1->tarikh_do=$request->tarikh_do;
      $kewatk1->maklumat_pengangkutan=$request->maklumat_pengangkutan;
      $kewatk1->pegawai_penerima=$request->pegawai_penerima;
      $kewatk1->pegawai_pakar=$request->pegawai_pakar;      
      $kewatk1 -> save();


      return $kewatk1;

      
    }

    public function show(Kewatk1 $kewatk1)
    {
      return $kewatk1;
    }

    public function update(Request $request, Kewatk1 $kewatk1)
    {
      $kewatk1->nama_pembekal=$request->nama_pembekal;
      $kewatk1->alamat_pembekal=$request->alamat_pembekal;
      $kewatk1->jenis_penerimaan=$request->jenis_penerimaan;
      $kewatk1->no_pk=$request->no_pk;
      $kewatk1->tarikh_pk=$request->tarikh_pk;
      $kewatk1->no_do=$request->no_do;
      $kewatk1->tarikh_do=$request->tarikh_do;
      $kewatk1->maklumat_pengangkutan=$request->maklumat_pengangkutan;
      $kewatk1->pegawai_penerima=$request->pegawai_penerima;
      $kewatk1->pegawai_pakar=$request->pegawai_pakar;     

      $kewatk1 -> save();


      return $kewatk1;


    }

    public function destroy(Kewatk1 $kewatk1)
    {
      return $kewatk1->delete();
    }
}
