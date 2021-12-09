<?php

namespace App\Http\Controllers;

use App\Models\InfoKewps1;
use App\Models\InfoKewps35;
use App\Models\InfoKewps36;
use App\Models\Kewps3a;
use App\Models\Kewps34;
use App\Models\Kewps36;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class Kewps36Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('modul.stor.kewps36.index', [
            'kewps36' => Kewps36::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('modul.stor.kewps36.create', [
            'kewps34' => Kewps34::all(),
            'infokewps35' => InfoKewps35::all(),
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
        $kewps36 = Kewps36::create($request->all());
        foreach (range(0, count($request->kewps3a_id) - 1) as $i) {
            InfoKewps36::create([
                'kewps36_id' => $kewps36->id,
                'kewps3a_id' => $request->kewps3a_id[$i],
                'kewps34_id' => $request->kewps34_id[$i],
                'infokewps35_id' => $request->infokewps35_id[$i],
                'staff_id' => $request->staff_id,
                'tahun' => $request->tahun,
            ]);
        }
        return redirect('/kewps36');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kewps36  $kewps36
     * @return \Illuminate\Http\Response
     */
    public function show(Kewps36 $kewps36)
    {
        return view('modul.stor.kewps36.edit', [
            'kewps34' => Kewps34::all(),
            'infokewps35' => InfoKewps35::all(),
            'kewps3a' => Kewps3a::all(),
            'kewps36' => $kewps36,
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kewps36  $kewps36
     * @return \Illuminate\Http\Response
     */
    public function edit(Kewps36 $kewps36)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kewps36  $kewps36
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kewps36 $kewps36)
    {
        $kewps36->update($request->all());
        foreach (range(0, count($request->kewps3a_id) - 1) as $i) {
            InfoKewps36::where('id', $request->info36_id[$i])->update([
                'kewps3a_id' => $request->kewps3a_id[$i],
                'kewps34_id' => $request->kewps34_id[$i],
                'infokewps35_id' => $request->infokewps35_id[$i],
                'staff_id' => $request->staff_id,
                'tahun' => $request->tahun,
            ]);
        }

        return redirect('/kewps36');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kewps36  $kewps36
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kewps36 $kewps36)
    {
        InfoKewps36::where('kewps36_id', $kewps36->id)->delete();
        $kewps36->delete();
        return redirect('/kewps36');
    }

    public function generatePdf(Kewps36 $kewps36)
    {
        $hk_bilangan = 0;
        foreach ($kewps36->infokewps36 as $i36) {
            $kuantiti_asal = $i36->kewps3a->parasstok[0]->maksimum_stok;
            $harga_seunit = InfoKewps1::where('no_kod', $i36->kewps3a_id)->first()->harga_seunit;

            $kuantiti_k35[] = $i36->infokewps35->kuantiti;

            $i36->nilai_asal = (int) $kuantiti_asal * (int) $harga_seunit;
            $i36->nilai_semasa = ((int) $kuantiti_asal - (int) $i36->infokewps35->kuantiti) * (int) $harga_seunit;
        }

        $kewps36->bilangan_kes_surcaj = 1;

        $response = Http::post('https://libreoffice.prototype.com.my/cetak/kps36', [$kewps36]);

        $res = $response->getBody()->getContents();

        $url = "data:application/pdf;base64," . $res;

        $context = [
            "url" => $url,
            "title" => "kewps36",
        ];

        return view('modul.borang_viewer_ps', $context);

    }
}
