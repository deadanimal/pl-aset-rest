<?php

namespace App\Http\Controllers;

use App\Models\DataAsetKhususBinaanLuar;
use App\Models\KontraktorLuarPremis;
use App\Models\PerundingLuarPremis;
use App\Models\SenaraiBinaanLuar;
use Illuminate\Http\Request;

class DataAsetKhususBinaanLuarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('modul.aset_tak_alih.dataasetkhususbinaanluar.index', [
            'dataasetkhususbl' => DataAsetKhususBinaanLuar::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('modul.aset_tak_alih.dataasetkhususbinaanluar.create', [
            'binaanluar' => SenaraiBinaanLuar::all(),
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
        $senaraibl = SenaraiBinaanLuar::where('id', $request->senarai_binaan_luar_id)->firstorfail();

        $jkrpataf68 = $senaraibl->jkrpataf612->jkrpataf68;

        $request['nama_premis'] = $jkrpataf68->nama_premis;
        $request['kegunaan_binaan_luar'] = $jkrpataf68->fungsi_aset;
        $request['jenis_binaan_luar'] = $jkrpataf68->kategori_aset;
        $request['no_siri_pendaftaran'] = $jkrpataf68->id;
        $request['tahun_siap_bina'] = date('Y', strtotime($jkrpataf68->tarikh_siap_bina_asal));

        $dataAsetKhususLuar = DataAsetKhususBinaanLuar::create($request->all());

        //kontraktor
        if ($request->nama_kontraktor_luar) {
            foreach (range(0, count($request->nama_kontraktor_luar) - 1) as $i) {
                KontraktorLuarPremis::create([
                    'nama_kontraktor_luar' => $request->nama_kontraktor_luar[$i],
                    'bidang_kerja_kontraktor_luar' => $request->bidang_kerja_kontraktor_luar[$i],
                    'kontraktor_luar_utama' => $request->kontraktor_luar_utama[$i],
                    'data_aset_khusus_binaan_luar_id' => $dataAsetKhususLuar->id,
                ]);
            }
        }
        //perunding
        if ($request->nama_perunding_luar) {
            foreach (range(0, count($request->nama_perunding_luar) - 1) as $i) {
                PerundingLuarPremis::create([
                    'nama_perunding_luar' => $request->nama_perunding_luar[$i],
                    'bidang_kerja_perunding_luar' => $request->bidang_kerja_perunding_luar[$i],
                    'perunding_luar_utama' => $request->perunding_luar_utama[$i],
                    'data_aset_khusus_binaan_luar_id' => $dataAsetKhususLuar->id,
                ]);
            }
        }

        return redirect('/dakbinaanluar');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DataAsetKhususBinaanLuar  $dataAsetKhususBinaanLuar
     * @return \Illuminate\Http\Response
     */
    public function show($id_dataAsetKhususBinaanLuar)
    {
        $dataAsetKhususBinaanLuar = DataAsetKhususBinaanLuar::where('id', $id_dataAsetKhususBinaanLuar)->firstorfail();

        return view('modul.aset_tak_alih.dataasetkhususbinaanluar.edit', [
            'binaanluar' => SenaraiBinaanLuar::all(),
            'dakBinaanLuar' => $dataAsetKhususBinaanLuar,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DataAsetKhususBinaanLuar  $dataAsetKhususBinaanLuar
     * @return \Illuminate\Http\Response
     */
    public function edit(DataAsetKhususBinaanLuar $dataAsetKhususBinaanLuar)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DataAsetKhususBinaanLuar  $dataAsetKhususBinaanLuar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_dataAsetKhususBinaanLuar)
    {
        $dataAsetKhususBinaanLuar = DataAsetKhususBinaanLuar::where('id', $id_dataAsetKhususBinaanLuar)->firstorfail();

        $dataAsetKhususBinaanLuar->update($request->all());

        return redirect('/dakbinaanluar');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DataAsetKhususBinaanLuar  $dataAsetKhususBinaanLuar
     * @return \Illuminate\Http\Response
     */
    public function destroy($dataAsetKhususBinaanLuar)
    {
        KontraktorLuarPremis::where('data_aset_khusus_binaan_luar_id', $dataAsetKhususBinaanLuar)->delete();
        PerundingLuarPremis::where('data_aset_khusus_binaan_luar_id', $dataAsetKhususBinaanLuar)->delete();
        DataAsetKhususBinaanLuar::where('id', $dataAsetKhususBinaanLuar)->delete();

        return redirect('/dakbinaanluar');
    }
}
