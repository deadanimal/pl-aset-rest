<?php

namespace App\Http\Controllers;

use App\Models\InfoKewps1;
use App\Models\InfoKewps10;
use App\Models\InfoKewps15;
use App\Models\kewps1;
use App\Models\Kewps3a;
use App\Models\Kewps10;
use App\Models\Kewps15;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class Kewps15Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('modul.stor.kewps15.index', [
            'kewps15' => Kewps15::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('modul.stor.kewps15.create', [
            'infokewps10' => InfoKewps10::all(),
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
        // dd($request->all());
        $infokewps10 = InfoKewps10::where('id', $request->infokewps10_id)->first();
        $request['agensi'] = $infokewps10->kewps10->kementerian;
        $request['kategori_stor'] = $infokewps10->kewps10->kategori_stor;
        $request['pegawai_menyediakan'] = Auth::user()->id;
        $request['pegawai_mengesahkan'] = Auth::user()->id;

        $kewps15 = Kewps15::create($request->all());

        foreach (range(0, count($request->kewps3a_id) - 1) as $i) {
            $kewps3a = Kewps3a::where('id', $request->kewps3a_id[$i])->first();
            $kuantiti_kad_daftar = $kewps3a->parasstok[0]->maksimum_stok;
            $perbezaan = (int) $request->kuantiti_fizikal[$i] - (int) $kuantiti_kad_daftar;
            InfoKewps15::create([
                'kuantiti_fizikal' => $request->kuantiti_fizikal[$i],
                'kuantiti_perbezaan' => $perbezaan,
                'justifikasi' => $request->justifikasi[$i],
                'status_kelulusan' => "Belum Dinilai",
                'infokewps10_id' => $request->infokewps10_id,
                'kewps15_id' => $kewps15->id,
                'kewps3a_id' => $kewps3a->id,
            ]);

        }

        return redirect('kewps15');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kewps15  $kewps15
     * @return \Illuminate\Http\Response
     */
    public function show(Kewps15 $kewps15)
    {

        $infokewps15 = InfoKewps15::where('kewps15_id', $kewps15->id)->get();

        return view('modul.stor.kewps15.edit', [
            'kewps15' => $kewps15,
            'infokewps15' => $infokewps15,
            'kewps3a' => Kewps3a::all(),
            'infokewps10' => InfoKewps10::all(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kewps15  $kewps15
     * @return \Illuminate\Http\Response
     */
    public function edit(Kewps15 $kewps15)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kewps15  $kewps15
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kewps15 $kewps15)
    {
        $kewps15->update($request->all());

        if ($request->infoid) {
            foreach (range(0, count($request->kewps3a_id) - 1) as $i) {
                $kewps3a = Kewps3a::where('id', $request->kewps3a_id[0])->first();
                $kuantiti_kad_daftar = $kewps3a->parasstok[0]->maksimum_stok;
                $perbezaan = (int) $request->kuantiti_fizikal[$i] - (int) $kuantiti_kad_daftar;

                InfoKewps15::where('id', $request->infoid[$i])->update([
                    'kuantiti_fizikal' => $request->kuantiti_fizikal[$i],
                    'kuantiti_perbezaan' => $perbezaan,
                    'justifikasi' => $request->justifikasi[$i],
                    'status_kelulusan' => "Belum Dinilai",
                    'infokewps10_id' => $request->infokewps10_id,
                    'kewps15_id' => $kewps15->id,
                    'kewps3a_id' => $kewps3a->id,
                ]);

            }
        }

        return redirect('/kewps15');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kewps15  $kewps15
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kewps15 $kewps15)
    {
        InfoKewps15::where('kewps15_id', $kewps15->id)->delete();
        $kewps15->delete();
        return redirect('/kewps15');
    }

    public function generatePdf(Kewps15 $kewps15)
    {
        $infokewps15 = InfoKewps15::where('kewps15_id', $kewps15->id)->get();

        $kewps15->data = $infokewps15;

        $kewps1 = InfoKewps1::where('no_kod', $infokewps15[0]->kewps3a_id)->first();

        foreach ($kewps15->data as $d) {
            $d->tarikh = $d->created_at->format('m/d/Y');
            $d->kuantiti_kad = $d->kewps3a->parasstok[0]->maksimum_stok;
            $d->nilai_kad = (int) $d->kuantiti_kad * (int) $kewps1->harga_seunit;
            $d->nilai_fizikal = (int) $d->kuantiti_fizikal * (int) $kewps1->harga_seunit;
            $d->nilai_perbezaan = (int) $d->kuantiti_perbezaan * (int) $kewps1->harga_seunit;
        }

        $response = Http::post('https://libreoffice.prototype.com.my/cetak/kps15', [$kewps15]);

        $res = $response->getBody()->getContents();

        $url = "data:application/pdf;base64," . $res;

        $context = [
            "url" => $url,
            "title" => "kewps15",
        ];

        return view('modul.borang_viewer_ps', $context);

    }
}
