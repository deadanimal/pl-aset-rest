<?php

namespace App\Http\Controllers;

use App\Models\InfoKewps2;
use Illuminate\Http\Request;

class InfoKewps2Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store($request)
    {
        $info_kewps2 = new InfoKewps2();
        $info_kewps2->kuantiti_ditolak = $request->kuantiti_ditolak;
        $info_kewps2->kuantiti_kurang_lebih = $request->kuantiti_kurang_lebih;
        $info_kewps2->sebab_penolakan = $request->sebab_penolakan;
        $info_kewps2->kewps2_id = $request->kewps2_id;
        $info_kewps2->infokewps1_id = $request->infokewps1_id;
        $info_kewps2->save();

        return $info_kewps2;

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\InfoKewps2  $infoKewps2
     * @return \Illuminate\Http\Response
     */
    public function show(InfoKewps2 $infoKewps2)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\InfoKewps2  $infoKewps2
     * @return \Illuminate\Http\Response
     */
    public function edit(InfoKewps2 $infoKewps2)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\InfoKewps2  $infoKewps2
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $infoKewps2)
    {
        $kewps2_id = $request->kewps2_id;

        InfoKewps2::where('id', $infoKewps2)->update([
            'kuantiti_ditolak' => $request->kuantiti_ditolak,
            'kuantiti_kurang_lebih' => $request->kuantiti_kurang_lebih,
            'sebab_penolakan' => $request->sebab_penolakan,
            'kewps2_id' => $kewps2_id,
            'infokewps1_id' => $request->infokewps1_id,
        ]);
        return redirect("/kewps2/" . $kewps2_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\InfoKewps2  $infoKewps2
     * @return \Illuminate\Http\Response
     */
    public function destroy($infoKewps2)
    {
        $info = InfoKewps2::where('id', $infoKewps2)->first();
        $kewps2_id = $info->kewps2_id;
        $info->delete();

        return redirect("/kewps2/" . $kewps2_id);
    }
}
