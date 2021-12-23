<?php

namespace App\Http\Controllers;

use App\Models\Kewps4;
use App\Models\ParasStok;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ParasStokController extends Controller
{


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $ps = ParasStok::create($request->all());

        if ($ps) {
            $harga_seunit = $ps->kewps3a->kewps1->harga_seunit;

            $nilai_baki_semasa = $request->maksimum_stok * $harga_seunit;
            Kewps4::create([
                'nilai_baki_semasa' => $nilai_baki_semasa,
                'status_stok' => $ps->kewps3a->pergerakan,
                'kewps3a_id' => $request->kewps3a_id,
                'user_id' => Auth::user()->id
            ]);
        }

        return redirect('/kewps3a/' . $request->kewps3a_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ParasStok  $parasStok
     * @return \Illuminate\Http\Response
     */
    public function show(ParasStok $parasStok)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ParasStok  $parasStok
     * @return \Illuminate\Http\Response
     */
    public function edit(ParasStok $parasStok)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ParasStok  $parasStok
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ParasStok $parasstok)
    {
        $parasstok->update($request->all());
        return redirect('/kewps3a/' . $parasstok->kewps3a_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ParasStok  $parasStok
     * @return \Illuminate\Http\Response
     */
    public function destroy(ParasStok $parasstok)
    {
        $parasstok->delete();
        return redirect('/kewps3a/' . $parasstok->kewps3a_id);
    }
}
