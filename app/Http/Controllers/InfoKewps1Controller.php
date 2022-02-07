<?php

namespace App\Http\Controllers;

use App\Models\InfoKewps1;
use App\Models\KodStor;
use Illuminate\Http\Request;

class InfoKewps1Controller extends Controller
{

    public function store(Request $request)
    {
        $noKod = KodStor::where('perihal', $request->perihal_barang)->first();
        if ($noKod == null) {
            return back()->with('error', "Perihal " . $request->perihal_barang . " tidak sah");
        }
        $no_kod = $noKod->no_kad . "-" . $noKod->kategori_stor . "-" . $noKod->kod_stor;

        $request['no_kod'] = $no_kod;

        InfoKewps1::create($request->all());

        return redirect('/kewps1/' . $request->kewps1_id);
    }

    public function update(Request $request, InfoKewps1 $info_kewps1)
    {
        $noKod = KodStor::where('perihal', $request->perihal_barang)->first();
        if ($noKod == null) {
            return back()->with('error', "Perihal " . $request->perihal_barang . " tidak sah");
        }
        $no_kod = $noKod->no_kad . "-" . $noKod->kategori_stor . "-" . $noKod->kod_stor;

        $request['no_kod'] = $no_kod;

        $request['unit_pengukuran'] = $noKod->unit_ukuran;

        $info_kewps1->update($request->all());

        return redirect('/kewps1/' . $info_kewps1->kewps1_id);
    }

    public function destroy(InfoKewps1 $info_kewps1)
    {
        $info_kewps1->delete();
        return redirect('/kewps1/' . $info_kewps1->kewps1_id);
    }
}
