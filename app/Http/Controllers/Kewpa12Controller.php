<?php

namespace App\Http\Controllers;

use App\Models\Kewpa12;
use Illuminate\Http\Request;

class Kewpa12Controller extends Controller
{
    public function index()
    {
      return Kewpa12::all();
    }

    public function store(Request $request)
    {
      
      $kewpa12 = new Kewpa12;
      $kewpa12->tahun=$request->tahun;
      $kewpa12->kuantiti_keseluruhan_pertama=$request->kuantiti_keseluruhan_pertama;
      $kewpa12->kuantiti_diperiksa_pertama=$request->kuantiti_diperiksa_pertama;
      $kewpa12->kuantiti_takdiperiksa_pertama=$request->kuantiti_takdiperiksa_pertama;
      $kewpa12->peratusan_aset_diperiksa_pertama=$request->peratusan_aset_diperiksa_pertama;
      $kewpa12->kuantiti_keseluruhan_kedua=$request->kuantiti_keseluruhan_kedua;
      $kewpa12->kuantiti_diperiksa_kedua=$request->kuantiti_diperiksa_kedua;
      $kewpa12->kuantiti_takdiperiksa_kedua=$request->kuantiti_takdiperiksa_kedua;
      $kewpa12->peratusan_aset_diperiksa_kedua=$request->peratusan_aset_diperiksa_kedua;
      $kewpa12->kuantiti_keseluruhan_ketiga=$request->kuantiti_keseluruhan_ketiga;
      $kewpa12->kuantiti_diperiksa_ketiga=$request->kuantiti_diperiksa_ketiga;
      $kewpa12->kuantiti_takdiperiksa_ketiga=$request->kuantiti_takdiperiksa_ketiga;
      $kewpa12->peratusan_aset_diperiksa_ketiga=$request->peratusan_aset_diperiksa_ketiga;
      $kewpa12->kuantiti_keseluruhan_keempat=$request->kuantiti_keseluruhan_keempat;
      $kewpa12->kuantiti_diperiksa_keempat=$request->kuantiti_diperiksa_keempat;
      $kewpa12->kuantiti_takdiperiksa_keempat=$request->kuantiti_takdiperiksa_keempat;
      $kewpa12->peratusan_aset_diperiksa_keempat=$request->peratusan_aset_diperiksa_keempat;
      $kewpa12->jumlah_keseluruhan_diperiksa=$request->jumlah_keseluruhan_diperiksa;
      $kewpa12->kuantiti_asetA=$request->kuantiti_asetA;
      $kewpa12->kuantiti_asetB=$request->kuantiti_asetB;
      $kewpa12->kuantiti_asetC=$request->kuantiti_asetC;
      $kewpa12->kuantiti_asetD=$request->kuantiti_asetD;
      $kewpa12->kuantiti_asetE=$request->kuantiti_asetE;
      $kewpa12->kuantiti_asetF=$request->kuantiti_asetF;
      $kewpa12->date_created=$request->date_created;
      $kewpa12->date_modified=$request->date_modified;
      $kewpa12->no_siri_pendaftaran=$request->no_siri_pendaftaran;
      $kewpa12->staff_id=$request->staff_id;
      $kewpa12 -> save();

      return $kewpa12;
    }

    public function show(Kewpa12 $kewpa12)
    {
      return $kewpa12;
    }

    public function update(Request $request, Kewpa12 $kewpa12)
    {

      $kewpa12->tahun=$request->tahun;
      $kewpa12->kuantiti_keseluruhan_pertama=$request->kuantiti_keseluruhan_pertama;
      $kewpa12->kuantiti_diperiksa_pertama=$request->kuantiti_diperiksa_pertama;
      $kewpa12->kuantiti_takdiperiksa_pertama=$request->kuantiti_takdiperiksa_pertama;
      $kewpa12->peratusan_aset_diperiksa_pertama=$request->peratusan_aset_diperiksa_pertama;
      $kewpa12->kuantiti_keseluruhan_kedua=$request->kuantiti_keseluruhan_kedua;
      $kewpa12->kuantiti_diperiksa_kedua=$request->kuantiti_diperiksa_kedua;
      $kewpa12->kuantiti_takdiperiksa_kedua=$request->kuantiti_takdiperiksa_kedua;
      $kewpa12->peratusan_aset_diperiksa_kedua=$request->peratusan_aset_diperiksa_kedua;
      $kewpa12->kuantiti_keseluruhan_ketiga=$request->kuantiti_keseluruhan_ketiga;
      $kewpa12->kuantiti_diperiksa_ketiga=$request->kuantiti_diperiksa_ketiga;
      $kewpa12->kuantiti_takdiperiksa_ketiga=$request->kuantiti_takdiperiksa_ketiga;
      $kewpa12->peratusan_aset_diperiksa_ketiga=$request->peratusan_aset_diperiksa_ketiga;
      $kewpa12->kuantiti_keseluruhan_keempat=$request->kuantiti_keseluruhan_keempat;
      $kewpa12->kuantiti_diperiksa_keempat=$request->kuantiti_diperiksa_keempat;
      $kewpa12->kuantiti_takdiperiksa_keempat=$request->kuantiti_takdiperiksa_keempat;
      $kewpa12->peratusan_aset_diperiksa_keempat=$request->peratusan_aset_diperiksa_keempat;
      $kewpa12->jumlah_keseluruhan_diperiksa=$request->jumlah_keseluruhan_diperiksa;
      $kewpa12->kuantiti_asetA=$request->kuantiti_asetA;
      $kewpa12->kuantiti_asetB=$request->kuantiti_asetB;
      $kewpa12->kuantiti_asetC=$request->kuantiti_asetC;
      $kewpa12->kuantiti_asetD=$request->kuantiti_asetD;
      $kewpa12->kuantiti_asetE=$request->kuantiti_asetE;
      $kewpa12->kuantiti_asetF=$request->kuantiti_asetF;
      $kewpa12->date_created=$request->date_created;
      $kewpa12->date_modified=$request->date_modified;
      $kewpa12->no_siri_pendaftaran=$request->no_siri_pendaftaran;
      $kewpa12->staff_id=$request->staff_id;
      $kewpa12 -> save();

      return $kewpa12;

    }

    public function destroy(Kewpa12 $kewpa12)
    {
      return $kewpa12->delete();
    }
}
