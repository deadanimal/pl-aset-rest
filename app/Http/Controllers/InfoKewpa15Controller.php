<?php

namespace App\Http\Controllers;

use App\Models\InfoKewpa15;
use App\Models\Kewpa3A;
use Illuminate\Http\Request;

class InfoKewpa15Controller extends Controller
{
    public function index()
    {
      return InfoKewpa15::all();
    }

    public function store(Request $request)
    {
      InfoKewpa15::create($request->all());
      return redirect('/kewpa15/'.$request->kewpa15_id.'/edit');
 
    }

    public function show(InfoKewpa15 $info_kewpa15)
    {
      return $info_kewpa15;
    }

    public function create() {

      $context = [
        "kewpa15" => \Session::get('kewpa15'),
        "kewpa3a" => Kewpa3A::all(),
      ];
      return view('modul.aset_alih.info_kewpa15.create', $context);

    }


    public function edit(InfoKewpa15 $info_kewpa15)
    {
      $context = [
        "info_kewpa15" => $info_kewpa15,
        "kewpa3a" => Kewpa3A::all(),
      ];

      return view('modul.aset_alih.info_kewpa15.edit', $context);

    }




    public function update(Request $request, InfoKewpa15 $info_kewpa15)
    {
      $info_kewpa15->update($request->all());
      return redirect('/kewpa15/'.$info_kewpa15->kewpa15_id.'/edit');

    }

    public function destroy(InfoKewpa15 $info_kewpa15)
    {
      return $info_kewpa15->delete();
    }



}
