<?php

namespace App\Http\Controllers;

use App\Models\InfoKewps1;
use App\Models\kewps1;
use App\Models\KodStor;
use App\Models\PembekalStor;
use App\Models\UnitUkuranStor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class Kewps1Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('modul.stor.kewps1.index', [
            'kewps1' => kewps1::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('modul.stor.kewps1.create', [
            'pembekal' => PembekalStor::all(),
            'unitukuran' => UnitUkuranStor::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        for ($i = 0; $i < count($request->perihal_barang); $i++) {
            $noKod = KodStor::where('perihal', $request->perihal_barang[$i])->first();
            if ($noKod == null) {
                return back()->with('error', "Perihal " . $request->perihal_barang[$i] . " tidak sah");
            }
            $no_kod = $noKod->no_kad . "-" . $noKod->kategori_stor . "-" . $noKod->kod_stor;
        }

        if ($request->maklumat_pengangkutan == "Lain-lain") {
            $request['maklumat_pengangkutan'] = $request->mp_lain_lain;
        }

        $kewps1 = kewps1::create($request->all());
        for ($i = 0; $i < count($request->perihal_barang); $i++) {
            $noKod = KodStor::where('perihal', $request->perihal_barang[$i])->first();
            $unit_ukuran = $noKod->unit_ukuran;

            $jumlah_harga = (int) $request->harga_seunit[$i] * (int) $request->kuantiti_diterima[$i];

            InfoKewps1::create([
                'no_kod' => $no_kod,
                'kewps1_id' => $kewps1->id,
                'perihal_barang' => $request->perihal_barang[$i],
                'unit_pengukuran' => $unit_ukuran,
                'kuantiti_dipesan' => $request->kuantiti_dipesan[$i],
                'kuantiti_do' => $request->kuantiti_do[$i],
                'kuantiti_diterima' => $request->kuantiti_diterima[$i],
                'harga_seunit' => $request->harga_seunit[$i],
                'jumlah_harga' => $jumlah_harga,
                'catatan' => $request->catatan[$i],
            ]);

            $noKod->update([
                'baki_stok_semasa' => $request->kuantiti_diterima[$i],
            ]);

        }

        return redirect('/kewps1');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\kewps1  $kewps1
     * @return \Illuminate\Http\Response
     */
    public function show(kewps1 $kewps1)
    {
        return view('modul.stor.kewps1.edit', [
            'kewps1' => $kewps1,
            'pembekal' => PembekalStor::all(),
            'unitukuran' => UnitUkuranStor::all(),
            'infokewps1' => InfoKewps1::where('kewps1_id', $kewps1->id)->get(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\kewps1  $kewps1
     * @return \Illuminate\Http\Response
     */
    public function edit(kewps1 $kewps1)
    {

        kewps1::where('id', $kewps1->id)->update([
            'status' => "HANTAR",
        ]);
        return redirect('/kewps1');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\kewps1  $kewps1
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, kewps1 $kewps1)
    {
        if ($request->maklumat_pengangkutan == "Lain-lain") {
            $request['maklumat_pengangkutan'] = $request->mp_lain_lain;
        }

        $kewps1->update($request->all());

        return redirect('/kewps1');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\kewps1  $kewps1
     * @return \Illuminate\Http\Response
     */
    public function destroy(kewps1 $kewps1)
    {

        InfoKewps1::where('kewps1_id', $kewps1->id)->delete();

        kewps1::destroy($kewps1->id);

        return redirect('/kewps1');
    }

    public function generatePdf(Request $request, kewps1 $kewps1)
    {
        $infoKewps1 = InfoKewps1::where('kewps1_id', $kewps1->id)->get();
        $kewps1->data = $infoKewps1;

        $kewps1['newid'] = sprintf("%'.07d\n", $kewps1->id);

        $response = Http::post('https://libreoffice.prototype.com.my/cetak/kps1', [$kewps1]);

        $res = $response->getBody()->getContents();

        $url = "data:application/pdf;base64," . $res;

        $context = [
            "url" => $url,
            "title" => "kewps1",
        ];

        return view('modul.borang_viewer_ps', $context);
    }
}
