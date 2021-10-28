<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kewpa1;
use App\Models\InfoKewpa1;

class Kewpa1Controller extends Controller
{
    public function index()
    {
      $kewpa1 = Kewpa1::all();

      $context = [
        "kewpa1" => $kewpa1
      ];

      return view('modul.aset_alih.kewpa1.index', $context);
    }

    public function store(Request $request)
    {
      
      $kewpa1 = new Kewpa1;
      $kewpa1 -> nama_pembekal = $request->nama_pembekal;
      $kewpa1 -> alamat_pembekal = $request->alamat_pembekal;
      $kewpa1 -> jenis_penerimaan = $request->jenis_penerimaan;
      $kewpa1 -> no_rujukan_pesanan = $request->no_rujukan_pesanan;
      $kewpa1 -> no_rujukan_hantaran = $request->no_rujukan_hantaran;
      $kewpa1 -> tarikh_nota_hantaran = $request->tarikh_nota_hantaran;
      $kewpa1 -> tarikh_pesanan_kontrak = $request->tarikh_pesanan_kontrak;
      $kewpa1 -> maklumat_pengangkutan = $request->maklumat_pengangkutan;
      $kewpa1 -> pegawai_penerima = $request->pegawai_penerima;
      $kewpa1 -> pegawai_teknikal = $request->pegawai_teknikal;
      $kewpa1 -> save();

      return redirect('/kewpa1');

    }

    public function show(Kewpa1 $kewpa1)
    {
      //Link to infoKewpa1 index
      $info_kewpa1 = InfoKewpa1::where('rujukan_kewpa1_id', $kewpa1->id)->get();
      $context = [
        "info_kewpa1" => $info_kewpa1,
        "rujukan_kewpa1_id" => $kewpa1->id
      ];
      return view('modul.aset_alih.info_kewpa1.index', $context);
    }

    public function update(Request $request, Kewpa1 $kewpa1)
    {

      $kewpa1 -> nama_pembekal = $request->nama_pembekal;
      $kewpa1 -> alamat_pembekal = $request->alamat_pembekal;
      $kewpa1 -> jenis_penerimaan = $request->jenis_penerimaan;
      $kewpa1 -> no_rujukan_pesanan = $request->no_rujukan_pesanan;
      $kewpa1 -> no_rujukan_hantaran = $request->no_rujukan_hantaran;
      $kewpa1 -> tarikh_nota_hantaran = $request->tarikh_nota_hantaran;
      $kewpa1 -> tarikh_pesanan_kontrak = $request->tarikh_pesanan_kontrak;
      $kewpa1 -> maklumat_pengangkutan = $request->maklumat_pengangkutan;
      $kewpa1 -> pegawai_penerima = $request->pegawai_penerima;
      $kewpa1 -> pegawai_teknikal = $request->pegawai_teknikal;
      $kewpa1 -> save();

      return redirect('/kewpa1');

    }

    public function destroy(Kewpa1 $kewpa1)
    {
      $kewpa1->delete();
      return redirect('/kewpa1');

    }
}
