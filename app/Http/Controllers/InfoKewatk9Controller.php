<?php

namespace App\Http\Controllers;

use App\Models\InfoKewatk9;
use Illuminate\Http\Request;

class InfoKewatk9Controller extends Controller
{
    public function index()
    {
      return InfoKewatk9::all();
    }

    public function store(Request $request)
    {
      InfoKewatk9::create($request->all());
      return redirect('/kewatk9/'.$request->no_rujukan_atk9);
    }

    public function show($kewatk9)
    {
      $info_kewatk9 = InfoKewatk9::where('no_rujukan_atk9', $kewatk9)->get();
      return $info_kewatk9;
    }

    public function update(Request $request, InfoKewatk9 $info_kewatk9)
    {
      $info_kewatk9->update($request->all());
      return redirect('/kewatk9/'.$request->no_rujukan_atk9);

    }

    public function destroy(InfoKewatk9 $info_kewatk9)
    {
      $info_kewatk9->delete();
      return redirect('/kewatk9/'.$request->no_rujukan_atk9);
    }
}
