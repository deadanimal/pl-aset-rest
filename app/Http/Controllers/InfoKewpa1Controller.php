<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InfoKewpa1;

class InfoKewpa1Controller extends Controller
{
    public function index()
    {
      return infoKewpa1::all();

    }

    public function store(Request $request)
    {
      InfoKewpa1::create($request->all());

      return redirect('/kewpa1/'.$request -> rujukan_kewpa1_id);

    }

    public function show(InfoKewpa1 $info_kewpa1)
    {
      return $info_kewpa1;
    }


    public function update(Request $request, InfoKewpa1 $info_kewpa1)
    {

      $info_kewpa1->update($request->all());
      return redirect('/kewpa1/'.$info_kewpa1->rujukan_kewpa1_id);

    }

    public function destroy(Request $request,InfoKewpa1 $info_kewpa1)
    {
      $info_kewpa1->delete();
      return redirect('/kewpa1/'.$request -> rujukan_kewpa1_id);

    }

}
