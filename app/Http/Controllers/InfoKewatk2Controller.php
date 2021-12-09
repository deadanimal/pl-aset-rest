<?php

namespace App\Http\Controllers;

use App\Models\InfoKewatk2;
use Illuminate\Http\Request;

class InfoKewatk2Controller extends Controller
{
    public function index()
    {
      return InfoKewatk2::all();
    }

    // deprecated
    public function store(Request $request)
    {
      InfoKewatk2::create($request->all());

      return redirect('/kewatk2/'.$request -> no_rujukan_atk2);

    }

    public function show(InfoKewatk2 $info_kewatk2)
    {
      return $info_kewatk2;
    }

    public function update(Request $request, InfoKewatk2 $info_kewatk2)
    {
      $info_kewatk2->update($request->all());

      return redirect('/kewatk2/'.$info_kewatk2 -> no_rujukan_atk2);
    }

    public function destroy(InfoKewatk2 $info_kewatk2)
    {
      return $info_kewatk2->delete();
      return redirect('/kewatk2/'.$request -> no_rujukan_atk2);
    }
}
