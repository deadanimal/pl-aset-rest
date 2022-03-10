<?php

namespace App\Http\Controllers;

use App\Models\DataTanah;
use App\Models\Jkrpataf68;
use App\Models\KodJabatan;
use Dompdf\Dompdf;
use Dompdf\Options;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class Jkrpataf68Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('modul.aset_tak_alih.jkrpataf68.index', [
            'jkrpataf68' => Jkrpataf68::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('modul.aset_tak_alih.jkrpataf68.create', [
            'jabatan' => KodJabatan::all(),
            'negara' => DB::table('negara')->get(),
            'negeri' => DB::table('negeri')->get(),

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

        // dd(asset('aset_alih/gambarpremis/rBcK2nMUMkIPIkMOoVOpzd0YpBOIXrh5NYsbWUTN.png'));
        $out = $request->file('gambar_premis')->store('aset_tak_alih/gambarpremis/gambarpremis');
        $jkrpataf68['gambar_premis'] = $out;
        $jkrpataf68 = Jkrpataf68::create($request->all());

        $jkrpataf68->update([
            'gambar_premis' => $out,
        ]);

        return redirect('/jkrpataf68');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Jkrpataf68  $jkrpataf68
     * @return \Illuminate\Http\Response
     */
    public function show(Jkrpataf68 $jkrpataf68)
    {

        return view('modul.aset_tak_alih.jkrpataf68.edit', [
            'jkrpataf68' => $jkrpataf68,
            'jabatan' => KodJabatan::all(),
            'negara' => DB::table('negara')->get(),
            'negeri' => DB::table('negeri')->get(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Jkrpataf68  $jkrpataf68
     * @return \Illuminate\Http\Response
     */
    public function edit(Jkrpataf68 $jkrpataf68)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Jkrpataf68  $jkrpataf68
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Jkrpataf68 $jkrpataf68)
    {

        if ($request->file('gambar_premis')) {
            Storage::delete($jkrpataf68->gambar_premis);
        }

        $jkrpataf68->update($request->all());

        if ($request->file('gambar_premis')) {
            $out = $request->file('gambar_premis')->store('aset_tak_alih/gambarpremis/gambarpremis');
            $jkrpataf68['gambar_premis'] = $out;
            $jkrpataf68->update([
                'gambar_premis' => $out,
            ]);

        }
        return redirect('/jkrpataf68');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Jkrpataf68  $jkrpataf68
     * @return \Illuminate\Http\Response
     */
    public function destroy(Jkrpataf68 $jkrpataf68)
    {
        Storage::delete($jkrpataf68->gambar_premis);
        DataTanah::where('jkrpataf68_id', $jkrpataf68->id)->delete();
        $jkrpataf68->delete();
        return redirect('/jkrpataf68');
    }
    public function generatePdf2(Jkrpataf68 $jkrpataf68)
    {
        $response = Http::post('https://libreoffice.prototype.com.my/cetak/ata68', [$jkrpataf68]);

        $res = $response->getBody()->getContents();

        $url = "data:application/pdf;base64," . $res;

        $context = [
            "url" => $url,
            "title" => "jkrpataf68",
        ];

        return view('modul.borang_viewer_ata', $context);
    }
    public function generatePdf(Jkrpataf68 $jkrpataf68)
    {

        // dd(base_path());

        // return view('modul.aset_tak_alih.jkrpataf68.doc', ['jkrpataf68' => $jkrpataf68]);


      
       

        $pdff = new Dompdf();
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isRemoteEnabled', true);
        $pdff->setOptions($options);
        $pdff->loadHtml(view('modul.aset_tak_alih.jkrpataf68.doc', [
            'jkrpataf68' => $jkrpataf68,
        ]));
        $customPaper = array(50, -60, 500, 560);
        $pdff->setPaper($customPaper);
        $pdff->render();
        $pdff->stream(
            "newdompdf",
            array("Attachment" => false)
        );

        exit(0);


 

        // view()->share('jkrpataf68', $jkrpataf68);
        // $pdf = PDF::loadView('modul.aset_tak_alih.jkrpataf68.doc', $jkrpataf68);
        // return $pdf->download('pdf_file.pdf');
    }

    public function generatePdfPermohonanTanah(Request $request)
    {
        
        $jkrpataf68 = DataTanah::where('id', $request->id)->first();
        $data = base64_encode(Storage::get($jkrpataf68->gambar_premis));
        $jkrpataf68->gambar_premis = "data:image/png;base64, ".$data;
        
        // dd($jkrpataf68->gambar_premis);
        $pdff = new Dompdf();
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isRemoteEnabled', true);
        $pdff->setOptions($options);
        $pdff->loadHtml(view('modul.aset_tak_alih.jkrpataf68.doc', [
            'jkrpataf68' => $jkrpataf68,
        ]));
        $customPaper = array(50, -60, 500, 560);
        $pdff->setPaper($customPaper);
        $pdff->render();
        $pdff->stream(
            "newdompdf",
            array("Attachment" => false)
        );

       

        exit(0);
    }
}
