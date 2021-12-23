<?php

namespace App\Http\Controllers;

use App\Models\Kewps3a;
use App\Models\InfoKewps10;
use Illuminate\Http\Request;

class InfoKewps10Controller extends Controller
{

    public function store(Request $request)
    {
        $kewps3a = Kewps3a::where('id', $request->kewps3a_id)->first();
        $kuantiti_stok = $kewps3a->parasstok->first()->maksimum_stok;
        $kuantiti_perbezaan = (int) $kuantiti_stok - (int) $request->kuantiti_fizikal_stok;

        $request['kuantiti_perbezaan'] = $kuantiti_perbezaan;
        InfoKewps10::create($request->all());

        return redirect('/kewps10/' . $request->kewps10_id);
    }


    public function update(Request $request, InfoKewps10 $infokewps10)
    {
        $kewps3a = Kewps3a::where('id', $request->kewps3a_id)->first();
        $kuantiti_stok = $kewps3a->parasstok->first()->maksimum_stok;
        $kuantiti_perbezaan = (int) $kuantiti_stok - (int) $request->kuantiti_fizikal_stok;

        $request['kuantiti_perbezaan'] = $kuantiti_perbezaan;
        $infokewps10->update($request->all());
        return redirect('/kewps10/' . $infokewps10->kewps10_id);
    }

    public function destroy(InfoKewps10 $infokewps10)
    {
        $infokewps10->delete();
        return redirect('/kewps10/' . $infokewps10->kewps10_id);
    }
}
