<?php

namespace App\Http\Controllers;

use App\Models\Jkrpataf68;
use App\Models\Jkrpataf114;
use Illuminate\Http\Request;

class Jkrpataf114Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('modul.aset_tak_alih.jkrpataf114.index', [
            'jkrpataf114' => Jkrpataf114::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('modul.aset_tak_alih.jkrpataf114.create', [
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
        Jkrpataf114::create($request->all());

        return redirect('/jkrpataf114');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Jkrpataf114  $jkrpataf114
     * @return \Illuminate\Http\Response
     */
    public function show(Jkrpataf114 $jkrpataf114)
    {
        return view('modul.aset_tak_alih.jkrpataf114.edit', [
            'jkrpataf68' => Jkrpataf68::all(),
            'jkrpataf114' => $jkrpataf114,
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Jkrpataf114  $jkrpataf114
     * @return \Illuminate\Http\Response
     */
    public function edit(Jkrpataf114 $jkrpataf114)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Jkrpataf114  $jkrpataf114
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Jkrpataf114 $jkrpataf114)
    {
        $jkrpataf114->update($request->all());
        return redirect('/jkrpataf114');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Jkrpataf114  $jkrpataf114
     * @return \Illuminate\Http\Response
     */
    public function destroy(Jkrpataf114 $jkrpataf114)
    {
        $jkrpataf114->delete();
        return redirect('/jkrpataf114');

    }
}
