<?php

namespace App\Http\Controllers;

use App\Models\InfoKewpa25;
use Illuminate\Http\Request;

class InfoKewpa25Controller extends Controller
{
  public function store(Request $request)
  {
    InfoKewpa25::create($request->all());

    return redirect('/kewpa25/' . $request->kewpa25_id);
  }

  public function update(Request $request, InfoKewpa25 $info_kewpa25)
  {

    $info_kewpa25->update($request->all());

    return redirect('/kewpa25/' . $info_kewpa25->kewpa25_id);
  }

  public function destroy(InfoKewpa25 $info_kewpa25)
  {
    $info_kewpa25->delete();
    return redirect('/kewpa25/' . $info_kewpa25->kewpa25_id);
  }
}
