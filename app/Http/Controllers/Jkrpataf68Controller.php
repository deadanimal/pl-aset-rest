<?php

namespace App\Http\Controllers;

use App\Models\DataTanah;
use App\Models\Jkrpataf68;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class Jkrpataf68Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('modul.aset_tak_alih.jkrpataf68.index', [
            'jkrpataf68' => Jkrpataf68::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('modul.aset_tak_alih.jkrpataf68.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $jkrpataf68 = Jkrpataf68::create($request->all());
        foreach (range(0, count($request->pemilikan_tarikh) - 1) as $i) {
            DataTanah::create([
                'jkrpataf68_id' => $jkrpataf68->id,
                'pemilikan_tarikh' => $request->pemilikan_tarikh[$i],
                'pemilikan_kos' => $request->pemilikan_kos[$i],
                'mukim_bandar' => $request->mukim_bandar[$i],
                'hakmilik_jenis' => $request->hakmilik_jenis[$i],
                'hakmilik_nombor' => $request->hakmilik_nombor[$i],
                'lot_nombor' => $request->lot_nombor[$i],
                'lot_luas' => $request->lot_luas[$i],
                'status' => $request->status[$i],
                'tarikh_ptp' => $request->tarikh_ptp[$i],
                'catatan' => $request->catatan[$i],
            ]);
        }

        return redirect('/jkrpataf68');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Jkrpataf68  $jkrpataf68
     * @return \Illuminate\Http\Response
     */
    public function show(Jkrpataf68 $jkrpataf68)
    {
        return view('modul.aset_tak_alih.jkrpataf68.edit', [
            'jkrpataf68' => $jkrpataf68,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Jkrpataf68  $jkrpataf68
     * @return \Illuminate\Http\Response
     */
    public function edit(Jkrpataf68 $jkrpataf68)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Jkrpataf68  $jkrpataf68
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Jkrpataf68 $jkrpataf68)
    {
        $jkrpataf68->update($request->all());
        foreach (range(0, count($request->pemilikan_tarikh) - 1) as $i) {
            DataTanah::where('id', $request->datatanah_id[$i])->update([
                'pemilikan_tarikh' => $request->pemilikan_tarikh[$i],
                'pemilikan_kos' => $request->pemilikan_kos[$i],
                'mukim_bandar' => $request->mukim_bandar[$i],
                'hakmilik_jenis' => $request->hakmilik_jenis[$i],
                'hakmilik_nombor' => $request->hakmilik_nombor[$i],
                'lot_nombor' => $request->lot_nombor[$i],
                'lot_luas' => $request->lot_luas[$i],
                'status' => $request->status[$i],
                'tarikh_ptp' => $request->tarikh_ptp[$i],
                'catatan' => $request->catatan[$i],
            ]);
        }
        return redirect('/jkrpataf68');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Jkrpataf68  $jkrpataf68
     * @return \Illuminate\Http\Response
     */
    public function destroy(Jkrpataf68 $jkrpataf68)
    {
        DataTanah::where('jkrpataf68_id', $jkrpataf68->id)->delete();
        $jkrpataf68->delete();
        return redirect('/jkrpataf68');
    }

    public function generatePdf(Jkrpataf68 $jkrpataf68)
    {

        $response = Http::post('https://libreoffice.prototype.com.my/cetak/ata68', [$jkrpataf68]);

        $res = $response->getBody()->getContents();

        $url = "data:application/pdf;base64," . $res;

        $context = [
            "url" => $url,
            "title" => "jkrpataf68",
        ];

        return view('modul.borang_viewer_ata', $context);

    }
}
