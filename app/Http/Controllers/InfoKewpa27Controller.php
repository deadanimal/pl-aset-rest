<?php

namespace App\Http\Controllers;

use App\Models\InfoKewpa27;
use Illuminate\Http\Request;

class InfoKewpa27Controller extends Controller
{

  public function store(Request $request)
  {
    InfoKewpa27::create($request->all());
    return redirect('/kewpa27/' . $request->kewpa27_id);
  }
  public function update(Request $request, InfoKewpa27 $info_kewpa27)
  {
    $info_kewpa27->update($request->all());
    return redirect('/kewpa27/' . $info_kewpa27->kewpa27_id);
  }
  public function destroy(InfoKewpa27 $info_kewpa27)
  {
    $info_kewpa27->delete();
    return redirect('/kewpa27/' . $info_kewpa27->kewpa27_id);
  }
}
