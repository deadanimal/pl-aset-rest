<?php

namespace App\Http\Controllers;

use App\Models\InfoKewps1;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class InfoKewps1Controller extends Controller
{



    public function store(Request $request)
    {
        $no_sekarang = sprintf("%'.07d\n", count(InfoKewps1::all()) + 1);
        $tahun_ini = substr(date("Y"), -2);
        $no_kod = array("PL", "KPES", "PA", "HI", $tahun_ini, $no_sekarang);
        $no_kod = implode(" /", $no_kod);
        $no_kod = trim(preg_replace('/\s\s+/', ' ', $no_kod));
        $request['no_kod'] = $no_kod;

        InfoKewps1::create($request->all());

        return redirect('/kewps1/' . $request->kewps1_id);
    }



    public function update(Request $request, InfoKewps1 $info_kewps1)
    {

        $info_kewps1->update($request->all());

        return redirect('/kewps1/' . $info_kewps1->kewps1_id);
    }


    public function destroy(InfoKewps1 $info_kewps1)
    {
        $info_kewps1->delete();
        return redirect('/kewps1/' . $info_kewps1->kewps1_id);
    }
}
