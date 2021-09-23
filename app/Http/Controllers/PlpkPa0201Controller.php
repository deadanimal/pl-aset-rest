<?php

namespace App\Http\Controllers;

use App\Models\Plpk_pa_0201;
use Illuminate\Http\Request;

class PlpkPa0201Controller extends Controller
{
    public function index()
    {
      return Plpk_pa_0201::all();
    }

    public function store(Request $request)
    {

      $plpk_pa_0201 = new Plpk_pa_0201;
      $plpk_pa_0201->no_wo = $request->no_wo;
      $plpk_pa_0201->nama_pengadu = $request->nama_pengadu;
      $plpk_pa_0201->jabatan = $request->jabatan;
      $plpk_pa_0201->plet_no_jenis_kenderaan = $request->plet_no_jenis_kenderaan;
      $plpk_pa_0201->pengguna_terakhir = $request->pengguna_terakhir;
      $plpk_pa_0201->tandatangan_pengadu = $request->tandatangan_pengadu;
      $plpk_pa_0201->tarikh_rosak = $request->tarikh_rosak;
      $plpk_pa_0201->bil = $request->bil;
      $plpk_pa_0201->perihal_rosak = $request->perihal_rosak;
      $plpk_pa_0201->kos_penyelenggaraan_dulu = $request->kos_penyelenggaraan_dulu;
      $plpk_pa_0201->anggaran_kos_penyelenggaraan = $request->anggaran_kos_penyelenggaraan;
      $plpk_pa_0201->syor_ulasan = $request->syor_ulasan;
      $plpk_pa_0201->nama_pegawai = $request->nama_pegawai;
      $plpk_pa_0201->jawatan_pegawai = $request->jawatan_pegawai;
      $plpk_pa_0201->tarikh_pegawai = $request->tarikh_pegawai;
      $plpk_pa_0201->status = $request->status;
      $plpk_pa_0201->ulasan = $request->ulasan;
      $plpk_pa_0201->nama_ketua = $request->nama_ketua;
      $plpk_pa_0201->tarikh_lulus_tak = $request->tarikh_lulus_tak;
      $plpk_pa_0201->pemeriksa = $request->pemeriksa;
      $plpk_pa_0201->pembaikan_dalaman_luar = $request->pembaikan_dalaman_luar;
      $plpk_pa_0201->alatganti = $request->alatganti;
      $plpk_pa_0201->tarikh_pemeriksa = $request->tarikh_pemeriksa;
      $plpk_pa_0201->tandatangan_pemeriksa = $request->tandatangan_pemeriksa;

      $plpk_pa_0201->save();

      return $plpk_pa_0201;



    }

    public function show(Plpk_pa_0201 $plpk_pa_0201)
    {
      return $plpk_pa_0201;
    }

    public function update(Request $request, Plpk_pa_0201 $plpk_pa_0201)
    {

      $plpk_pa_0201->no_wo = $request->no_wo;
      $plpk_pa_0201->nama_pengadu = $request->nama_pengadu;
      $plpk_pa_0201->jabatan = $request->jabatan;
      $plpk_pa_0201->plet_no_jenis_kenderaan = $request->plet_no_jenis_kenderaan;
      $plpk_pa_0201->pengguna_terakhir = $request->pengguna_terakhir;
      $plpk_pa_0201->tandatangan_pengadu = $request->tandatangan_pengadu;
      $plpk_pa_0201->tarikh_rosak = $request->tarikh_rosak;
      $plpk_pa_0201->bil = $request->bil;
      $plpk_pa_0201->perihal_rosak = $request->perihal_rosak;
      $plpk_pa_0201->kos_penyelenggaraan_dulu = $request->kos_penyelenggaraan_dulu;
      $plpk_pa_0201->anggaran_kos_penyelenggaraan = $request->anggaran_kos_penyelenggaraan;
      $plpk_pa_0201->syor_ulasan = $request->syor_ulasan;
      $plpk_pa_0201->nama_pegawai = $request->nama_pegawai;
      $plpk_pa_0201->jawatan_pegawai = $request->jawatan_pegawai;
      $plpk_pa_0201->tarikh_pegawai = $request->tarikh_pegawai;
      $plpk_pa_0201->status = $request->status;
      $plpk_pa_0201->ulasan = $request->ulasan;
      $plpk_pa_0201->nama_ketua = $request->nama_ketua;
      $plpk_pa_0201->tarikh_lulus_tak = $request->tarikh_lulus_tak;
      $plpk_pa_0201->pemeriksa = $request->pemeriksa;
      $plpk_pa_0201->pembaikan_dalaman_luar = $request->pembaikan_dalaman_luar;
      $plpk_pa_0201->alatganti = $request->alatganti;
      $plpk_pa_0201->tarikh_pemeriksa = $request->tarikh_pemeriksa;
      $plpk_pa_0201->tandatangan_pemeriksa = $request->tandatangan_pemeriksa;

      $plpk_pa_0201->save();

      return $plpk_pa_0201;

    }

    public function destroy(Plpk_pa_0201 $plpk_pa_0201)
    {
      return $plpk_pa_0201->delete();
    }
}
