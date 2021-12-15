<?php

namespace App\Http\Controllers;

use App\Models\InfoKewpa27;
use App\Models\Kewpa21;
use App\Models\Kewpa27;
use Illuminate\Http\Request;

class Kewpa27Controller extends Controller
{
  public function index()
  {
    return view('modul.aset_alih.kewpa27.index', [
      'kewpa27' => Kewpa27::all()
    ]);
  }

  public function store(Request $request)
  {
    $kewpa27 = Kewpa27::create($request->all());

    for ($i = 0; $i < count($request->kewpa21_id); $i++) {
      InfoKewpa27::create([
        'kuantiti' => $request->kuantiti[$i],
        'harga_simpanan' => $request->harga_simpanan[$i],
        'kewpa27_id' => $kewpa27->id,
        'kewpa21_id' => $request->kewpa21_id[$i],
      ]);
    }

    return redirect('/kewpa27');
  }

  public function create()
  {
    return view('modul.aset_alih.kewpa27.create', [
      'kewpa21' => Kewpa21::all()
    ]);
  }

  public function show(Kewpa27 $kewpa27)
  {
    return view('modul.aset_alih.kewpa27.edit', [
      'kewpa21' => Kewpa21::all(),
      'kewpa27' => $kewpa27,
    ]);
  }

  public function update(Request $request, Kewpa27 $kewpa27)
  {

    $kewpa27->update($request->all());
    return redirect('/kewpa27');
  }

  public function destroy(Kewpa27 $kewpa27)
  {
    InfoKewpa27::where('kewpa27_id', $kewpa27->id)->delete();
    $kewpa27->delete();
    return redirect('/kewpa27');
  }
}
