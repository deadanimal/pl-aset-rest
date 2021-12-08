<?php

namespace App\Http\Controllers;

use App\Models\Jkrpataf68;
use App\Models\Jkrpataf104;
use Illuminate\Http\Request;

class Jkrpataf104Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('modul.aset_tak_alih.jkrpataf104.index', [
            'jkrpataf104' => Jkrpataf104::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jkrpataf68_id[] = null;
        $jkrpataf104 = Jkrpataf104::all();

        foreach ($jkrpataf104 as $i) {
            $jkrpataf68_id[] = $i->jkrpataf68_id;
        }

        return view('modul.aset_tak_alih.jkrpataf104.create', [
            'jkrpataf68' => Jkrpataf68::all(),
            'check' => $jkrpataf68_id,
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
        Jkrpataf104::create($request->all());

        return redirect('/jkrpataf104');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Jkrpataf104  $jkrpataf104
     * @return \Illuminate\Http\Response
     */
    public function show(Jkrpataf104 $jkrpataf104)
    {
        return view('modul.aset_tak_alih.jkrpataf104.edit', [
            'jkrpataf68' => Jkrpataf68::all(),
            'jkrpataf104' => $jkrpataf104,
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Jkrpataf104  $jkrpataf104
     * @return \Illuminate\Http\Response
     */
    public function edit(Jkrpataf104 $jkrpataf104)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Jkrpataf104  $jkrpataf104
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Jkrpataf104 $jkrpataf104)
    {
        $jkrpataf104->update($request->all());
        return redirect('/jkrpataf104');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Jkrpataf104  $jkrpataf104
     * @return \Illuminate\Http\Response
     */
    public function destroy(Jkrpataf104 $jkrpataf104)
    {
        $jkrpataf104->delete();
        return redirect('/jkrpataf104');

    }
}
