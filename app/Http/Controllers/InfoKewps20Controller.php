<?php

namespace App\Http\Controllers;

use App\Models\InfoKewps20;
use Illuminate\Http\Request;

class InfoKewps20Controller extends Controller
{

    public function store(Request $request)
    {
        $infokewps20 = InfoKewps20::create($request->all());
        return redirect('/kewps20/' . $infokewps20->kewps20_id);
    }


    public function update(Request $request, InfoKewps20 $infokewps20)
    {
        $infokewps20->update($request->all());
        return redirect('/kewps20/' . $infokewps20->kewps20_id);
    }


    public function destroy(InfoKewps20 $infokewps20)
    {

        $infokewps20->delete();
        return redirect('/kewps20/' . $infokewps20->kewps20_id);
    }
}
