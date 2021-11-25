<?php

namespace App\Http\Controllers;

use App\Models\InfoKewps10;
use App\Models\Kewps3a;
use App\Models\Kewps10;
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
            'kewps3a' => Kewps3a::all(),
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
        $kewps10 = Kewps10::create($request->all());
        $this->storeAset($request, $kewps10->id);
        return redirect('/kewps10');
    }
    public function storeAset($request, $kewps10_id)
    {
        if ($request->kewps3a_id) {
            foreach (range(0, count($request->kewps3a_id) - 1) as $i) {
                $kewps3a = Kewps3a::where('id', $request->kewps3a_id[$i])->first();
                $kuantiti_stok = $kewps3a->parasstok->first()->maksimum_stok;
                $kuantiti_perbezaan = (int) $kuantiti_stok - (int) $request->kuantiti_fizikal_stok[$i];

                InfoKewps10::create([
                    'kewps10_id' => $kewps10_id,
                    'kewps3a_id' => $request->kewps3a_id[$i],
                    'kuantiti_fizikal_stok' => $request->kuantiti_fizikal_stok[$i],
                    'kuantiti_perbezaan' => $kuantiti_perbezaan,
                    'catatan' => $request->catatan[$i],
                    'statusA' => $request->statusA[$i],
                    'statusB' => $request->statusB[$i],
                    'statusC' => $request->statusC[$i],
                    'statusD' => $request->statusD[$i],
                    'statusE' => $request->statusE[$i],
                    'statusF' => $request->statusF[$i],

                ]);
            }
        }
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
            'infokewps10' => InfoKewps10::where('kewps10_id', $kewps10->id)->get(),
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

        if ($request->info_id) {
            foreach (range(0, count($request->info_id) - 1) as $i) {
                $kewps3a = Kewps3a::where('id', $request->kewps3a_id[$i])->first();
                $kuantiti_stok = $kewps3a->parasstok->first()->maksimum_stok;
                $kuantiti_perbezaan = (int) $kuantiti_stok - (int) $request->kuantiti_fizikal_stok[$i];

                InfoKewps10::where('id', $request->info_id[$i])->update([
                    'kewps3a_id' => $request->kewps3a_id[$i],
                    'kuantiti_fizikal_stok' => $request->kuantiti_fizikal_stok[$i],
                    'kuantiti_perbezaan' => $kuantiti_perbezaan,
                    'catatan' => $request->catatan[$i],
                    'statusA' => $request->statusA[$i],
                    'statusB' => $request->statusB[$i],
                    'statusC' => $request->statusC[$i],
                    'statusD' => $request->statusD[$i],
                    'statusE' => $request->statusE[$i],
                    'statusF' => $request->statusF[$i],
                ]);
            }
        }

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
