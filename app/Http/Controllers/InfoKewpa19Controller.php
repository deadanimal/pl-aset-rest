<?php

namespace App\Http\Controllers;

use App\Models\InfoKewpa19;
use Illuminate\Http\Request;

class InfoKewpa19Controller extends Controller
{
    public function index()
    {
      return InfoKewpa19::all();
    }

    public function store(Request $request)
    {
      
      $table->string("butiran_penambahbaikan")->nullable();
      $table->string("laporan_pemeriksaan")->nullable();
      $table->string("no_siri_pendaftaran")->nullable();
      $table->string("kewpa19_id")->nullable();


      $info_kewpa19 -> save();

      return $info_kewpa19;
    }

    public function show(InfoKewpa19 $info_kewpa19)
    {
      return $info_kewpa19;
    }

    public function update(Request $request, InfoKewpa19 $info_kewpa19)
    {

      $table->string("butiran_penambahbaikan")->nullable();
      $table->string("laporan_pemeriksaan")->nullable();
      $table->string("no_siri_pendaftaran")->nullable();
      $table->string("kewpa19_id")->nullable();


      $info_kewpa19 -> save();

      return $info_kewpa19;

    }

    public function destroy(InfoKewpa19 $info_kewpa19)
    {
      return $info_kewpa19->delete();
    }



}
