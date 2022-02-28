<?php

namespace App\Http\Controllers;

use App\Models\InfoKewps10;
use App\Models\Kewps3a;
use App\Models\Kewps4;
use App\Models\Kewps10;
use App\Models\KodJabatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class Kewps10Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('modul.stor.kewps10.index', [
            'kewps10' => Kewps10::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('modul.stor.kewps10.create', [
            'kewps4' => Kewps4::all(),
            'bahagian' => KodJabatan::all(),
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

        for ($i = 0; $i < count($request->kewps3a_id); $i++) {
            if ($request->kuantiti_perbezaan[$i] == null) {
                notify()->error('Kuantiti Perbezaan Tiada Nilai', 'Gagal');
                return back()->withInput();
            }
            if ($request->kuantiti_fizikal_stok[$i] > $request->maksimum_stok[$i]) {
                notify()->error('Kuantiti Fizikal melebihi Kuantiti Stok untuk No Kod ' . $request->no_kad[$i], 'Gagal');
                return back()->withInput();
            }
            $jumlah = $request->statusA[$i] + $request->statusB[$i] + $request->statusC[$i] + $request->statusD[$i] + $request->statusE[$i] + $request->statusF[$i];
            if ($jumlah > $request->kuantiti_fizikal_stok[$i]) {
                notify()->error('Jumlah status stok melebihi kuantiti stok untuk No Kod ' . $request->no_kad[$i], 'Gagal');
                return back()->withInput();

            }

        }

        $kewps10 = Kewps10::create($request->all());

        for ($i = 0; $i < count($request->kewps3a_id); $i++) {
            $ik10 = InfoKewps10::create([
                'kewps10_id' => $kewps10->id,
                'kewps3a_id' => $request->kewps3a_id[$i],
                'kuantiti_fizikal_stok' => $request->kuantiti_fizikal_stok[$i],
                'kuantiti_perbezaan' => $request->kuantiti_perbezaan[$i],
                'statusA' => $request->statusA[$i],
                'statusB' => $request->statusB[$i],
                'statusC' => $request->statusC[$i],
                'statusD' => $request->statusD[$i],
                'statusE' => $request->statusE[$i],
                'statusF' => $request->statusF[$i],
                'catatan' => $request->catatan[$i],
            ]);

            if ($request->selected == $i) {
                $ik10->update([
                    'selected' => 'selected',
                ]);
            }
        }
        notify()->success('', 'Berjaya Disimpan');
        return redirect('/kewps10');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kewps10  $kewps10
     * @return \Illuminate\Http\Response
     */
    public function show(Kewps10 $kewps10)
    {
        return view('modul.stor.kewps10.edit', [
            'kewps10' => $kewps10,
            'kewps3a' => Kewps3a::all(),
            'bahagian' => KodJabatan::all(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kewps10  $kewps10
     * @return \Illuminate\Http\Response
     */
    public function edit(Kewps10 $kewps10)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kewps10  $kewps10
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kewps10 $kewps10)
    {
        $kewps10->update($request->all());

        return redirect('kewps10');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kewps10  $kewps10
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kewps10 $kewps10)
    {
        InfoKewps10::where('kewps10_id', $kewps10->id)->delete();
        $kewps10->delete();
        return redirect('kewps10');
    }

    public function generatePdf(Kewps10 $kewps10)
    {
        $kewps10['newinfokewps10'] = InfoKewps10::where('selected', 'selected')->get();
        $newid = sprintf("%'.07d", $kewps10->id);
        $kewps10['newid'] = "BVS/" . $newid;
        $kewps10->nama_stor = $kewps10->infokewps10->first()->kewps3a->nama_stor;

        $kewps10->maksimum = $kewps10->infokewps10->first()->kewps3a->parasstok[0]->maksimum_stok;

        $response = Http::post('https://libreoffice.prototype.com.my/cetak/kps10', [$kewps10]);

        $res = $response->getBody()->getContents();

        $url = "data:application/pdf;base64," . $res;

        $context = [
            "url" => $url,
            "title" => "Kewps10",
        ];

        return view('modul.borang_viewer_ps', $context);
    }
}
