<?php

namespace App\Http\Controllers;

use App\Models\InfoKewpa28;
use App\Models\Kewpa27;
use App\Models\Kewpa28;
use Illuminate\Http\Request;

class Kewpa28Controller extends Controller
{
  public function index()
  {
    return view('modul.aset_alih.kewpa28.index', [
      'kewpa28' => Kewpa28::all()
    ]);
  }

  public function store(Request $request)
  {

    $kewpa28 = Kewpa28::create($request->all());

    for ($i = 0; $i < count($request->kewpa27_id); $i++) {
      InfoKewpa28::create([
        'kuantiti' => $request->kuantiti[$i],
        'harga_tawaran' => $request->harga_tawaran[$i],
        'deposit_harga' => $request->deposit_harga[$i],
        'kewpa27_id' => $request->kewpa27_id[$i],
        'kewpa28_id' => $kewpa28->id,
      ]);
    }

    return redirect('/kewpa28');
  }

  public function create()
  {
    return view('modul.aset_alih.kewpa28.create', [
      'kewpa27' => Kewpa27::all()
    ]);
  }

  public function show(Kewpa28 $kewpa28)
  {
    return view('modul.aset_alih.kewpa28.edit', [
      'kewpa27' => Kewpa27::all(),
      'kewpa28' => $kewpa28,
    ]);
  }

  public function update(Request $request, Kewpa28 $kewpa28)
  {
    $kewpa28->update($request->all());
    return redirect('/kewpa28');
  }

  public function destroy(Kewpa28 $kewpa28)
  {
    InfoKewpa28::where('kewpa28_id', $kewpa28->id)->delete();
    $kewpa28->delete();
    return redirect('/kewpa28');
  }
}
