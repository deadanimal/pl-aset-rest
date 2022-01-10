<?php

namespace App\Http\Controllers;

use App\Models\Pengumuman;
use Illuminate\Http\Request;

class PengumumanController extends Controller
{
    public function index()
    {
      $context = [
        "pengumumans" => Pengumuman::all()
      ];

      return view('modul.umum.pengumuman.index', $context);
    }

    public function store(Request $request)
    {

      $path = $request->file('gambar_pengumuman')->store('pengumuman');

      $pengumuman = Pengumuman::create($request->all());
      $pengumuman->gambar_pengumuman = $path;
      $pengumuman->staff_id = $request->user()->id;
      $pengumuman->save();

      //If ($request->status == "Aktif") {
      //  $this->deactivateOther($pengumuman->id);
      //}


      return redirect('/pengumuman');
    }

    public function show(Pengumuman $pengumuman)
    {
      return $pengumuman;
    }

    public function update(Request $request, Pengumuman $pengumuman)
    {
      $pengumuman -> update($request->all());

      if ($request->hasFile('gambar_pengumuman')) {
        $path = $request->file('gambar_pengumuman')->store('pengumuman');
        $pengumuman->gambar_pengumuman = $path;
        $pengumuman->save();
      }

      //if ($request->status == "Aktif") {
      //  $this->deactivateOther($pengumuman->id);
      //}

      return redirect('/pengumuman');

    }

    public function destroy(Pengumuman $pengumuman)
    {
      $pengumuman->delete();
      if (count(Pengumuman::where('status', 'Aktif')->get()) == 0) {
        $first = Pengumuman::get()->first();
        $first->status = "Aktif";
        $first->save();
      }

      return redirect('/pengumuman');

    }

    public function deactivateOther($id_aktif) {
      $pengumuman_others = Pengumuman::where('id', '!=', $id_aktif)->update(['status' => 'Tidak Aktif']);;
    }
}
