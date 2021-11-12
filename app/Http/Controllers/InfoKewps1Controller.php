<?php

namespace App\Http\Controllers;

use App\Models\InfoKewps1;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class InfoKewps1Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('modul.stor.kewps1.create');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
        $request['new'] = 1;
        InfoKewps1::create($request->all());

        return view('modul.stor.kewps1.create', [
            'infokewps1' => InfoKewps1::where('new', '1')->get(),
            'm_nama_pembekal' => $request->m_nama_pembekal,
            'm_alamat_pembekal' => $request->m_alamat_pembekal,
            'm_jenis_penerimaan' => $request->m_jenis_penerimaan,
            'm_nombor_rujukan_pk' => $request->m_nombor_rujukan_pk,
            'm_tarikh_pk' => $request->m_tarikh_pk,
            'm_nombor_do' => (int) ($request->m_nombor_do),
            'm_tarikh_do' => $request->m_tarikh_do,
            'm_maklumat_pengangkutan' => $request->m_maklumat_pengangkutan,
        ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\InfoKewps1  $infoKewps1
     * @return \Illuminate\Http\Response
     */
    public function show($infoKewps1)
    {
        $infoKewps1 = InfoKewps1::where('id', $infoKewps1)->first();

        return view('modul.stor.kewps1.info', [
            'infokewps1' => $infoKewps1,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\InfoKewps1  $infoKewps1
     * @return \Illuminate\Http\Response
     */
    public function edit(InfoKewps1 $infoKewps1)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\InfoKewps1  $infoKewps1
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $infoKewps1)
    {
        $infoKewps1 = InfoKewps1::where('id', $infoKewps1);

        $infoKewps1->update([
            'perihal_barang' => $request->perihal_barang,
            'unit_pengukuran' => $request->unit_pengukuran,
            'kuantiti_dipesan' => $request->kuantiti_dipesan,
            'kuantiti_do' => $request->kuantiti_do,
            'kuantiti_diterima' => $request->kuantiti_diterima,
            'harga_seunit' => $request->harga_seunit,
            'jumlah_harga' => $request->jumlah_harga,
            'catatan' => $request->catatan,
        ]);

        $ikewps1 = $infoKewps1->first()->kewps1_id;
        return redirect("/kewps1/" . $ikewps1);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\InfoKewps1  $infoKewps1
     * @return \Illuminate\Http\Response
     */
    public function destroy($infoKewps1, Request $request)
    {
        $info = InfoKewps1::where('new', '1')->get();

        InfoKewps1::where('id', $infoKewps1)->first()->delete();
        // dd($info);
        // return redirect()->back()->with('infokewps1', $info);
        return redirect('/kewps1/create');

        // return view('modul.stor.kewps1.create', [
        //     'infokewps1' => InfoKewps1::where('new', '1')->get(),
        // ]);

    }
}
