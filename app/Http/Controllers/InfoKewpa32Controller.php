<?php

namespace App\Http\Controllers;

use App\Models\InfoKewpa32;
use Illuminate\Http\Request;

class InfoKewpa32Controller extends Controller
{
  public function store(Request $request)
  {
    InfoKewpa32::create($request->all());
    return redirect('/kewpa32/' . $request->kewpa32_id);
  }

  public function update(Request $request, InfoKewpa32 $info_kewpa32)
  {
    $info_kewpa32->update($request->all());
    return redirect('/kewpa32/' . $info_kewpa32->kewpa32_id);
  }

  public function destroy(InfoKewpa32 $info_kewpa32)
  {
    $info_kewpa32->delete();
    return redirect('/kewpa32/' . $info_kewpa32->kewpa32_id);
  }
}
