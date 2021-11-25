<?php

namespace App\Http\Controllers;

use App\Models\InfoKewps31;
use App\Models\Kewps20;
use App\Models\Kewps31;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class Kewps31Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('modul.stor.kewps31.index', [
            'kewps31' => Kewps31::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('modul.stor.kewps31.create', [
            'kewps20' => Kewps20::all(),
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
        $kewps31 = Kewps31::create($request->all());
        foreach (range(0, count($request->kewps20_id) - 1) as $i) {
            InfoKewps31::create([
                'kewps31_id' => $kewps31->id,
                'kementerian' => $request->kementerian[$i],
                'hasil_pelupusan' => $request->hasil_pelupusan[$i],
                'kos_pengendalian' => $request->kos_pengendalian[$i],
                'kewps20_id' => $request->kewps20_id[$i],
            ]);
        }

        return redirect('/kewps31');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kewps31  $kewps31
     * @return \Illuminate\Http\Response
     */
    public function show(Kewps31 $kewps31)
    {
        return view('modul.stor.kewps31.edit', [
            'kewps20' => Kewps20::all(),
            'kewps31' => $kewps31,
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kewps31  $kewps31
     * @return \Illuminate\Http\Response
     */
    public function edit(Kewps31 $kewps31)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kewps31  $kewps31
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kewps31 $kewps31)
    {
        $kewps31->update($request->all());
        foreach (range(0, count($request->kewps20_id) - 1) as $i) {
            InfoKewps31::where('id', $request->info31_id[$i])->update([
                'kementerian' => $request->kementerian[$i],
                'hasil_pelupusan' => $request->hasil_pelupusan[$i],
                'kos_pengendalian' => $request->kos_pengendalian[$i],
                'kewps20_id' => $request->kewps20_id[$i],
            ]);
        }
        return redirect('/kewps31');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kewps31  $kewps31
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kewps31 $kewps31)
    {
        InfoKewps31::where('kewps31_id', $kewps31->id)->delete();
        $kewps31->delete();
        return redirect('/kewps31');
    }
    public function generatePdf(Kewps31 $kewps31)
    {

        $jk_nilai = 0;
        $jk_A = 0;
        $jk_B = 0;
        $jk_C = 0;
        $jk_D = 0;
        $jk_E = 0;
        $jk_F = 0;
        $jk_G = 0;
        $jk_H = 0;
        $jk_I = 0;
        $jk_J = 0;

        $jk_hasil = 0;
        $jk_kos = 0;

        foreach ($kewps31->infokewps31 as $i31) {
            $jumlah = 0;
            $A = 0;
            $B = 0;
            $C = 0;
            $D = 0;
            $E = 0;
            $F = 0;
            $G = 0;
            $H = 0;
            $I = 0;
            $J = 0;

            foreach ($i31->kewps20->infokewps20 as $i20) {
                switch ($i20->kaedah_pelupusan) {
                    case ($i20->kaedah_pelupusan == "A"):
                        $A = $A + ((int) $i20->kuantiti * (int) $i20->infokewps1->harga_seunit);
                        $jk_A = $jk_A + ((int) $i20->kuantiti * (int) $i20->infokewps1->harga_seunit);
                        break;
                    case ($i20->kaedah_pelupusan == "B"):
                        $B = $B + ((int) $i20->kuantiti * (int) $i20->infokewps1->harga_seunit);
                        $jk_B = $jk_B + ((int) $i20->kuantiti * (int) $i20->infokewps1->harga_seunit);
                        break;
                    case ($i20->kaedah_pelupusan == "C"):
                        $C = $C + ((int) $i20->kuantiti * (int) $i20->infokewps1->harga_seunit);
                        $jk_C = $jk_C + ((int) $i20->kuantiti * (int) $i20->infokewps1->harga_seunit);
                        break;
                    case ($i20->kaedah_pelupusan == "D"):
                        $D = $D + ((int) $i20->kuantiti * (int) $i20->infokewps1->harga_seunit);
                        $jk_D = $jk_D + ((int) $i20->kuantiti * (int) $i20->infokewps1->harga_seunit);
                        break;
                    case ($i20->kaedah_pelupusan == "E"):
                        $E = $E + ((int) $i20->kuantiti * (int) $i20->infokewps1->harga_seunit);
                        $jk_E = $jk_E + ((int) $i20->kuantiti * (int) $i20->infokewps1->harga_seunit);
                        break;
                    case ($i20->kaedah_pelupusan == "F"):
                        $F = $F + ((int) $i20->kuantiti * (int) $i20->infokewps1->harga_seunit);
                        $jk_F = $jk_F + ((int) $i20->kuantiti * (int) $i20->infokewps1->harga_seunit);
                        break;
                    case ($i20->kaedah_pelupusan == "G"):
                        $G = $G + ((int) $i20->kuantiti * (int) $i20->infokewps1->harga_seunit);
                        $jk_G = $jk_G + ((int) $i20->kuantiti * (int) $i20->infokewps1->harga_seunit);
                        break;
                    case ($i20->kaedah_pelupusan == "H"):
                        $H = $H + ((int) $i20->kuantiti * (int) $i20->infokewps1->harga_seunit);
                        $jk_H = $jk_H + ((int) $i20->kuantiti * (int) $i20->infokewps1->harga_seunit);
                        break;
                    case ($i20->kaedah_pelupusan == "I"):
                        $I = $I + ((int) $i20->kuantiti * (int) $i20->infokewps1->harga_seunit);
                        $jk_I = $jk_I + ((int) $i20->kuantiti * (int) $i20->infokewps1->harga_seunit);
                        break;
                    case ($i20->kaedah_pelupusan == "J"):
                        $J = $J + ((int) $i20->kuantiti * (int) $i20->infokewps1->harga_seunit);
                        $jk_J = $jk_J + ((int) $i20->kuantiti * (int) $i20->infokewps1->harga_seunit);
                        break;
                }
                $jumlah = $jumlah + ((int) $i20->kuantiti * (int) $i20->infokewps1->harga_seunit);

            }

            $i31->jumlah = $jumlah;
            $i31->A = $A;
            $i31->B = $B;
            $i31->C = $C;
            $i31->D = $D;
            $i31->E = $E;
            $i31->F = $F;
            $i31->G = $G;
            $i31->H = $H;
            $i31->I = $I;
            $i31->J = $J;
            $jk_hasil = $jk_hasil + (int) $i31->hasil_pelupusan;
            $jk_kos = $jk_kos + (int) $i31->kos_pengendalian;
            $jk_nilai = $jk_nilai + $jumlah;

        }

        $kewps31->$jk_nilai = $jk_nilai;
        $kewps31->jk_A = $jk_A;
        $kewps31->jk_B = $jk_B;
        $kewps31->jk_C = $jk_C;
        $kewps31->jk_D = $jk_D;
        $kewps31->jk_E = $jk_E;
        $kewps31->jk_F = $jk_F;
        $kewps31->jk_G = $jk_G;
        $kewps31->jk_H = $jk_H;
        $kewps31->jk_I = $jk_I;
        $kewps31->jk_J = $jk_J;
        $kewps31->jk_hasil = $jk_hasil;
        $kewps31->jk_kos = $jk_kos;

        $response = Http::post('https://libreoffice.prototype.com.my/cetak/kps31', [$kewps31]);

        $res = $response->getBody()->getContents();

        $url = "data:application/pdf;base64," . $res;

        $context = [
            "url" => $url,
            "title" => "kewps31",
        ];

        return view('modul.borang_viewer_ps', $context);

    }
}
