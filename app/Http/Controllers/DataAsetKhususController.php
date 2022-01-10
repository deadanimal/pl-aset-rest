<?php

namespace App\Http\Controllers;

use App\Models\DataAsetKhusus;
use App\Models\KontraktorBangunan;
use App\Models\MaklumatAras;
use App\Models\PerundingBangunan;
use App\Models\SenaraiBlokBangunan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class DataAsetKhususController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('modul.aset_tak_alih.dataasetkhusus.index', [
            'dataasetkhusus' => DataAsetKhusus::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $check[] = null;
        $dak = DataAsetKhusus::all();
        foreach ($dak as $i) {
            $check[] = $i->blok_bangunan_id;
        }

        return view('modul.aset_tak_alih.dataasetkhusus.create', [
            'blokbangunan' => SenaraiBlokBangunan::all(),
            'check' => $check,
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
        $senaraibb = SenaraiBlokBangunan::where('id', $request->blok_bangunan_id)->firstorfail();

        $jkrpataf68 = $senaraibb->jkrpataf612->jkrpataf68;


        switch ($jkrpataf68->fungsi_aset) {
            case (1):
                $request['kegunaan_blok'] = 'Bangunan & Binaan Lain';
                break;
            case (2):
                $request['kegunaan_blok'] = 'Infrastruktur Jalan & Jambatan';
                break;
            case (3):
                $request['kegunaan_blok'] = 'Infrastruktur (* Saliran / Pembetungan/ Aset Air)';
                break;
            case (4):
                $request['kegunaan_blok'] = 'Lain-lain: ......(Nyatakan) ...........';
                break;
        }
        switch ($jkrpataf68->kategori_aset) {
            case (1):
                $request['jenis_struktur'] = 'Pejabat / Ruang Kerja';
                break;
            case (2):
                $request['jenis_struktur'] = 'Perumahan/ Penginapan';
                break;
            case (3):
                $request['jenis_struktur'] = 'Fasiliti/ Infrastruktur Awam';
                break;
            case (4):
                $request['jenis_struktur'] = 'Lain-lain: ......(Nyatakan) ...........';
                break;
        }

        $request['no_siri_pendaftaran'] = $jkrpataf68->id;
        $request['tahun_siap_bina_asal'] = date('Y', strtotime($jkrpataf68->tarikh_siap_bina_asal));

        $dataAsetKhusus = DataAsetKhusus::create($request->all());

        //kontraktor
        if ($request->nama_kontraktor_bangunan) {
            foreach (range(0, count($request->nama_kontraktor_bangunan) - 1) as $i) {
                KontraktorBangunan::create([
                    'nama_kontraktor_bangunan' => $request->nama_kontraktor_bangunan[$i],
                    'bidang_kerja_kontraktor_bangunan' => $request->bidang_kerja_kontraktor_bangunan[$i],
                    'kontraktor_utama_bangunan' => $request->kontraktor_utama_bangunan[$i],
                    'data_aset_khusus_id' => $dataAsetKhusus->id,
                ]);
            }
        }
        //perunding
        if ($request->nama_perunding_bangunan) {
            foreach (range(0, count($request->nama_perunding_bangunan) - 1) as $i) {
                PerundingBangunan::create([
                    'nama_perunding_bangunan' => $request->nama_perunding_bangunan[$i],
                    'bidang_kerja_perunding_bangunan' => $request->bidang_kerja_perunding_bangunan[$i],
                    'perunding_utama_bangunan' => $request->perunding_utama_bangunan[$i],
                    'data_aset_khusus_id' => $dataAsetKhusus->id,
                ]);
            }
        }

        //maklumat aras
        if ($request->senarai_ruang_aras) {
            foreach (range(0, count($request->senarai_ruang_aras) - 1) as $i) {
                MaklumatAras::create([
                    'senarai_ruang_aras' => $request->senarai_ruang_aras[$i],
                    'nama_ruang' => $request->nama_ruang[$i],
                    'luas_ruang' => $request->luas_ruang[$i],
                    'tinggi_ruang' => $request->tinggi_ruang[$i],
                    'fungsi_ruang' => $request->fungsi_ruang[$i],
                    'from_page' => $request->from_page2[$i],
                    'to_page' => $request->to_page2[$i],
                    'staff_id' => $request->staff_id_ra[$i],
                    'data_aset_khusus_id' => $dataAsetKhusus->id,
                ]);
            }
        }

        return redirect('/dataasetkhusus');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DataAsetKhusus  $dataAsetKhusus
     * @return \Illuminate\Http\Response
     */
    public function show(DataAsetKhusus $dataasetkhusu)
    {
        // $r = Route::getRoutes();
        // dd($r);
        // $dataAsetKhusus = DataAsetKhusus::where('id', $id_dataAsetKhusus)->firstorfail();
        return view('modul.aset_tak_alih.dataasetkhusus.edit', [
            'blokbangunan' => SenaraiBlokBangunan::all(),
            'dataasetkhusus' => $dataasetkhusu,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DataAsetKhusus  $dataAsetKhusus
     * @return \Illuminate\Http\Response
     */
    public function edit(DataAsetKhusus $dataasetkhusu)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DataAsetKhusus  $dataAsetKhusus
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_dataAsetKhusus)
    {
        $dataAsetKhusus = DataAsetKhusus::where('id', $id_dataAsetKhusus)->firstorfail();

        $dataAsetKhusus->update($request->all());

        if ($request->nama_kontraktor_bangunan) {
            foreach (range(0, count($request->nama_kontraktor_bangunan) - 1) as $i) {
                KontraktorBangunan::where('id', $request->kontraktor_id[$i])->update([
                    'nama_kontraktor_bangunan' => $request->nama_kontraktor_bangunan[$i],
                    'bidang_kerja_kontraktor_bangunan' => $request->bidang_kerja_kontraktor_bangunan[$i],
                    'kontraktor_utama_bangunan' => $request->kontraktor_utama_bangunan[$i],
                ]);
            }
        }
        if ($request->nama_perunding_bangunan) {
            foreach (range(0, count($request->nama_perunding_bangunan) - 1) as $i) {
                PerundingBangunan::where('id', $request->perunding_id[$i])->update([
                    'nama_perunding_bangunan' => $request->nama_perunding_bangunan[$i],
                    'bidang_kerja_perunding_bangunan' => $request->bidang_kerja_perunding_bangunan[$i],
                    'perunding_utama_bangunan' => $request->perunding_utama_bangunan[$i],
                ]);
            }
        }
        if ($request->senarai_ruang_aras) {
            foreach (range(0, count($request->senarai_ruang_aras) - 1) as $i) {
                MaklumatAras::where('id', $request->maklumataras_id[$i])->update([
                    'senarai_ruang_aras' => $request->senarai_ruang_aras[$i],
                    'nama_ruang' => $request->nama_ruang[$i],
                    'luas_ruang' => $request->luas_ruang[$i],
                    'tinggi_ruang' => $request->tinggi_ruang[$i],
                    'fungsi_ruang' => $request->fungsi_ruang[$i],
                    'from_page' => $request->from_page2[$i],
                    'to_page' => $request->to_page2[$i],
                ]);
            }
        }

        return redirect('/dataasetkhusus');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DataAsetKhusus  $dataAsetKhusus
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_dataAsetKhusus)
    {

        KontraktorBangunan::where('data_aset_khusus_id', $id_dataAsetKhusus)->delete();
        PerundingBangunan::where('data_aset_khusus_id', $id_dataAsetKhusus)->delete();
        MaklumatAras::where('data_aset_khusus_id', $id_dataAsetKhusus)->delete();
        DataAsetKhusus::where('id', $id_dataAsetKhusus)->delete();

        return redirect('/dataasetkhusus');
    }
}
