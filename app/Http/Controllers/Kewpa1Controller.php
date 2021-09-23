<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kewpa1;

class Kewpa1Controller extends Controller
{
    public function index()
    {
      return Kewpa1::all();
    }

    public function store(Request $request)
    {
      
      $kewpa1 = new Kewpa1;
      $kewpa1 -> nama_pembekal = $request->nama_pembekal;
      $kewpa1 -> alamat_pembekal = $request->alamat_pembekal;
      $kewpa1 -> jenis_penerimaan = $request->jenis_penerimaan;
      $kewpa1 -> no_rujukan_pesanan = $request->no_rujukan_pesanan;
      $kewpa1 -> tarikh_nota_hantaran = $request->tarikh_nota_hantaran;
      $kewpa1 -> maklumat_pengangkutan = $request->maklumat_pengangkutan;
      $kewpa1 -> pegawai_penerima = $request->pegawai_penerima;
      $kewpa1 -> pegawai_teknikal = $request->pegawai_teknikal;
      $kewpa1 -> save();

      return $kewpa1;
    }

    public function show(Kewpa1 $kewpa1)
    {
      return $kewpa1;
    }

    public function update(Request $request, Kewpa1 $kewpa1)
    {

      $kewpa1 -> nama_pembekal = $request->nama_pembekal;
      $kewpa1 -> alamat_pembekal = $request->alamat_pembekal;
      $kewpa1 -> jenis_penerimaan = $request->jenis_penerimaan;
      $kewpa1 -> no_rujukan_pesanan = $request->no_rujukan_pesanan;
      $kewpa1 -> tarikh_nota_hantaran = $request->tarikh_nota_hantaran;
      $kewpa1 -> maklumat_pengangkutan = $request->maklumat_pengangkutan;
      $kewpa1 -> pegawai_penerima = $request->pegawai_penerima;
      $kewpa1 -> pegawai_teknikal = $request->pegawai_teknikal;
      $kewpa1 -> save();

      return $kewpa1;

    }

    public function destroy(Kewpa1 $kewpa1)
    {
      return $kewpa1->delete();
    }
}
