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

    InfoKewpa19::create($request->all());

    return redirect('/kewpa19/' . $request->kewpa19_id);
  }

  public function show(InfoKewpa19 $info_kewpa19)
  {
    return $info_kewpa19;
  }

  public function update(Request $request, InfoKewpa19 $info_kewpa19)
  {

    $info_kewpa19->update($request->all());
    return redirect('/kewpa19/' . $info_kewpa19->kewpa19_id);
  }

  public function destroy(InfoKewpa19 $info_kewpa19)
  {
    $info_kewpa19->delete();

    return redirect('/kewpa19/' . $info_kewpa19->kewpa19_id);
  }
}
