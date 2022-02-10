<?php

namespace App\Http\Controllers;

use App\Models\InfoKewps1;
use App\Models\Kewps17;
use App\Models\Kewps18;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class Kewps18Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('modul.stor.kewps18.index', [
            'kewps18' => Kewps18::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('modul.stor.kewps18.create', [
            'kewps17' => Kewps17::all(),
        ]);
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $infokewps17 = Kewps17::where('id', $request->kewps17_id)->first()->infokewps17;

        $kuantitilulus = 0;
        $kuantitipengeluar = 0;
        $jumlah_nilai_terima = 0;
        $jumlah_nilai_keluar = 0;
        foreach ($infokewps17 as $ik17) {
            $tahun = date('Y', strtotime($ik17->created_at));
            if ($request->tahun == $tahun) {
                $kuantitilulus = $kuantitilulus + (int) $ik17->kuantiti_dilulus;
                $kuantitipengeluar = $kuantitipengeluar + (int) $ik17->kuantiti_dimohon;

                $harga_seunit1 = (int) $ik17->kewps3a->kewps1->harga_seunit * (int) $ik17->kuantiti_dilulus;
                $jumlah_nilai_terima += $harga_seunit1;

                $harga_seunit2 = (int) $ik17->kewps3a->kewps1->harga_seunit * (int) $ik17->kuantiti_dimohon;
                $jumlah_nilai_keluar += $harga_seunit2;
            }
        }

        $request['jumlah_kuantiti_terimaan'] = $kuantitilulus;
        $request['jumlah_nilai_terimaan'] = $jumlah_nilai_terima;
        $request['jumlah_kuantiti_pengeluaran'] = $kuantitipengeluar;
        $request['jumlah_nilai_pengeluaran'] = $jumlah_nilai_keluar;
        Kewps18::create($request->all());
        return redirect('/kewps18');
    }

    public function checkTerimaanSuk31($paymentDate)
    {
        $paymentDate = date('Y-m-d');
        $paymentDate = date('Y-m-d', strtotime($paymentDate));
        $year = date('Y', strtotime($paymentDate));

        //echo $paymentDate; // echos today!
        $contractDateBegin = date('Y-m-d', strtotime($year . "-1-1"));
        $contractDateEnd = date('Y-m-d', strtotime($year . "-3-31"));

        if (($paymentDate >= $contractDateBegin) && ($paymentDate <= $contractDateEnd)) {
            return true;
        } else {
            return false;
        }

    }
    public function checkTerimaanSuku2($paymentDate)
    {
        $paymentDate = date('Y-m-d');
        $paymentDate = date('Y-m-d', strtotime($paymentDate));
        $year = date('Y', strtotime($paymentDate));

        //echo $paymentDate; // echos today!
        $contractDateBegin = date('Y-m-d', strtotime($year . "-4-1"));
        $contractDateEnd = date('Y-m-d', strtotime($year . "-6-31"));

        if (($paymentDate >= $contractDateBegin) && ($paymentDate <= $contractDateEnd)) {
            return true;
        } else {
            return false;
        }

    }
    public function checkTerimaanSuku3($paymentDate)
    {
        $paymentDate = date('Y-m-d');
        $paymentDate = date('Y-m-d', strtotime($paymentDate));
        $year = date('Y', strtotime($paymentDate));

        //echo $paymentDate; // echos today!
        $contractDateBegin = date('Y-m-d', strtotime($year . "-7-1"));
        $contractDateEnd = date('Y-m-d', strtotime($year . "-9-31"));

        if (($paymentDate >= $contractDateBegin) && ($paymentDate <= $contractDateEnd)) {
            return true;
        } else {
            return false;
        }

    }
    public function checkTerimaanSuku4($paymentDate)
    {
        $paymentDate = date('Y-m-d');
        $paymentDate = date('Y-m-d', strtotime($paymentDate));
        $year = date('Y', strtotime($paymentDate));

        //echo $paymentDate; // echos today!
        $contractDateBegin = date('Y-m-d', strtotime($year . "-10-1"));
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
     * @param  \App\Models\Kewps18  $kewps18
     * @return \Illuminate\Http\Response
     */
    public function show(Kewps18 $kewps18)
    {
        return view('modul.stor.kewps18.index', [
            'kewps17' => Kewps17::all(),
            'kewps18' => Kewps18::all(),
        ]);
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kewps18  $kewps18
     * @return \Illuminate\Http\Response
     */
    public function edit(Kewps18 $kewps18)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kewps18  $kewps18
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kewps18 $kewps18)
    {
        $infokewps17 = Kewps17::where('id', $request->kewps17_id)->first()->infokewps17;
        $kuantitilulus = 0;
        $kuantitipengeluar = 0;
        foreach ($infokewps17 as $ik17) {
            $tahun = date('Y', strtotime($ik17->created_at));
            if ($request->tahun == $tahun) {
                $kuantitilulus = $kuantitilulus + (int) $ik17->kuantiti_dilulus;
                $kuantitipengeluar = $kuantitipengeluar + (int) $ik17->kuantiti_dimohon;
            }
        }

        $harga_seunit = InfoKewps1::where('no_kod', $infokewps17[0]->kewps3a_id)->first()->harga_seunit;
        $request['jumlah_kuantiti_terimaan'] = $kuantitilulus;
        $request['jumlah_nilai_terimaan'] = (int) $kuantitilulus * (int) $harga_seunit;
        $request['jumlah_kuantiti_pengeluaran'] = $kuantitipengeluar;
        $request['jumlah_nilai_pengeluaran'] = (int) $kuantitipengeluar * (int) $harga_seunit;

        $kewps18->update($request->all());
        return redirect('/kewps18');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kewps18  $kewps18
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kewps18 $kewps18)
    {
        $kewps18->delete();
        return redirect('/kewps18');

    }

    public function generatePdf(Kewps18 $kewps18)
    {
        $infokewps17 = $kewps18->kewps17->infokewps17;

        $kuantiti1lulus = 0;
        $kuantiti1pengeluar = 0;
        $jumlah_terima1 = 0;
        $jumlah_keluar1 = 0;

        $kuantiti2lulus = 0;
        $kuantiti2pengeluar = 0;
        $jumlah_terima2 = 0;
        $jumlah_keluar2 = 0;

        $kuantiti3lulus = 0;
        $kuantiti3pengeluar = 0;
        $jumlah_terima3 = 0;
        $jumlah_keluar3 = 0;

        $kuantiti4lulus = 0;
        $kuantiti4pengeluar = 0;
        $jumlah_terima4 = 0;
        $jumlah_keluar4 = 0;

        $tahun = $kewps18->tahun;

        foreach ($infokewps17 as $ik17) {
            $tahun_aset = date('Y', strtotime($ik17->created_at));

            if ($tahun == $tahun_aset) {
                $harga_seunit = $ik17->kewps3a->kewps1->harga_seunit;
                if ($this->checkTerimaanSuk31($ik17->created_at)) {
                    $kuantiti1lulus += (int) $ik17->kuantiti_dilulus;
                    $kuantiti1pengeluar += (int) $ik17->kuantiti_dimohon;

                    $jumlah_terima1 += ($harga_seunit * $ik17->kuantiti_dilulus);
                    $jumlah_keluar1 += ($harga_seunit * $ik17->kuantiti_dimohon);

                }
                if ($this->checkTerimaanSuku2($ik17->created_at)) {
                    $kuantiti2lulus += $ik17->kuantiti_dilulus;
                    $kuantiti2pengeluar = $kuantiti2pengeluar + (int) $ik17->kuantiti_dimohon;

                    $jumlah_terima2 += ($harga_seunit * $ik17->kuantiti_dilulus);
                    $jumlah_keluar2 += ($harga_seunit * $ik17->kuantiti_dimohon);

                }
                if ($this->checkTerimaanSuku3($ik17->created_at)) {
                    $kuantiti3lulus += $ik17->kuantiti_dilulus;
                    $kuantiti3pengeluar += (int) $ik17->kuantiti_dimohon;

                    $jumlah_terima3 += ($harga_seunit * $ik17->kuantiti_dilulus);
                    $jumlah_keluar3 += ($harga_seunit * $ik17->kuantiti_dimohon);

                }
                if ($this->checkTerimaanSuku4($ik17->created_at)) {
                    $kuantiti4lulus = $kuantiti4lulus + (int) $ik17->kuantiti_dilulus;
                    $kuantiti4pengeluar = $kuantiti4pengeluar + (int) $ik17->kuantiti_dimohon;

                    $jumlah_terima4 += ($harga_seunit * $ik17->kuantiti_dilulus);
                    $jumlah_keluar4 += ($harga_seunit * $ik17->kuantiti_dimohon);

                }
            }

        }

        $kewps18->k1terima = $kuantiti1lulus;
        $kewps18->k1pengeluar = $kuantiti1pengeluar;
        $kewps18->k2terima = $kuantiti2lulus;
        $kewps18->k2pengeluar = $kuantiti2pengeluar;
        $kewps18->k3terima = $kuantiti3lulus;
        $kewps18->k3pengeluar = $kuantiti3pengeluar;
        $kewps18->k4terima = $kuantiti4lulus;
        $kewps18->k4pengeluar = $kuantiti4pengeluar;

        $kewps18->nilai_k1terima = (int) $kuantiti1lulus * (int) $harga_seunit;
        $kewps18->nilai_k1pengeluar = (int) $kuantiti1pengeluar * (int) $harga_seunit;
        $kewps18->nilai_k2terima = (int) $kuantiti2lulus * (int) $harga_seunit;
        $kewps18->nilai_k2pengeluar = (int) $kuantiti2pengeluar * (int) $harga_seunit;
        $kewps18->nilai_k3terima = (int) $kuantiti3lulus * (int) $harga_seunit;
        $kewps18->nilai_k3pengeluar = (int) $kuantiti3pengeluar * (int) $harga_seunit;
        $kewps18->nilai_k4terima = (int) $kuantiti4lulus * (int) $harga_seunit;
        $kewps18->nilai_k4pengeluar = (int) $kuantiti4pengeluar * (int) $harga_seunit;

        $response = Http::post('https://libreoffice.prototype.com.my/cetak/kps18', [$kewps18]);

        $res = $response->getBody()->getContents();

        $url = "data:application/pdf;base64," . $res;

        $context = [
            "url" => $url,
            "title" => "kewps18",
        ];

        return view('modul.borang_viewer_ps', $context);

    }
}
