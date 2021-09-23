<?php

namespace App\Http\Controllers;

use App\Models\Pengumuman;
use Illuminate\Http\Request;

class PengumumanController extends Controller
{
    public function index()
    {
      return Pengumuman::all();
    }

    public function store(Request $request)
    {
      $pengumuman = new Pengumuman;
      $pengumuman->info_pengumuman=$request->info_pengumuman;
      $pengumuman->gambar_pengumuman=$request->gambar_pengumuman;
      $pengumuman->tarikh_pengumuman=$request->tarikh_pengumuman;
      $pengumuman->staff_id=$request->staff_id;
      $pengumuman -> save();



      return $pengumuman;

      
    }

    public function show(Pengumuman $pengumuman)
    {
      return $pengumuman;
    }

    public function update(Request $request, Pengumuman $pengumuman)
    {
      $pengumuman->info_pengumuman=$request->info_pengumuman;
      $pengumuman->gambar_pengumuman=$request->gambar_pengumuman;
      $pengumuman->tarikh_pengumuman=$request->tarikh_pengumuman;
      $pengumuman->staff_id=$request->staff_id;
      $pengumuman -> save();


      return $pengumuman;


    }

    public function destroy(Pengumuman $pengumuman)
    {
      return $pengumuman->delete();
    }
}
