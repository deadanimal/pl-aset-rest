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

        for ($i = 0; $i < count($request->kuantiti_ditolak); $i++) {
            if ($request->kuantiti_ditolak[$i] != null) {
                $infokewps1 = InfoKewps1::where('id', $request->infokewps1_id[$i])->firstorfail();
                $kurang_lebih = $infokewps1->kuantiti_diterima - $request->kuantiti_ditolak[$i];

                InfoKewps2::create([
                    'kuantiti_ditolak' => $request->kuantiti_ditolak[$i],
                    'kuantiti_kurang_lebih' => $kurang_lebih,
                    'sebab_penolakan' => $request->sebab_penolakan[$i],
                    'kewps2_id' => $kewps2->id,
                    'infokewps1_id' => $request->infokewps1_id[$i],
                ]);
            }
        }

        return redirect('/kewps2');
    }



    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kewps2  $kewps2
     * @return \Illuminate\Http\Response
     */
    public function show(Kewps2 $kewps2)
    {


        $created_infokewps1 = array();

        foreach ($kewps2->infokewps2 as $ik2) {
            array_push($created_infokewps1, $ik2->infokewps1_id);
        }

        return view('modul.stor.kewps2.edit', [
            'kewps2' => $kewps2,
            'kewps1' => kewps1::all(),
            'checkinfo1' => $created_infokewps1
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
        $kewps2->update([
            'status' => "LULUS"
        ]);

        return view('modul.stor.kewps2.index', [
            'kewps2' => Kewps2::all(),
        ]);
    }
    public function editfromkewps1(Kewps1 $kewps1)
    {
        return view('modul.stor.kewps2.minus', [
            'kewps1' => $kewps1,
        ]);
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
            "title" => "kewps2",
        ];

        return view('modul.borang_viewer_ps', $context);
    }
}
