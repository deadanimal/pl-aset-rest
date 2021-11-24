<?php

namespace App\Http\Controllers;

use App\Models\InfoKewatk4;
use Illuminate\Http\Request;

class InfoKewatk4Controller extends Controller
{
    public function index()
    {
      return InfoKewatk4::all();
    }

    public function store(Request $request)
    {
      
      InfoKewatk4::create($request->all()); 
      return redirect('/kewatk4/'.$request -> kewatk4_id);
      
    }

    public function show(InfoKewatk4 $info_kewatk4)
    {
      return $info_kewatk4;
    }

    public function update(Request $request, InfoKewatk4 $info_kewatk4)
    {


      $info_kewatk4->update($request->all());
      return redirect('/kewatk4/'.$request -> kewatk4_id);

    }

    public function destroy(InfoKewatk4 $info_kewatk4)
    {
      return $info_kewatk4->delete();
      return redirect('/kewatk4/'.$request -> kewatk4_id);
    }
}
