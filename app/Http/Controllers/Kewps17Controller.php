<?php

namespace App\Http\Controllers;

use App\Models\InfoKewps1;
use App\Models\InfoKewps17;
use App\Models\Kewps3a;
use App\Models\Kewps17;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class Kewps17Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('modul.stor.kewps17.index', [
            'kewps17' => Kewps17::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('modul.stor.kewps17.create', [
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
        $kewps17 = Kewps17::create($request->all());

        foreach (range(0, count($request->kewps3a_id) - 1) as $i) {
            InfoKewps17::create([
                'kewps17_id' => $kewps17->id,
                'kewps3a_id' => $request->kewps3a_id[$i],
                'kuantiti_dimohon' => $request->kuantiti_dimohon[$i],
                'kuantiti_dilulus' => $request->kuantiti_dilulus[$i],
                'catatan' => $request->catatan[$i],
            ]);
        }
        return redirect('/kewps17');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kewps17  $kewps17
     * @return \Illuminate\Http\Response
     */
    public function show(Kewps17 $kewps17)
    {
        return view('modul.stor.kewps17.edit', [
            'kewps17' => $kewps17,
            'kewps3a' => Kewps3a::all(),
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kewps17  $kewps17
     * @return \Illuminate\Http\Response
     */
    public function edit(Kewps17 $kewps17)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kewps17  $kewps17
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kewps17 $kewps17)
    {
        $kewps17->update($request->all());
        foreach (range(0, count($request->info17_id) - 1) as $i) {
            InfoKewps17::where('id', $request->info17_id[$i])->update([
                'kewps3a_id' => $request->kewps3a_id[$i],
                'kuantiti_dimohon' => $request->kuantiti_dimohon[$i],
                'kuantiti_dilulus' => $request->kuantiti_dilulus[$i],
                'catatan' => $request->catatan[$i],
            ]);
        }
        return redirect('/kewps17');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kewps17  $kewps17
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kewps17 $kewps17)
    {
        InfoKewps17::where('kewps17_id', $kewps17->id)->delete();
        $kewps17->delete();

        return redirect('/kewps17');
    }
    public function generatePdf(Kewps17 $kewps17)
    {
        $infokewps17 = InfoKewps17::where('kewps17_id', $kewps17->id)->get();

        $kewps17->data = $infokewps17;

        $harga_seunit = InfoKewps1::where('no_kod', $infokewps17[0]->kewps3a_id)->first()->harga_seunit;

        foreach ($kewps17->data as $ik17) {
            $ik17->jumlah = (int) $ik17->kuantiti_dilulus * (int) $harga_seunit;
        }

        $response = Http::post('https://libreoffice.prototype.com.my/cetak/kps17', [$kewps17]);

        $res = $response->getBody()->getContents();

        $url = "data:application/pdf;base64," . $res;

        $context = [
            "url" => $url,
            "title" => "kewps17",
        ];

        return view('modul.borang_viewer_ps', $context);

    }
}
