<?php

namespace App\Http\Controllers;

use App\Models\PembekalStor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class PembekalStorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('modul.umum.pembekal_stor.index', [
            'pembekalstor' => PembekalStor::all()
        ]);
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
        PembekalStor::create($request->all());
        return redirect('/pembekal_stor');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PembekalStor  $pembekalStor
     * @return \Illuminate\Http\Response
     */
    public function show(PembekalStor $pembekalStor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PembekalStor  $pembekalStor
     * @return \Illuminate\Http\Response
     */
    public function edit(PembekalStor $pembekalStor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PembekalStor  $pembekalStor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PembekalStor $pembekal_stor)
    {
        $pembekal_stor->update($request->all());
        return redirect('/pembekal_stor');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PembekalStor  $pembekalStor
     * @return \Illuminate\Http\Response
     */
    public function destroy(PembekalStor $pembekal_stor)
    {
        $pembekal_stor->delete();
        return redirect('/pembekal_stor');
    }
}
