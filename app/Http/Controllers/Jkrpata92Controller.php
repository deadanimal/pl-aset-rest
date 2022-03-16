<?php

namespace App\Http\Controllers;

use App\Models\InfoJkrpata92;
use App\Models\Jkrpata92;
use App\Models\Jkrpataf610;
use App\Models\Jkrpataf68;
use App\Models\PermohonanBangunanBahagian1;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class Jkrpata92Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('modul.aset_tak_alih.jkrpata92.index', [
            'jkrpata92' => Jkrpata92::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('modul.aset_tak_alih.jkrpata92.create', [
            'jkrpataf68' => PermohonanBangunanBahagian1::all(),
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

        $jkrpataf68 = PermohonanBangunanBahagian1::where('no_dpa', $request->jkrpataf68_id)->firstorfail();

        $request['kementerian'] = $jkrpataf68->kementerian;
        $request['jabatan'] = $jkrpataf68->jabatan;
        $request['negeri'] = $jkrpataf68->negeri;
        $request['daerah'] = $jkrpataf68->daerah;
        $request['nama_premis'] = $jkrpataf68->nama_premis;
        $request['alamat_premis'] = $jkrpataf68->alamat_premis;
        $request['kategori'] = $jkrpataf68->kategori_fungsi_premis;
        $request['jumlah_saiz'] = 0;
        $request['jumlah_pelaksana_projek'] = 0;
        $request['jumlah_kos_rancang'] = 0;
        $request['jumlah_kos_sebenar'] = 0;
        $request['jumlah_abm'] = 0;
        $request['jumlah_peruntukan'] = 0;
        $request['jumlah_peratus_perbelanjaan'] = 0;
        foreach (range(0, count($request->nama_projek) - 1) as $i) {
            $request['jumlah_saiz'] = $request['jumlah_saiz'] + $request->saiz_projek[$i];
            $request['jumlah_pelaksana_projek'] = $request['jumlah_pelaksana_projek'] + $request->pelaksana_projek[$i];
            $request['jumlah_kos_rancang'] = $request['jumlah_kos_rancang'] + $request->kos_rancang[$i];
            $request['jumlah_kos_sebenar'] = $request['jumlah_kos_sebenar'] + $request->kos_sebenar[$i];
            $request['jumlah_abm'] = $request['jumlah_abm'] + $request->abm[$i];
            $request['jumlah_peruntukan'] = $request['jumlah_peruntukan'] + $request->peruntukan[$i];
            $request['jumlah_peratus_perbelanjaan'] = $request['jumlah_peratus_perbelanjaan'] + $request->peratus_perbelanjaan[$i];
        }
        $jkrpata92 = Jkrpata92::create($request->all());

        foreach (range(0, count($request->nama_projek) - 1) as $i) {
            InfoJkrpata92::create([
                'jkrpata92_id' => $jkrpata92->id,
                'nama_projek' => $request->nama_projek[$i],
                'saiz_projek' => $request->saiz_projek[$i],
                'pelaksana_projek' => $request->pelaksana_projek[$i],
                'kos_rancang' => $request->kos_rancang[$i],
                'kos_sebenar' => $request->kos_sebenar[$i],
                'abm' => $request->abm[$i],
                'peruntukan' => $request->peruntukan[$i],
                'peratus_perbelanjaan' => $request->peratus_perbelanjaan[$i],
                'tarikh_mula_rancang' => $request->tarikh_mula_rancang[$i],
                'tarikh_siap_rancang' => $request->tarikh_siap_rancang[$i],
                'tarikh_serahan_rancang' => $request->tarikh_serahan_rancang[$i],
                'tarikh_mula_sebenar' => $request->tarikh_mula_sebenar[$i],
                'tarikh_siap_sebenar' => $request->tarikh_siap_sebenar[$i],
                'tarikh_serahan_sebenar' => $request->tarikh_serahan_sebenar[$i],
            ]);
        }
        return redirect('/jkrpata92');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Jkrpata92  $jkrpata92
     * @return \Illuminate\Http\Response
     */
    public function show(Jkrpata92 $jkrpata92)
    {
        return view('modul.aset_tak_alih.jkrpata92.edit', [
            'jkrpataf68' => Jkrpataf68::all(),
            'jkrpata92' => $jkrpata92,
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Jkrpata92  $jkrpata92
     * @return \Illuminate\Http\Response
     */
    public function edit(Jkrpata92 $jkrpata92)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Jkrpata92  $jkrpata92
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Jkrpata92 $jkrpata92)
    {

        $request['jumlah_saiz'] = 0;
        $request['jumlah_pelaksana_projek'] = 0;
        $request['jumlah_kos_rancang'] = 0;
        $request['jumlah_kos_sebenar'] = 0;
        $request['jumlah_abm'] = 0;
        $request['jumlah_peruntukan'] = 0;
        $request['jumlah_peratus_perbelanjaan'] = 0;
        foreach (range(0, count($request->nama_projek) - 1) as $i) {
            $request['jumlah_saiz'] = $request['jumlah_saiz'] + $request->saiz_projek[$i];
            $request['jumlah_pelaksana_projek'] = $request['jumlah_pelaksana_projek'] + $request->pelaksana_projek[$i];
            $request['jumlah_kos_rancang'] = $request['jumlah_kos_rancang'] + $request->kos_rancang[$i];
            $request['jumlah_kos_sebenar'] = $request['jumlah_kos_sebenar'] + $request->kos_sebenar[$i];
            $request['jumlah_abm'] = $request['jumlah_abm'] + $request->abm[$i];
            $request['jumlah_peruntukan'] = $request['jumlah_peruntukan'] + $request->peruntukan[$i];
            $request['jumlah_peratus_perbelanjaan'] = $request['jumlah_peratus_perbelanjaan'] + $request->peratus_perbelanjaan[$i];
        }

        $jkrpata92->update($request->all());

        foreach (range(0, count($request->info92_id) - 1) as $i) {
            InfoJkrpata92::where('id', $request->info92_id[$i])->update([
                'nama_projek' => $request->nama_projek[$i],
                'saiz_projek' => $request->saiz_projek[$i],
                'pelaksana_projek' => $request->pelaksana_projek[$i],
                'kos_rancang' => $request->kos_rancang[$i],
                'kos_sebenar' => $request->kos_sebenar[$i],
                'abm' => $request->abm[$i],
                'peruntukan' => $request->peruntukan[$i],
                'peratus_perbelanjaan' => $request->peratus_perbelanjaan[$i],
                'tarikh_mula_rancang' => $request->tarikh_mula_rancang[$i],
                'tarikh_siap_rancang' => $request->tarikh_siap_rancang[$i],
                'tarikh_serahan_rancang' => $request->tarikh_serahan_rancang[$i],
                'tarikh_mula_sebenar' => $request->tarikh_mula_sebenar[$i],
                'tarikh_siap_sebenar' => $request->tarikh_siap_sebenar[$i],
                'tarikh_serahan_sebenar' => $request->tarikh_serahan_sebenar[$i],
            ]);
        }
        return redirect('/jkrpata92');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Jkrpata92  $jkrpata92
     * @return \Illuminate\Http\Response
     */
    public function destroy(Jkrpata92 $jkrpata92)
    {
        InfoJkrpata92::where('jkrpata92_id', $jkrpata92->id)->delete();
        $jkrpata92->delete();

        return redirect('/jkrpata92');
    }

    public function generatePdf(Jkrpata92 $jkrpata92)
    {

        $response = Http::post('https://libreoffice.prototype.com.my/cetak/ata92', [$jkrpata92]);

        $res = $response->getBody()->getContents();

        $url = "data:application/pdf;base64," . $res;

        $context = [
            "url" => $url,
            "title" => "jkrpata92",
        ];

        return view('modul.borang_viewer_ata', $context);

    }
}
