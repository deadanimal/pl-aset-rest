<?php

namespace App\Http\Controllers;

use App\Models\InfoKewpa36;
use Illuminate\Http\Request;

class InfoKewpa36Controller extends Controller
{

  public function store(Request $request)
  {
    InfoKewpa36::create($request->all());
    return redirect('/kewpa36/' . $request->kewpa36_id);
  }
  public function update(Request $request, InfoKewpa36 $info_kewpa36)
  {
    $info_kewpa36->update($request->all());
    return redirect('/kewpa36/' . $info_kewpa36->kewpa36_id);
  }

  public function destroy(InfoKewpa36 $info_kewpa36)
  {
    $info_kewpa36->delete();
    return redirect('/kewpa36/' . $info_kewpa36->kewpa36_id);
  }
}
