<?php

namespace App\Http\Controllers;

use App\Models\Plpk_pa_0208;
use Illuminate\Http\Request;

class PlpkPa0208Controller extends Controller
{
    public function index()
    {
      return Plpk_pa_0208::all();
    }

    public function store(Request $request)
    {

      $plpk_pa_0208 = new Plpk_pa_0208;
      $plpk_pa_0208->jenis_kegunaan=$request->jenis_kegunaan;
      $plpk_pa_0208->nama_pembekal=$request->nama_pembekal;
      $plpk_pa_0208->kos=$request->kos;
      $plpk_pa_0208->no_pesanan_tempatan=$request->no_pesanan_tempatan;
      $plpk_pa_0208->tarikh_mula=$request->tarikh_mula;
      $plpk_pa_0208->tarikh_siap=$request->tarikh_siap;
      $plpk_pa_0208->tarikh=$request->tarikh;
      $plpk_pa_0208->created_date=$request->created_date;
      $plpk_pa_0208->modified_date=$request->modified_date;
      $plpk_pa_0208->pengadu_id=$request->pengadu_id;
      $plpk_pa_0208->pemeriksa_id=$request->pemeriksa_id;
      $plpk_pa_0208->save();


      return $plpk_pa_0208;



    }

    public function show(Plpk_pa_0208 $plpk_pa_0208)
    {
      return $plpk_pa_0208;
    }

    public function update(Request $request, Plpk_pa_0208 $plpk_pa_0208)
    {

      $plpk_pa_0208->jenis_kegunaan=$request->jenis_kegunaan;
      $plpk_pa_0208->nama_pembekal=$request->nama_pembekal;
      $plpk_pa_0208->kos=$request->kos;
      $plpk_pa_0208->no_pesanan_tempatan=$request->no_pesanan_tempatan;
      $plpk_pa_0208->tarikh_mula=$request->tarikh_mula;
      $plpk_pa_0208->tarikh_siap=$request->tarikh_siap;
      $plpk_pa_0208->tarikh=$request->tarikh;
      $plpk_pa_0208->created_date=$request->created_date;
      $plpk_pa_0208->modified_date=$request->modified_date;
      $plpk_pa_0208->pengadu_id=$request->pengadu_id;
      $plpk_pa_0208->pemeriksa_id=$request->pemeriksa_id;
      $plpk_pa_0208->save();

      return $plpk_pa_0208;

    }

    public function destroy(Plpk_pa_0208 $plpk_pa_0208)
    {
      return $plpk_pa_0208->delete();
    }
}
