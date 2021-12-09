<?php

namespace App\Http\Controllers;

use App\Models\InfoKewatk1;
use Illuminate\Http\Request;

class InfoKewatk1Controller extends Controller
{
    public function index()
    {
      return InfoKewatk1::all();
    }

    public function store(Request $request)
    {

      InfoKewatk1::create($request->all());

      return redirect('/kewatk1/'.$request ->no_rujukan);
      
    }

    public function show($no_rujukan_atk1)
    {
      return InfoKewatk1::where('no_rujukan', $no_rujukan_atk1)->get();
    }

    public function update(Request $request, InfoKewatk1 $info_kewatk1)
    {
      $info_kewatk1->update($request->all());
      return redirect('/kewatk1/'.$info_kewatk1->no_rujukan);

    }

    public function destroy(Request $request, InfoKewatk1 $info_kewatk1)
    {
      $info_kewatk1->delete();
      return redirect('/kewatk1/'.$request -> $info_kewatk1-> no_rujukan);
    }
}
