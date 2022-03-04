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
            'kodstor' => KodStor::all(),
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
                notify()->error('Nama Perihal: ' . $request->perihal_barang[$i] . ' tidak wujud');
                return back()->withInput();
            }
        }

        if ($request->maklumat_pengangkutan == "Lain-lain") {
            $request['maklumat_pengangkutan'] = $request->mp_lain_lain;
        }

        $kewps1 = kewps1::create($request->all());
        for ($i = 0; $i < count($request->perihal_barang); $i++) {
            $noKod = KodStor::where('perihal', $request->perihal_barang[$i])->first();
            $no_kod = $noKod->no_kad . "-" . $noKod->kategori_stor . "-" . $noKod->kod_stor;

            $unit_ukuran = $noKod->unit_ukuran;

            InfoKewps1::create([
                'no_kod' => $no_kod,
                'kewps1_id' => $kewps1->id,
                'perihal_barang' => $request->perihal_barang[$i],
                'unit_pengukuran' => $unit_ukuran,
                'kuantiti_dipesan' => $request->kuantiti_dipesan[$i],
                'kuantiti_do' => $request->kuantiti_do[$i],
                'kuantiti_diterima' => $request->kuantiti_diterima[$i],
                'harga_seunit' => $request->harga_seunit[$i],
                'jumlah_harga' => $request->jumlah_harga[$i],
                'catatan' => $request->catatan[$i],
            ]);

            $baki_semasa = $noKod->baki_stok_semasa;
            $noKod->update([
                'baki_stok_semasa' => $request->kuantiti_diterima[$i] + $baki_semasa,
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

        foreach ($kewps1->infokewps1 as $ik1) {
            $kodStor = KodStor::where('perihal', $ik1->perihal_barang)->first();

            $nilai_semasa = (int) $kodStor->baki_stok_semasa - (int) $ik1->kuantiti_diterima;

            $kodStor->update([
                'baki_stok_semasa' => $nilai_semasa,
            ]);
        }

        $kewps1->update([
            'status' => 'DIBUANG',
        ]);

        return redirect('/kewps1');
    }

    public function generatePdf(Request $request, kewps1 $kewps1)
    {
        $infoKewps1 = InfoKewps1::where('kewps1_id', $kewps1->id)->get();
        $kewps1->data = $infoKewps1;

        $kewps1['newid'] = "BTB/" . sprintf("%'.07d\n", $kewps1->id);

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
