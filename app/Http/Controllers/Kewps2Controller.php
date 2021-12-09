<?php

namespace App\Http\Controllers;

use App\Models\InfoKewps1;
use App\Models\InfoKewps2;
use App\Models\kewps1;
use App\Models\Kewps2;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class Kewps2Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('modul.stor.kewps2.index', [
            'kewps2' => Kewps2::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('modul.stor.kewps2.create', [
            'kewps1' => kewps1::all(),
            'infokewps1' => InfoKewps1::all(),
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
        $request['pegawai_penerima'] = Auth::user()->name;
        $kewps2 = Kewps2::create($request->all());
        $this->storeInfoKewps2($request, $kewps2->id);
        return redirect('/kewps2');
    }

    public function storeInfoKewps2($request, $kewps2_id)
    {
        foreach (range(0, count($request->kuantiti_ditolak) - 1) as $i) {
            $infokewps1 = InfoKewps1::where('id', $request->infokewps1_id[$i])->firstorfail();
            $kurang_lebih = $infokewps1->kuantiti_diterima - $request->kuantiti_ditolak[$i];
            $temp = (object) [];
            $temp->kuantiti_ditolak = $request->kuantiti_ditolak[$i];
            $temp->kuantiti_kurang_lebih = $kurang_lebih;
            $temp->sebab_penolakan = $request->sebab_penolakan[$i];
            $temp->kewps2_id = $kewps2_id;
            $temp->infokewps1_id = $request->infokewps1_id[$i];
            (new InfoKewps2Controller)->store($temp);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kewps2  $kewps2
     * @return \Illuminate\Http\Response
     */
    public function show(Kewps2 $kewps2)
    {
        return view('modul.stor.kewps2.edit', [
            'kewps2' => $kewps2,
            'kewps1' => kewps1::all(),
            'infokewps2' => InfoKewps2::where('kewps2_id', $kewps2->id)->get(),
            'infokewps1' => InfoKewps1::where('kewps1_id', $kewps2->kewps1->id)->get(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kewps2  $kewps2
     * @return \Illuminate\Http\Response
     */
    public function edit(Kewps2 $kewps2)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kewps2  $kewps2
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kewps2 $kewps2)
    {
        Kewps2::where('id', $kewps2->id)->update([
            'tindakan' => $request->tindakan,
            'pegawai_penerima' => Auth::user()->name,
        ]);

        return redirect('/kewps2');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kewps2  $kewps2
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kewps2 $kewps2)
    {
        InfoKewps2::where('kewps2_id', $kewps2->id)->delete();

        Kewps2::destroy($kewps2->id);

        return redirect('/kewps2');
    }

    public function getDinamic(Request $request)
    {
        $data = InfoKewps1::select('id', 'no_kod')->where('kewps1_id', $request->id)->get();

        return response()->json($data);
    }


    public function generatePdf(Request $request, Kewps2 $kewps2)
    {
        $infoKewps2 = InfoKewps2::where('kewps2_id', $kewps2->id)->get();
        $kewps2->data = $infoKewps2;

        // $kewps1 = kewps1::where('id', $kewps2->kewps1_id)->get()->first();

        // dd($kewps2->infokewps1->perihal_barang);

        $response = Http::post('https://libreoffice.prototype.com.my/cetak/kps2', [$kewps2]);

        $res = $response->getBody()->getContents();

        $url = "data:application/pdf;base64," . $res;

        $context = [
            "url" => $url,
        ];

        return view('modul.borang_viewer', $context);
    }
}
