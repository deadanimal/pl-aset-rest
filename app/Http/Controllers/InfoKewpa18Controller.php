<?php

namespace App\Http\Controllers;

use App\Models\InfoKewpa18;
use App\Models\Kewpa18;
use Illuminate\Http\Request;

class InfoKewpa18Controller extends Controller
{

  public function store(Request $request)
  {
    InfoKewpa18::create($request->all());
    return redirect('/kewpa18/' . $request->kewpa18_id);
  }

  public function destroy(InfoKewpa18 $info_kewpa18)
  {
    $info_kewpa18->delete();

    return redirect('/kewpa18/' . $info_kewpa18->kewpa18_id);
  }
}
