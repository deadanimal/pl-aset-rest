<?php

namespace App\Http\Controllers;

use App\Models\InfoKewpa26;
use Illuminate\Http\Request;

class InfoKewpa26Controller extends Controller
{
  public function store(Request $request)
  {
    InfoKewpa26::create($request->all());
    return redirect('/kewpa26/' . $request->kewpa26_id);
  }

  public function update(Request $request, InfoKewpa26 $info_kewpa26)
  {
    $info_kewpa26->update($request->all());
    return redirect('/kewpa26/' . $info_kewpa26->kewpa26_id);
  }

  public function destroy(InfoKewpa26 $info_kewpa26)
  {
    $info_kewpa26->delete();
    return redirect('/kewpa26/' . $info_kewpa26->kewpa26_id);
  }
}
