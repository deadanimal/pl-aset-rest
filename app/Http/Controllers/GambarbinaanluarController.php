<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gambarbinaanluar;
use App\Models\SenaraiBinaanLuar;
use Illuminate\Support\Facades\Storage;

class GambarbinaanluarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('modul.aset_tak_alih.gambarbinaanluar.index', [
            'gambarbinaanluar' => Gambarbinaanluar::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('modul.aset_tak_alih.gambarbinaanluar.create', [
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
        $request['gambar_hadapan'] = $request->file('gambar_hadapan1')->store('aset_tak_alih/gambar-binaanluar');
        $request['gambar_belakang'] = $request->file('gambar_belakang1')->store('aset_tak_alih/gambar-binaanluar');

        Gambarbinaanluar::create($request->all());



        return redirect('/gambarbinaanluar');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Gambarbinaanluar  $gambarbinaanluar
     * @return \Illuminate\Http\Response
     */
    public function show(Gambarbinaanluar $gambarbinaanluar)
    {
        return view('modul.aset_tak_alih.gambarbinaanluar.edit', [
            'binaanluar' => SenaraiBinaanLuar::all(),
            'gambarbinaanluar' => $gambarbinaanluar,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Gambarbinaanluar  $gambarbinaanluar
     * @return \Illuminate\Http\Response
     */
    public function edit(Gambarbinaanluar $gambarbinaanluar)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Gambarbinaanluar  $gambarbinaanluar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Gambarbinaanluar $gambarbinaanluar)
    {
        if ($request->file('gambar_hadapan1')) {
            Storage::delete($gambarbinaanluar->gambar_hadapan);
            $request['gambar_hadapan'] = $request->file('gambar_hadapan1')->store('gambar-binaanluar');
        } else {
            $request['gambar_hadapan'] = $gambarbinaanluar->gambar_hadapan;
        }
        if ($request->file('gambar_belakang1')) {
            Storage::delete($gambarbinaanluar->gambar_belakang);
            $request['gambar_belakang'] = $request->file('gambar_belakang1')->store('gambar-binaanluar');
        } else {
            $request['gambar_belakang'] = $gambarbinaanluar->gambar_belakang;
        }

        $gambarbinaanluar->update($request->all());
        return redirect('/gambarbinaanluar');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Gambarbinaanluar  $gambarbinaanluar
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gambarbinaanluar $gambarbinaanluar)
    {
        Storage::delete($gambarbinaanluar->gambar_belakang);
        Storage::delete($gambarbinaanluar->gambar_hadapan);

        $gambarbinaanluar->delete();
        return redirect('/gambarbinaanluar');
    }
}
