<?php

namespace App\Http\Controllers;

use App\Models\KeluaranStokSukuTahun;
use App\Models\Kewps3a;
use App\Models\ParasStok;
use App\Models\TerimaanStokSukuTahun;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class Kewps3aController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('modul.stor.kewps3a.index', [
            'kewps3a' => Kewps3a::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('modul.stor.kewps3a.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->staff_id = 1;

        $kewps3a = Kewps3a::create($request->all());
        $this->storeAset($request, $kewps3a->id);
        return redirect('/kewps3a');
    }

    public function storeAset($request, $kewps3a_id)
    {

        foreach (range(0, count($request->tahun_paras_stok) - 1) as $i) {
            ParasStok::create([
                'kewps3a_id' => $kewps3a_id,
                'tahun_paras_stok' => $request->tahun_paras_stok[$i],
                'maksimum_stok' => $request->maksimum_stok[$i],
                'menokok_stok' => $request->menokok_stok[$i],
                'minimum_stok' => $request->minimum_stok[$i],
            ]);
        }

        foreach (range(0, count($request->tahun_terima_stok) - 1) as $i) {
            TerimaanStokSukuTahun::create([
                'kewps3a_id' => $kewps3a_id,
                'tahun_terima_stok' => $request->tahun_terima_stok[$i],
                'kuantiti_terima_stok_pertama' => $request->kuantiti_terima_stok_pertama[$i],
                'nilai_terima_stok_pertama' => $request->nilai_terima_stok_pertama[$i],
                'kuantiti_terima_stok_kedua' => $request->kuantiti_terima_stok_kedua[$i],
                'nilai_terima_stok_kedua' => $request->nilai_terima_stok_kedua[$i],
                'nilai_terima_stok_ketiga' => $request->nilai_terima_stok_ketiga[$i],
                'kuantiti_terima_stok_keempat' => $request->kuantiti_terima_stok_keempat[$i],
                'nilai_terima_stok_keempat' => $request->nilai_terima_stok_keempat[$i],
            ]);
        }

        foreach (range(0, count($request->tahun_terima_stok) - 1) as $i) {
            KeluaranStokSukuTahun::create([
                'kewps3a_id' => $kewps3a_id,
                'tahun_keluar_stok' => $request->tahun_keluar_stok[$i],
                'kuantiti_keluar_stok_pertama' => $request->kuantiti_keluar_stok_pertama[$i],
                'nilai_kuantiti_keluar_pertama' => $request->nilai_kuantiti_keluar_pertama[$i],
                'kuantiti_keluar_stok_kedua' => $request->kuantiti_keluar_stok_kedua[$i],
                'nilai_kuantiti_keluar_kedua' => $request->nilai_kuantiti_keluar_kedua[$i],
                'kuantiti_keluar_stok_ketiga' => $request->kuantiti_keluar_stok_ketiga[$i],
                'nilai_kuantiti_keluar_ketiga' => $request->nilai_kuantiti_keluar_ketiga[$i],
                'kuantiti_keluar_stok_keempat' => $request->kuantiti_keluar_stok_keempat[$i],
                'nilai_kuantiti_keluar_keempat' => $request->nilai_kuantiti_keluar_keempat[$i],
            ]);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kewps3a  $kewps3a
     * @return \Illuminate\Http\Response
     */
    public function show(Kewps3a $kewps3a)
    {
        return view('modul.stor.kewps3a.edit', [
            'kewps3a' => $kewps3a,
            'parasStok' => ParasStok::where('kewps3a_id', $kewps3a->id)->get(),
            'terimaan' => TerimaanStokSukuTahun::where('kewps3a_id', $kewps3a->id)->get(),
            'keluaran' => KeluaranStokSukuTahun::where('kewps3a_id', $kewps3a->id)->get(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kewps3a  $kewps3a
     * @return \Illuminate\Http\Response
     */
    public function edit(Kewps3a $kewps3a)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kewps3a  $kewps3a
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kewps3a $kewps3a)
    {
        $kewps3a->update($request->all());

        if ($request->paras_stok_id) {
            foreach (range(0, count($request->paras_stok_id) - 1) as $i) {
                ParasStok::where('id', $request->paras_stok_id[$i])->update([
                    'tahun_paras_stok' => $request->tahun_paras_stok[$i],
                    'maksimum_stok' => $request->maksimum_stok[$i],
                    'menokok_stok' => $request->menokok_stok[$i],
                    'minimum_stok' => $request->minimum_stok[$i],
                ]);
            }
        }
        if ($request->terimaan_id) {
            foreach (range(0, count($request->terimaan_id) - 1) as $i) {
                TerimaanStokSukuTahun::where('id', $request->terimaan_id[$i])->update([
                    'tahun_terima_stok' => $request->tahun_terima_stok[$i],
                    'kuantiti_terima_stok_pertama' => $request->kuantiti_terima_stok_pertama[$i],
                    'nilai_terima_stok_pertama' => $request->nilai_terima_stok_pertama[$i],
                    'kuantiti_terima_stok_kedua' => $request->kuantiti_terima_stok_kedua[$i],
                    'nilai_terima_stok_kedua' => $request->nilai_terima_stok_kedua[$i],
                    'nilai_terima_stok_ketiga' => $request->nilai_terima_stok_ketiga[$i],
                    'kuantiti_terima_stok_keempat' => $request->kuantiti_terima_stok_keempat[$i],
                    'nilai_terima_stok_keempat' => $request->nilai_terima_stok_keempat[$i],
                ]);
            }
        }
        if ($request->keluaran_id) {
            foreach (range(0, count($request->keluaran_id) - 1) as $i) {
                KeluaranStokSukuTahun::where('id', $request->keluaran_id[$i])->update([
                    'tahun_keluar_stok' => $request->tahun_keluar_stok[$i],
                    'kuantiti_keluar_stok_pertama' => $request->kuantiti_keluar_stok_pertama[$i],
                    'nilai_kuantiti_keluar_pertama' => $request->nilai_kuantiti_keluar_pertama[$i],
                    'kuantiti_keluar_stok_kedua' => $request->kuantiti_keluar_stok_kedua[$i],
                    'nilai_kuantiti_keluar_kedua' => $request->nilai_kuantiti_keluar_kedua[$i],
                    'kuantiti_keluar_stok_ketiga' => $request->kuantiti_keluar_stok_ketiga[$i],
                    'nilai_kuantiti_keluar_ketiga' => $request->nilai_kuantiti_keluar_ketiga[$i],
                    'kuantiti_keluar_stok_keempat' => $request->kuantiti_keluar_stok_keempat[$i],
                    'nilai_kuantiti_keluar_keempat' => $request->nilai_kuantiti_keluar_keempat[$i],
                ]);
            }
        }

        return redirect('/kewps3a');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kewps3a  $kewps3a
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kewps3a $kewps3a)
    {
        Kewps3a::where('id', $kewps3a->id)->delete();
        ParasStok::where('kewps3a_id', $kewps3a->id)->delete();
        TerimaanStokSukuTahun::where('kewps3a_id', $kewps3a->id)->delete();
        KeluaranStokSukuTahun::where('kewps3a_id', $kewps3a->id)->delete();

        return redirect('/kewps3a');
    }

    public function generatePdf(Kewps3a $kewps3a)
    {
        // dd($kewps3a->terima);
        $response = Http::post('https://libreoffice.prototype.com.my/cetak/kps3a', [$kewps3a]);

        $res = $response->getBody()->getContents();

        $url = "data:application/pdf;base64," . $res;

        $context = [
            "url" => $url,
        ];

        return view('modul.borang_viewer', $context);

    }

}
