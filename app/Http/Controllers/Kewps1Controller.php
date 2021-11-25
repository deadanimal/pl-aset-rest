<?php

namespace App\Http\Controllers;

use App\Models\InfoKewps1;
use App\Models\kewps1;
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
        return view('modul.stor.kewps1.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $kewps1 = kewps1::create($request->all());
        $this->storeAset($request, $kewps1->id);
        return redirect('/kewps1');
    }
    public function storeAset($request, $kewps1_id)
    {
        if ($request->perihal_barang) {
            foreach (range(0, count($request->perihal_barang) - 1) as $i) {
                $jumlah_harga = (int) $request->harga_seunit * (int) $request->kuantiti_diterima;
                InfoKewps1::create([
                    'no_kod' => $request->no_kod[$i],
                    'kewps1_id' => $kewps1_id,
                    'perihal_barang' => $request->perihal_barang[$i],
                    'unit_pengukuran' => $request->unit_pengukuran[$i],
                    'kuantiti_dipesan' => $request->kuantiti_dipesan[$i],
                    'kuantiti_do' => $request->kuantiti_do[$i],
                    'kuantiti_diterima' => $request->kuantiti_diterima[$i],
                    'harga_seunit' => $request->harga_seunit[$i],
                    'jumlah_harga' => $jumlah_harga,
                    'catatan' => $request->catatan[$i],
                ]);
            }
        }
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

        $kewps1->update($request->all());

        if ($request->info_id) {
            foreach (range(0, count($request->info_id) - 1) as $i) {
                InfoKewps1::where('id', $request->info_id[$i])->update([
                    'perihal_barang' => $request->perihal_barang[$i],
                    'unit_pengukuran' => $request->unit_pengukuran[$i],
                    'kuantiti_dipesan' => $request->kuantiti_dipesan[$i],
                    'kuantiti_do' => $request->kuantiti_do[$i],
                    'kuantiti_diterima' => $request->kuantiti_diterima[$i],
                    'harga_seunit' => $request->harga_seunit[$i],
                    'jumlah_harga' => $request->jumlah_harga[$i],
                    'catatan' => $request->catatan[$i],
                ]);
            }
        }

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

        // dd($kewps1);

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
