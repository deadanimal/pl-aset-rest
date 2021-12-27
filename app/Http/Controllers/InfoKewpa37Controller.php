<?php

namespace App\Http\Controllers;

use App\Models\InfoKewpa37;
use Illuminate\Http\Request;

class InfoKewpa37Controller extends Controller
{


  public function store(Request $request)
  {

    InfoKewpa37::create($request->all());
    return redirect('/kewpa37/' . $request->kewpa37_id);
  }

  public function update(Request $request, InfoKewpa37 $info_kewpa37)
  {


    $info_kewpa37->update($request->all());
    return redirect('/kewpa37/' . $info_kewpa37->kewpa37_id);
  }

  public function destroy(InfoKewpa37 $info_kewpa37)
  {
    $info_kewpa37->delete();
    return redirect('/kewpa37/' . $info_kewpa37->kewpa37_id);
  }
}
