<?php

namespace App\Http\Controllers;

use App\Models\InfoKewpa28;
use Illuminate\Http\Request;

class InfoKewpa28Controller extends Controller
{


  public function store(Request $request)
  {
    InfoKewpa28::create($request->all());
    return redirect('/kewpa28/' . $request->kewpa28_id);
  }
  public function update(Request $request, InfoKewpa28 $info_kewpa28)
  {
    $info_kewpa28->update($request->all());
    return redirect('/kewpa28/' . $info_kewpa28->kewpa28_id);
  }
  public function destroy(InfoKewpa28 $info_kewpa28)
  {
    $info_kewpa28->delete();
    return redirect('/kewpa28/' . $info_kewpa28->kewpa28_id);
  }
}
