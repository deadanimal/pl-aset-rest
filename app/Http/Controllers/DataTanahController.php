<?php

namespace App\Http\Controllers;

use App\Models\DataTanah;
use App\Models\Jkrpataf68;
use Illuminate\Http\Request;

class DataTanahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $jenis = $request->jenis;

        return view('modul.aset_tak_alih.datatanah.index', [
            'datatanah' => DataTanah::all(),
            'jenis' => $jenis,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('modul.aset_tak_alih.datatanah.create', [
            'jkrpataf68' => Jkrpataf68::all(),
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
        $gambar_premis_path = $request->file('gambar_premis')->store('gambar_premis');
        $datatanah = DataTanah::create($request->all());
        $datatanah->gambar_premis = $gambar_premis_path;
        $datatanah->save();

        return redirect('/datatanah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DataTanah  $dataTanah
     * @return \Illuminate\Http\Response
     */
    public function show(DataTanah $datatanah)
    {
        return view('modul.aset_tak_alih.datatanah.edit', [
            'dt' => $datatanah,
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DataTanah  $dataTanah
     * @return \Illuminate\Http\Response
     */
    public function edit(DataTanah $dataTanah)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DataTanah  $dataTanah
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DataTanah $datatanah)
    {
        $datatanah->update($request->all());

        if ($request->file('gambar_premis') != null) {
            $gambar_premis_path = $request->file('gambar_premis')->store('gambar_premis');
            $datatanah->gambar_premis = $gambar_premis_path;
            $datatanah->save();
        }

        return redirect('/datatanah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DataTanah  $dataTanah
     * @return \Illuminate\Http\Response
     */
    public function destroy(DataTanah $datatanah)
    {
        $datatanah->delete();
        return redirect('/datatanah');
    }
}
