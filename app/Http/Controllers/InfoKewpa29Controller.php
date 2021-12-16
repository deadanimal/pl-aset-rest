<?php

namespace App\Http\Controllers;

use App\Models\InfoKewpa29;
use Illuminate\Http\Request;

class InfoKewpa29Controller extends Controller
{

  public function store(Request $request)
  {
    InfoKewpa29::create($request->all());
    return redirect('/kewpa29/' . $request->kewpa29_id);
  }

  public function update(Request $request, InfoKewpa29 $info_kewpa29)
  {
    $info_kewpa29->update($request->all());
    return redirect('/kewpa29/' . $info_kewpa29->kewpa29_id);
  }

  public function destroy(InfoKewpa29 $info_kewpa29)
  {
    $info_kewpa29->delete();
    return redirect('/kewpa29/' . $info_kewpa29->kewpa29_id);
  }
}
