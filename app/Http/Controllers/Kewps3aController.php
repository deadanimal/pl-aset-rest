<?php

namespace App\Http\Controllers;

use App\Models\InfoKewps1;
use App\Models\InfoKewps7;
use App\Models\KeluaranStokSukuTahun;
use App\Models\Kewps3a;
use App\Models\Kewps4;
use App\Models\ParasStok;
use App\Models\TerimaanStokSukuTahun;
use function PHPUnit\Framework\isEmpty;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        return view('modul.stor.kewps3a.create', [
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

        $request['staff_id'] = Auth::user()->id;

        //Terimaan
        $infokewps1 = InfoKewps1::where('no_kod', $request->id)->get();

        ///Keluaran
        $infokewps7 = InfoKewps7::where('kewps3a_id', $request->id)->get();

        if (!$infokewps1->isEmpty()) {

            $kewps3a = Kewps3a::create($request->all());



            $harga_seunit = $infokewps1->first()->harga_seunit;
            $kuantiti1 = 0;
            $kuantiti2 = 0;
            $kuantiti3 = 0;
            $kuantiti4 = 0;

            $tarikh = date('Y-m-d');

            foreach ($infokewps1 as $ik1) {

                $tarikh = date('Y-m-d', strtotime($ik1->created_at));
                $tahun = date('Y', strtotime($tarikh));
                $mula1 = date('Y-m-d', strtotime($tahun . "-1-1"));
                $tamat1 = date('Y-m-d', strtotime($tahun . "-3-31"));
                $mula2 = date('Y-m-d', strtotime($tahun . "-4-1"));
                $tamat2 = date('Y-m-d', strtotime($tahun . "-6-31"));
                $mula3 = date('Y-m-d', strtotime($tahun . "-7-1"));
                $tamat3 = date('Y-m-d', strtotime($tahun . "-9-31"));
                $mula4 = date('Y-m-d', strtotime($tahun . "-10-1"));
                $tamat4 = date('Y-m-d', strtotime($tahun . "-12-31"));

                if ($this->checkSuku($tarikh, $tahun, $mula1, $tamat1)) {
                    $kuantiti1 = $kuantiti1 + (int) $ik1->kuantiti_diterima;
                }
                if ($this->checkSuku($tarikh, $tahun, $mula2, $tamat2)) {
                    $kuantiti2 = $kuantiti2 + (int) $ik1->kuantiti_diterima;
                }
                if ($this->checkSuku($tarikh, $tahun, $mula3, $tamat3)) {
                    $kuantiti3 = $kuantiti3 + (int) $ik1->kuantiti_diterima;
                }
                if ($this->checkSuku($tarikh, $tahun, $mula4, $tamat4)) {
                    $kuantiti4 = $kuantiti4 + (int) $ik1->kuantiti_diterima;
                }
            }

            TerimaanStokSukuTahun::create([
                'kewps3a_id' => $kewps3a->id,
                'tahun_terima_stok' => $kewps3a->created_at->format('Y'),
                'kuantiti_terima_stok_pertama' => $kuantiti1,
                'nilai_terima_stok_pertama' => (int) $kuantiti1 * (int) $harga_seunit,
                'kuantiti_terima_stok_kedua' => $kuantiti2,
                'nilai_terima_stok_kedua' => (int) $kuantiti2 * (int) $harga_seunit,
                'kuantiti_terima_stok_ketiga' => $kuantiti3,
                'nilai_terima_stok_ketiga' => (int) $kuantiti3 * (int) $harga_seunit,
                'kuantiti_terima_stok_keempat' => $kuantiti4,
                'nilai_terima_stok_keempat' => (int) $kuantiti4 * (int) $harga_seunit,
            ]);

            $kuantiti1 = 0;
            $kuantiti2 = 0;
            $kuantiti3 = 0;
            $kuantiti4 = 0;
            foreach ($infokewps7 as $ik7) {
                $tarikh = date('Y-m-d', strtotime($ik7->created_at));
                $tahun = date('Y', strtotime($tarikh));
                $mula1 = date('Y-m-d', strtotime($tahun . "-1-1"));
                $tamat1 = date('Y-m-d', strtotime($tahun . "-3-31"));
                $mula2 = date('Y-m-d', strtotime($tahun . "-4-1"));
                $tamat2 = date('Y-m-d', strtotime($tahun . "-6-31"));
                $mula3 = date('Y-m-d', strtotime($tahun . "-7-1"));
                $tamat3 = date('Y-m-d', strtotime($tahun . "-9-31"));
                $mula4 = date('Y-m-d', strtotime($tahun . "-10-1"));
                $tamat4 = date('Y-m-d', strtotime($tahun . "-12-31"));

                if ($this->checkSuku($tarikh, $tahun, $mula1, $tamat1)) {
                    $kuantiti1 = $kuantiti1 + (int) $ik7->kuantiti_dikeluarkan;
                }
                if ($this->checkSuku($tarikh, $tahun, $mula2, $tamat2)) {
                    $kuantiti2 = $kuantiti2 + (int) $ik7->kuantiti_dikeluarkan;
                }
                if ($this->checkSuku($tarikh, $tahun, $mula3, $tamat3)) {
                    $kuantiti3 = $kuantiti3 + (int) $ik7->kuantiti_dikeluarkan;
                }
                if ($this->checkSuku($tarikh, $tahun, $mula4, $tamat4)) {
                    $kuantiti4 = $kuantiti4 + (int) $ik7->kuantiti_dikeluarkan;
                }
            }

            KeluaranStokSukuTahun::create([
                'kewps3a_id' => $kewps3a->id,
                'tahun_keluar_stok' => $kewps3a->created_at->format('Y'),
                'kuantiti_keluar_stok_pertama' => $kuantiti1,
                'nilai_kuantiti_keluar_pertama' => (int) $kuantiti1 * (int) $harga_seunit,
                'kuantiti_keluar_stok_kedua' => $kuantiti2,
                'nilai_kuantiti_keluar_kedua' => (int) $kuantiti2 * (int) $harga_seunit,
                'kuantiti_keluar_stok_ketiga' => $kuantiti3,
                'nilai_kuantiti_keluar_ketiga' => (int) $kuantiti3 * (int) $harga_seunit,
                'kuantiti_keluar_stok_keempat' => $kuantiti4,
                'nilai_kuantiti_keluar_keempat' => (int) $kuantiti4 * (int) $harga_seunit,
            ]);
            if ($request->tahun_paras_stok) {
                foreach (range(0, count($request->tahun_paras_stok) - 1) as $i) {
                    ParasStok::create([
                        'kewps3a_id' => $kewps3a->id,
                        'tahun_paras_stok' => $request->tahun_paras_stok[$i],
                        'maksimum_stok' => $request->maksimum_stok[$i],
                        'menokok_stok' => $request->menokok_stok[$i],
                        'minimum_stok' => $request->minimum_stok[$i],
                    ]);


                    $tahun_semasa = date('Y', strtotime(now()));
                    if ($request->tahun_paras_stok[$i] == $tahun_semasa) {
                        $nilai_baki_semasa = $request->maksimum_stok[$i] * $harga_seunit;
                        Kewps4::create([
                            'nilai_baki_semasa' => $nilai_baki_semasa,
                            'status_stok' => $request->pergerakan,
                            'kewps3a_id' => $kewps3a->id,
                            'user_id' => $request->staff_id
                        ]);
                    }
                }
            }
        } else {
            dd("No Kod Belum Diterima");
        }

        return redirect('/kewps3a');
    }

    public function checkSuku($tarikh, $tahun, $mula, $tamat)
    {

        if (($tarikh >= $mula) && ($tarikh <= $tamat)) {
            return true;
        } else {
            return false;
        }
    }
    public function checkSuku2($tarikh)
    {
        $tarikh = date('Y-m-d', strtotime($tarikh));
        $year = date('Y', strtotime($tarikh));

        $tarikh = date('Y-m-d', strtotime($tarikh));
        $mula = date('Y-m-d', strtotime($year . "-4-1"));
        $tamat = date('Y-m-d', strtotime($year . "-6-31"));

        if (($tarikh >= $mula) && ($tarikh <= $tamat)) {
            return true;
        } else {
            return false;
        }
    }
    public function checkSuku4($paymentDate)
    {
        $paymentDate = date('Y-m-d');
        $paymentDate = date('Y-m-d', strtotime($paymentDate));
        $year = date('Y', strtotime($paymentDate));

        //echo $paymentDate; // echos today!
        $contractDateBegin = date('Y-m-d', strtotime($year . "-9-1"));
        $contractDateEnd = date('Y-m-d', strtotime($year . "-12-31"));

        if (($paymentDate >= $contractDateBegin) && ($paymentDate <= $contractDateEnd)) {
            return true;
        } else {
            return false;
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

        if ($request->tahun_paras_stok) {
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
        ParasStok::where('kewps3a_id', $kewps3a->id)->delete();
        TerimaanStokSukuTahun::where('kewps3a_id', $kewps3a->id)->delete();
        KeluaranStokSukuTahun::where('kewps3a_id', $kewps3a->id)->delete();
        Kewps4::where('kewps3a_id', $kewps3a->id)->delete();
        Kewps3a::where('id', $kewps3a->id)->delete();

        return redirect('/kewps3a');
    }

    public function getDinamic(Request $request)
    {
        $data = InfoKewps1::where('no_kod', $request->id)->first();

        return response()->json($data);
    }


    public function generatePdf(Kewps3a $kewps3a)
    {
        $terima = TerimaanStokSukuTahun::where('kewps3a_id', $kewps3a->id)->first();
        $kewps3a->tahun_terimaan = $terima->first()->tahun_terima_stok;
        $kewps3a->kuantiti_terimaan = (int) $terima->kuantiti_terima_stok_pertama + (int) $terima->kuantiti_terima_stok_kedua + (int) $terima->kuantiti_terima_stok_ketiga + (int) $terima->kuantiti_terima_stok_keempat;
        $kewps3a->nilai_terimaan = (int) $terima->nilai_terima_stok_pertama + (int) $terima->nilai_terima_stok_kedua + (int) $terima->nilai_terima_stok_ketiga + (int) $terima->nilai_terima_stok_keempat;

        $keluar = KeluaranStokSukuTahun::where('kewps3a_id', $kewps3a->id)->first();
        $kewps3a->kuantiti_keluaran = (int) $keluar->kuantiti_keluar_stok_pertama + (int) $keluar->kuantiti_keluar_stok_kedua + (int) $keluar->kuantiti_keluar_stok_ketiga + (int) $keluar->kuantiti_keluar_stok_keempat;
        $kewps3a->nilai_keluaran = (int) $keluar->nilai_kuantiti_keluar_pertama + (int) $keluar->nilai_kuantiti_keluar_kedua + (int) $keluar->nilai_kuantiti_keluar_ketiga + (int) $keluar->nilai_kuantiti_keluar_keempat;

        $response = Http::post('https://libreoffice.prototype.com.my/cetak/kps3a', [$kewps3a]);

        $res = $response->getBody()->getContents();

        $url = "data:application/pdf;base64," . $res;

        $context = [
            "url" => $url,
            "title" => "Kewps3a",
        ];

        return view('modul.borang_viewer_ps', $context);
    }
}
