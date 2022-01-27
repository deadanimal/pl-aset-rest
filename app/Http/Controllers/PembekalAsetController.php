<?php

namespace App\Http\Controllers;

use App\Models\PembekalAset;
use App\Models\PembekalStor;
use Illuminate\Http\Request;

class PembekalAsetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $active = "aset";
        return view('modul.umum.pembekal_stor.index', [
            'pembekalstor' => PembekalStor::all(),
            'pembekalaset' => PembekalAset::all(),
            'active' => $active,
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        PembekalAset::create($request->all());
        return redirect('/pembekal-aset');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PembekalAset  $pembekalAset
     * @return \Illuminate\Http\Response
     */
    public function show(PembekalAset $pembekalAset)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PembekalAset  $pembekalAset
     * @return \Illuminate\Http\Response
     */
    public function edit(PembekalAset $pembekalAset)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PembekalAset  $pembekalAset
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PembekalAset $pembekalAset)
    {
        $pembekalAset->update($request->all());
        return redirect('/pembekal-aset');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PembekalAset  $pembekalAset
     * @return \Illuminate\Http\Response
     */
    public function destroy(PembekalAset $pembekalAset)
    {
        //
    }
}
