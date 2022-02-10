<?php

namespace App\Http\Controllers;

use App\Models\InfoKewps7;
use App\Models\Kewps7;
use App\Models\Kewps9;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class Kewps9Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('modul.stor.kewps9.index', [
            'kewps9' => Kewps9::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('modul.stor.kewps9.create', [
            'kewps7' => Kewps7::all(),
            'infokewps7' => InfoKewps7::all(),
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

        for ($i = 0; $i < count($request->infokewps7_id); $i++) {
            $infokewps7 = InfoKewps7::where('id', $request->infokewps7_id[$i])->firstOrFail();
            $infokewps7->update([
                'pembungkusan' => $request->pembungkusan[$i],
            ]);
            Kewps9::create([
                'infokewps7_id' => $request->infokewps7_id[$i],
                'pembungkus_id' => $request->pembungkus_id,
                'status' => $request->status,
                'kuantiti_dibungkus' => $request->kuantiti_dibungkus[$i],
                'maklumat_bungkusan' => $request->maklumat_bungkusan[$i],
                'maklumat_penghantaran' => $request->maklumat_penghantaran[$i],
                'pemeriksa_id' => 'not yet',
                'penerima_id' => 'not yet',
            ]);
        }

        return redirect('/kewps9');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kewps9  $kewps9
     * @return \Illuminate\Http\Response
     */
    public function show(Kewps9 $kewps9)
    {
        return view('modul.stor.kewps9.edit', [
            'infokewps7' => InfoKewps7::all(),
            'kewps9' => $kewps9,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kewps9  $kewps9
     * @return \Illuminate\Http\Response
     */
    public function edit(Kewps9 $kewps9)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kewps9  $kewps9
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kewps9 $kewps9)
    {
        $kewps9->update($request->all());
        return redirect('/kewps9');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kewps9  $kewps9
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kewps9 $kewps9)
    {
        $kewps9->delete();
        return redirect('/kewps9');
    }

    public function generatePdf(Kewps9 $kewps9)
    {
        $kewps7 = Kewps7::all()->get(0);
        $kewps9->data = $kewps9->all();

        //(BPS/0000001)
        $newid = sprintf('%07d', $kewps9->id);
        $kewps9['newid'] = "BPS/" . $newid;

        $kewps9->nama_pemohon = $kewps7->nama_stor_pemesan;
        $kewps9->alamat_pemohon = $kewps7->alamat_stor_pemesan;
        $kewps9->nama_pengeluar = $kewps7->nama_stor_pengeluar;
        $kewps9->alamat_pengeluar = $kewps7->alamat_stor_pengeluar;

        $response = Http::post('https://libreoffice.prototype.com.my/cetak/kps9', [$kewps9]);

        $res = $response->getBody()->getContents();

        $url = "data:application/pdf;base64," . $res;

        $context = [
            "url" => $url,
            "title" => "Kewps9",
        ];

        return view('modul.borang_viewer_ps', $context);

    }
}
