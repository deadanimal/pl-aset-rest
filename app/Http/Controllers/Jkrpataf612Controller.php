<?php

namespace App\Http\Controllers;

use App\Models\Jkrpataf68;
use App\Models\Jkrpataf612;
use App\Models\SenaraiBinaanLuar;
use App\Models\SenaraiBlokBangunan;
// use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\View;
use Barryvdh\DomPDF\Facade as PDF;
use Dompdf\Dompdf;
use Dompdf\Options;

class Jkrpataf612Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('modul.aset_tak_alih.jkrpataf612.index', [
            'jkrpataf612' => Jkrpataf612::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jkrpataf68_id[] = "";
        $jkrpataf612 = Jkrpataf612::all();
        foreach ($jkrpataf612 as $i) {
            $jkrpataf68_id[] = $i->jkrpataf68_id;
        }

        return view('modul.aset_tak_alih.jkrpataf612.create', [
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
        if ($request->nama_blok) {
            $request['bil_blok_bangunan'] = count($request->nama_blok);
        } else {
            $request['bil_blok_bangunan'] = 0;
        }
        if ($request->nama_binaan_luar) {
            $request['bil_binaan_luar'] = count($request->nama_binaan_luar);
        } else {
            $request['bil_binaan_luar'] = 0;
        }

        $jkrpataf612 = Jkrpataf612::create($request->all());

        if ($request->nama_blok) {
            foreach (range(0, count($request->nama_blok) - 1) as $i) {
                SenaraiBlokBangunan::create([
                    'nama_blok' => $request->nama_blok[$i],
                    'luas_tapak' => $request->luas_tapak[$i],
                    'catatan' => $request->catatan1[$i],
                    'from_page' => $request->from_page[$i],
                    'to_page' => $request->to_page[$i],
                    'staff_id' => $request->staff_id,
                    'jkrpataf612_id' => $jkrpataf612->id,
                ]);
            }
        }

        if ($request->nama_binaan_luar) {
            foreach (range(0, count($request->nama_binaan_luar) - 1) as $i) {
                SenaraiBinaanLuar::create([
                    'nama_binaan_luar' => $request->nama_binaan_luar[$i],
                    'luas_tapak' => $request->luas_tapak2[$i],
                    'catatan' => $request->catatan2[$i],
                    'from_page' => $request->from_page2[$i],
                    'to_page' => $request->to_page2[$i],
                    'staff_id' => $request->staff_id,
                    'jkrpataf612_id' => $jkrpataf612->id,
                ]);
            }
        }

        return redirect('/jkrpataf612');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Jkrpataf612  $jkrpataf612
     * @return \Illuminate\Http\Response
     */
    public function show(Jkrpataf612 $jkrpataf612)
    {

        return view('modul.aset_tak_alih.jkrpataf612.edit', [
            'jkrpataf68' => Jkrpataf68::all(),
            'jkrpataf612' => $jkrpataf612,

        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Jkrpataf612  $jkrpataf612
     * @return \Illuminate\Http\Response
     */
    public function edit(Jkrpataf612 $jkrpataf612)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Jkrpataf612  $jkrpataf612
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Jkrpataf612 $jkrpataf612)
    {
        $jkrpataf612->update($request->all());

        // if ($request->nama_blok) {
        //     foreach (range(0, count($request->nama_blok) - 1) as $i) {
        //         SenaraiBlokBangunan::where('id', $request->bb_id[$i])->update([
        //             'nama_blok' => $request->nama_blok[$i],
        //             'luas_tapak' => $request->luas_tapak[$i],
        //             'catatan' => $request->catatan1[$i],
        //             'from_page' => $request->from_page[$i],
        //             'to_page' => $request->to_page[$i],
        //             'staff_id' => $request->staff_id,
        //         ]);
        //     }
        // }

        // if ($request->nama_binaan_luar) {
        //     foreach (range(0, count($request->nama_binaan_luar) - 1) as $i) {
        //         SenaraiBinaanLuar::where('id', $request->bl_id[$i])->update([
        //             'nama_binaan_luar' => $request->nama_binaan_luar[$i],
        //             'luas_tapak' => $request->luas_tapak2[$i],
        //             'catatan' => $request->catatan2[$i],
        //             'from_page' => $request->from_page2[$i],
        //             'to_page' => $request->to_page2[$i],
        //             'staff_id' => $request->staff_id,
        //         ]);
        //     }
        // }

        return redirect('/jkrpataf612');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Jkrpataf612  $jkrpataf612
     * @return \Illuminate\Http\Response
     */
    public function destroy(Jkrpataf612 $jkrpataf612)
    {
        SenaraiBlokBangunan::where('jkrpataf612_id', $jkrpataf612->id)->delete();
        SenaraiBinaanLuar::where('jkrpataf612_id', $jkrpataf612->id)->delete();

        $jkrpataf612->delete();

        return redirect('/jkrpataf612');
    }

    public function generatePdf(Jkrpataf612 $jkrpataf612)
    {
        $no_dpa = str_split($jkrpataf612->jkrpataf68_id);
        $pdff = new Dompdf();
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isRemoteEnabled', true);
        $pdff->setOptions($options);
        $pdff->loadHtml(view('modul.aset_tak_alih.jkrpataf612.doc', [
            'j' => $jkrpataf612,
            'no_dpa' => $no_dpa
        ]));
        $customPaper = array(2, -35, 480, 627);
        $pdff->setPaper($customPaper);
        $pdff->render();
        $pdff->stream(
            "newdompdf",
            array("Attachment" => false)
        );

        exit(0);


        // view()->share('j612', $jkrpataf612);
        // $pdf = PDF::loadView('modul.z612', $jkrpataf612);
        // return $pdf->download('pdf_file.pdf');
    }
}
