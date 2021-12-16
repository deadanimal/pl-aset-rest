<?php

namespace App\Http\Controllers;

use App\Models\InfoKewpa21;
use Illuminate\Http\Request;

class InfoKewpa21Controller extends Controller
{

  public function store(Request $request)
  {

    InfoKewpa21::create($request->all());

    return redirect('/kewpa21/' . $request->kewpa21_id);
  }



  public function update(Request $request, InfoKewpa21 $info_kewpa21)
  {

    $info_kewpa21->update($request->all());

    return redirect('/kewpa21/' . $info_kewpa21->kewpa21_id);
  }

  public function destroy(InfoKewpa21 $info_kewpa21)
  {
    $info_kewpa21->delete();
    return redirect('/kewpa21/' . $info_kewpa21->kewpa21_id);
  }
}
