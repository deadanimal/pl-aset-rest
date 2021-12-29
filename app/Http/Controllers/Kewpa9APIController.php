<?php

namespace App\Http\Controllers;

use App\Models\Kewpa9;
use App\Models\InfoKewpa9;
use Illuminate\Http\Request;

class Kewpa9APIController extends Controller
{
    public function index()
    {
      return Kewpa9::all();
    }

    public function store(Request $request)
    {
      // save main model
      $kewpa9 = Kewpa9::create($request->all());

      // save info model
      foreach($request->info_kewpa9 as $ik9) {
        $info_kewpa9 = InfoKewpa9::create($ik9); 
        $info_kewpa9->kewpa9_id = $kewpa9->id;
        $info_kewpa9->save();
      }

      $data = [
        "kewpa9" => $kewpa9,
        "msg" => "kewpa9 and info_kewpa9 successfully created"
      ];
      
      return $data;
    }

    public function show(Kewpa9 $kewpa9)
    {
      return $kewpa9;
    }

    public function update(Request $request, Kewpa9 $kewpa9)
    {
      $kewpa9->update($request->all());

      foreach($request->info_kewpa9 as $ik9) {
        if (isset($ik9->id)) {
          $temp = InfoKewpa9::where('id', $ik9)->first();
          $temp->update($ik9);

        } else {
          $temp2 = InfoKewpa9::create($ik9);
          $temp2->kewpa9_id = $kewpa9->id;
          $temp2->save();
        }

      }

      return $kewpa9;

    }

    public function destroy(Kewpa9 $kewpa9)
    {
      return $kewpa9->delete();
    }

}
