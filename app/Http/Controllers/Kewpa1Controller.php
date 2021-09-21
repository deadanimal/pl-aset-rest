<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kewpa1;

class Kewpa1Controller extends Controller
{
    public function index()
    {
      return Kewpa1::all();
    }

    public function store(Request $request)
    {
      return Kewpa1::create([

        'rujukan_kewpa1' => request('rujukan_kewpa1'),
        'nama_pembekal' => request('nama_pembekal'),
        'alamat_pembekal' => request('alamat_pembekal'),
        'jenis_penerimaan' => request('jenis_penerimaan'),
        'no_rujukan_pesanan' => request('no_rujukan_pesana'),
        'tarikh_pesanan_kontrak' => request('tarikh_pesanan_kontrak'),
        'no_rujukan_hantaran' => request('no_rujukan_hantaran'),
        'tarikh_nota_hantaran' => request('tarikh_nota_hantaran'),
        'maklumat_pengangkutan' => request('maklumat_pengangkutan'),
        'date_created' => request('date_created'),
        'date_modified' => request('date_modified'),
        'pegawai_penerima' => request('pegawai_penerima'),
        'pegawai_teknikal' => request('pegawai_teknikal'),

      ]);    

    }

    public function update(Request $request, Kewpa1 $kewpa1)
    {
      return $kewpa1->update([

        'rujukan_kewpa1' => request('rujukan_kewpa1'),
        'nama_pembekal' => request('nama_pembekal'),
        'alamat_pembekal' => request('alamat_pembekal'),
        'jenis_penerimaan' => request('jenis_penerimaan'),
        'no_rujukan_pesana' => request('no_rujukan_pesana'),
        'tarikh_pesanan_kontrak' => request('tarikh_pesanan_kontrak'),
        'no_rujukan_hantaran' => request('no_rujukan_hantaran'),
        'tarikh_nota_hantaran' => request('tarikh_nota_hantaran'),
        'maklumat_pengangkutan' => request('maklumat_pengangkutan'),
        'date_created' => request('date_created'),
        'date_modified' => request('date_modified'),
        'pegawai_penerima' => request('pegawai_penerima'),
        'pegawai_teknikal' => request('pegawai_teknikal'),

      ]);
    }

    public function destroy(Kewpa1 $kewpa1)
    {
      return $kewpa1->delete();
    }
}
