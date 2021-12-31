<?php

namespace App\Http\Controllers;

use App\Models\Gambarblok;
use App\Models\SenaraiBlokBangunan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GambarblokController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('modul.aset_tak_alih.gambarblok.index', [
            'gambarblok' => Gambarblok::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('modul.aset_tak_alih.gambarblok.create', [
            'blokbangunan' => SenaraiBlokBangunan::all(),
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
        $request['gambar_hadapan'] = $request->file('gambar_hadapan1')->store('aset_tak_alih/gambar-blok');
        $request['gambar_belakang'] = $request->file('gambar_belakang1')->store('aset_tak_alih/gambar-blok');
        Gambarblok::create($request->all());

        return redirect('/gambarblok');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Gambarblok  $gambarblok
     * @return \Illuminate\Http\Response
     */
    public function show(Gambarblok $gambarblok)
    {
        return view('modul.aset_tak_alih.gambarblok.edit', [
            'blokbangunan' => SenaraiBlokBangunan::all(),
            'gambarblok' => $gambarblok,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Gambarblok  $gambarblok
     * @return \Illuminate\Http\Response
     */
    public function edit(Gambarblok $gambarblok)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Gambarblok  $gambarblok
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Gambarblok $gambarblok)
    {
        if ($request->file('gambar_hadapan1')) {
            Storage::delete($gambarblok->gambar_hadapan);
            $request['gambar_hadapan'] = $request->file('gambar_hadapan1')->store('gambar-blok');
        } else {
            $request['gambar_hadapan'] = $gambarblok->gambar_hadapan;
        }
        if ($request->file('gambar_belakang1')) {
            Storage::delete($gambarblok->gambar_belakang);
            $request['gambar_belakang'] = $request->file('gambar_belakang1')->store('gambar-blok');
        } else {
            $request['gambar_belakang'] = $gambarblok->gambar_belakang;
        }
        $gambarblok->update($request->all());
        return redirect('/gambarblok');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Gambarblok  $gambarblok
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gambarblok $gambarblok)
    {
        Storage::delete($gambarblok->gambar_belakang);
        Storage::delete($gambarblok->gambar_hadapan);
        $gambarblok->delete();
        return redirect('/gambarblok');
    }
}
