<?php

namespace App\Http\Controllers;

use App\Models\DataTanah;
use App\Models\Jkrpataf68;
use App\Models\PermohonanBangunanBahagian1;
use App\Models\PermohonanBangunanBahagian2;
use App\Models\PermohonanBangunanBahagian3;
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
            'jkrpataf68' => PermohonanBangunanBahagian1::all(),
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
    public function destroy($jkrpataf68)
    {
        $jkrpataf68 = PermohonanBangunanBahagian1::where('id', $jkrpataf68)->first();

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

    public function return_edit_page(Request $request, $id) {
        $permohonan = PermohonanBangunanBahagian1::where('id', $id)->first();
        return view('modul.aset_tak_alih.jkrpataf68.edit_bahagian1', [
            'jabatan' => KodJabatan::all(),
            'negara' => DB::table('negara')->get(),
            'negeri' => DB::table('negeri')->get(),
            'permohonan' => $permohonan,
            'data_tanah' => DataTanah::all(),
        ]);
    }

    public function return_create_page() {
        return view('modul.aset_tak_alih.jkrpataf68.create_bahagian1', [
            'jabatan' => KodJabatan::all(),
            'negara' => DB::table('negara')->get(),
            'negeri' => DB::table('negeri')->get(),
            'data_tanah' => DataTanah::all(),
        ]);
    }

    public function save_bahagian_1(Request $request) {
        $out = $request->file('gambar_premis')->store('aset_tak_alih/gambarpremis/gambarpremis');
        $bahagian_1 = PermohonanBangunanBahagian1::create($request->all());
        $bahagian_1['gambar_premis'] = $out;
        $bahagian_1->save();

        foreach(range(1, $bahagian_1->bilangan_blok) as $i) {
            PermohonanBangunanBahagian2::create(
                [
                    "id_bahagian1" => $bahagian_1->id
                ]
            );
        }

        return view('modul.aset_tak_alih.jkrpataf68.pilihan_blok', [
            'blok' => PermohonanBangunanBahagian2::where('id_bahagian1', $bahagian_1->id)->get(),
            'bahagian1_id' => $bahagian_1->id,
        ]);
    }

    public function update_bahagian_1(Request $request, $id) {
        $permohonan = PermohonanBangunanBahagian1::where('id', $id)->first();
        if (gettype($request->gambar_premis) != "string" && $request->gambar_premis != null) {
            $out = $request->file('gambar_premis')->store('aset_tak_alih/gambarpremis/gambarpremis');
            $permohonan->gambar_premis = $out;
        }

        $permohonan->update($request->all());
        $permohonan->save();

        $existing_blok = PermohonanBangunanBahagian2::where('id_bahagian1', $permohonan->id)->get();

        $new_blok = $request->bilangan_blok - count($existing_blok);
        if ($new_blok > 0) {
            foreach (range(0, $new_blok -1) as $i) {
                PermohonanBangunanBahagian2::create(
                    [
                        "id_bahagian1" => $permohonan->id
                    ]
                );
            }
        }

        return view('modul.aset_tak_alih.jkrpataf68.pilihan_blok', [
            'blok' => PermohonanBangunanBahagian2::where('id_bahagian1', $permohonan->id)->get(),
            'bahagian1_id' => $permohonan->id,
        ]);
    }

    public function return_blok_edit_page(Request $request) {
        $bahagian1_id = $request->id_bahagian1;
        $blok_id = $request->blok_id;

        $maklumat_blok = PermohonanBangunanBahagian2::where('id_bahagian1',$bahagian1_id)->where('id', $blok_id)->first();
        return view('modul.aset_tak_alih.jkrpataf68.create_bahagian2', [
            'maklumat_blok' => $maklumat_blok,
        ]);

    }

    public function return_blblok_edit_page(Request $request) {
        $bahagian1_id = $request->id_bahagian1;
        $blok_id = $request->blok_id;

        $maklumat_blok = PermohonanBangunanBahagian2::where('id_bahagian1',$bahagian1_id)->where('id', $blok_id)->first();
        return view('modul.aset_tak_alih.jkrpataf68.create_bahagian2_bl', [
            'maklumat_blok' => $maklumat_blok,
        ]);

    }

    public function updateMaklumatBlok(Request $request, $id) {
        $maklumat_blok = PermohonanBangunanBahagian2::where('id', $id)->first();
        $maklumat_blok->update($request->all());


        
        return redirect()->back();
        
    }

    public function returnBlokPilihanPage(Request $request) {
        $bahagian1_id = $request->bahagian1_id;
        $blok_id = $request->blok_id;

        return view('modul.aset_tak_alih.jkrpataf68.pilihan_blok', [
            'blok' => PermohonanBangunanBahagian2::where('id_bahagian1', $bahagian1_id)->get(),
        ]);
    }

    public function returnArasPilihanPage(Request $request) {
        $blok_id = $request->blok_id;
        $maklumat_blok = PermohonanBangunanBahagian2::where('id', $blok_id)->first();
        $total_aras = (int)$maklumat_blok->bil_aras_atas_tanah + (int)$maklumat_blok->bil_aras_bawah_tanah;

        $existing_aras = PermohonanBangunanBahagian3::where('id_blok', $blok_id)->get();

        $new_aras = $total_aras - count($existing_aras);
        if ($new_aras > 0) {
            foreach (range(0, $new_aras -1) as $i) {
                PermohonanBangunanBahagian3::create(
                    [
                        'id_blok' => $maklumat_blok->id
                    ]
                );
            }
        }

        $link = "pilihan-blok?bahagian1_id=".$maklumat_blok->id_bahagian1."&blok_id=".$blok_id;        
        return view('modul.aset_tak_alih.jkrpataf68.pilihan_aras', [
            'aras' => PermohonanBangunanBahagian3::where('id_blok', $blok_id)->get(),
            'link' => $link
        ]);
    }

    public function returnArasSingle(Request $request) {
        $aras_id = $request->aras_id;

        $aras_data = PermohonanBangunanBahagian3::where('id', $aras_id)->first();
        
        $array_data = [];

      

        if ($aras_data->kod_ruang != null) {
            $length = count(json_decode($aras_data->kod_ruang));

            try {
                foreach(range(0, $length-1) as $i) {
                    $obj = (object)[];
                    $obj->kod_ruang = json_decode($aras_data->kod_ruang)[$i];
                    $obj->nama_ruang = json_decode($aras_data->nama_ruang)[$i];
                    $obj->luas_ruang = json_decode($aras_data->luas_ruang)[$i];
                    $obj->fungsi_ruang = json_decode($aras_data->fungsi_ruang)[$i];
                    $obj->tinggi_ruang = json_decode($aras_data->tinggi_ruang)[$i];
                    // $obj->lampiran = json_decode($aras_data->lampiran)[$i];
                    array_push($array_data, $obj);
                }
        
            }
            catch (\Exception $e) {

            }
            
            $context = (object)[];
            $context->nama_aras = $aras_data->senarai_ruang_untuk_aras;
            $context->list_ruang = $array_data;
        }


        else {
            $context = (object)[];
            $context->list_ruang = [];
        }

        // dd(json_encode($context));


        return view('modul.aset_tak_alih.jkrpataf68.create_bahagian3', [
            'context' => $context,
            'aras' => $aras_data
        ]);
    }

    public function updateMaklumatAras(Request $request, $id) {
        $maklumat_aras = PermohonanBangunanBahagian3::where('id', $id)->first();
        $maklumat_aras->senarai_ruang_untuk_aras = $request->senarai_ruang_untuk_aras;
        $maklumat_aras->kod_ruang = json_encode($request->kod_ruang);
        $maklumat_aras->fungsi_ruang = json_encode($request->fungsi_ruang);
        $maklumat_aras->nama_ruang = json_encode($request->nama_ruang);
        $maklumat_aras->luas_ruang = json_encode($request->luas_ruang);
        $maklumat_aras->tinggi_ruang = json_encode($request->fungsi_ruang);

        $storage_path_array = [];
        
        try {
            if ($request->lampiran != null) {
                foreach (range(0, count($request->lampiran) - 1) as $i) {
                    $path_obj = $request->file('lampiran')[$i]->store('aset_tak_alih/gambarpremis/gambarpremis');
                    array_push($storage_path_array, $path_obj);
                }
            }
        } 
        catch (\Exception $e) {
        }
       
        
        $maklumat_aras->lampiran = json_encode($storage_path_array);
        $maklumat_aras->save();

        return redirect()->back()->with('status', 'success');

    }

    public function deleteBlok(Request $request) {
        $id = $request->id;
        $permohonan_bahagian2 = PermohonanBangunanBahagian2::where('id', $id)->first();
        $permohonan_bahagian2->delete();

        $permohonan1 = PermohonanBangunanBahagian1::where('id', $permohonan_bahagian2->id_bahagian1)->first();
        $permohonan1->bilangan_blok = $permohonan1->bilangan_blok - 1;
        $permohonan1->save();
        return redirect()->back();
    }

    
}
