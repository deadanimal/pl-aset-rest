<?php

namespace App\Http\Controllers;

use App\Models\InfoKewpa24;
use Illuminate\Http\Request;

class InfoKewpa24Controller extends Controller
{
  public function store(Request $request)
  {
    InfoKewpa24::create($request->all());
    return redirect('/kewpa24/' . $request->kewpa24_id);
  }

  public function update(Request $request, InfoKewpa24 $info_kewpa24)
  {
    $info_kewpa24->update($request->all());
    return redirect('/kewpa24/' . $info_kewpa24->kewpa24_id);
  }

  public function destroy(InfoKewpa24 $info_kewpa24)
  {
    $info_kewpa24->delete();
    return redirect('/kewpa24/' . $info_kewpa24->kewpa24_id);
  }
}
