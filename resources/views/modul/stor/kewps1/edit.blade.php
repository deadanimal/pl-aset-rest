@extends('layouts.base_stor') @section('content')
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-white d-inline-block mb-0">Perbadanan Labuan</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="#"><i class="fas fa-file"></i></a></li>
                                <li class="breadcrumb-item"><a href="">kewps1</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid mt--6">
        <form method="POST" action="/kewps1/{{ $kewps1->id }}">
            @method('put')
            @csrf
            <div class="card mt-4">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <h2 class="mb-0">Penentuan Kumpulan Stok</h2>
                        </div>
                    </div>
                </div>

                </br>
                <div class="card-body pt-0">
                    <div class="row">
                        <div class="col-12 mt-3">
                            <label for="">Nama Pembekal</label>
                            <input class="form-control" type="text" name="nama_pembekal"
                                value="{{ $kewps1->nama_pembekal }}">
                        </div>
                        <div class="col-12 mt-3">
                            <label for="">Alamat Pembekal</label>
                            <div class="input-group">
                                <input class="form-control" type="text" name="alamat_pembekal"
                                    value="{{ $kewps1->alamat_pembekal }}">
                            </div>
                        </div>
                        <div class="col-12 mt-3">
                            <label for="">Jenis Penerimaan</label>
                            <div class="input-group">
                                <input class="form-control" type="text" name="jenis_penerimaan"
                                    value="{{ $kewps1->jenis_penerimaan }}">
                            </div>
                        </div>
                        <div class="col-12">
                            <h5 class="mt-4">Pesanan Kerajaan (PK)/ Kontrak/ Surat Kelulusan</h5>
                        </div>
                        <div class="col-6">
                            <label for="">No Rujukan PK</label>
                            <div class="input-group">
                                <input class="form-control" type="text" name="nombor_rujukan_pk"
                                    value="{{ $kewps1->nombor_rujukan_pk }}">
                            </div>
                        </div>
                        <div class="col-6">
                            <label for="">Tarikh</label>
                            <div class="input-group">
                                <input class="form-control" type="date" name="tarikh_pk"
                                    value="{{ $kewps1->tarikh_pk }}">
                            </div>
                        </div>
                        <div class="col-12 mt-4">
                            <h5 class="mt-4">Nota Hantaran</h5>
                        </div>
                        <div class="col-6">
                            <label for="">No DO</label>
                            <div class="input-group">
                                <input class="form-control" type="number" name="nombor_do"
                                    value="{{ $kewps1->nombor_do }}">
                            </div>
                        </div>
                        <div class="col-6">
                            <label for="">Tarikh DO</label>
                            <div class="input-group">
                                <input class="form-control" type="date" name="tarikh_do"
                                    value="{{ $kewps1->tarikh_do }}">
                            </div>
                        </div>
                        <div class="col-12 mt-4">
                            <label for="">Maklumat Pengangkutan</label>
                            <div class="input-group">
                                <input class="form-control" type="text" name="maklumat_pengangkutan"
                                    value="{{ $kewps1->maklumat_pengangkutan }}">
                            </div>
                        </div>
                        <input class="form-control form-control-sm" type="hidden" name="status" value="DERAF">

                        @foreach ($infokewps1 as $ikps1)
                            <div class="col-12 mt-5 mb-0">
                                <h4>Aset {{ $ikps1->id }}</h4>
                            </div>
                            <input class="form-control form-control-sm" type="hidden" name="info_id[]"
                                value="{{ $ikps1->id }}">
                            <div class="col-3 ">
                                <label for="" class="col-form-label col-form-label-sm">No Kod</label>
                                <input class="form-control form-control-sm" type="text" name="no_kod[]"
                                    value="{{ $ikps1->no_kod }}">
                            </div>
                            <div class="col-3 ">
                                <label for="" class="col-form-label col-form-label-sm">Perihal Barang</label>
                                <input class="form-control form-control-sm" type="text" name="perihal_barang[]"
                                    value="{{ $ikps1->perihal_barang }}">
                            </div>
                            <div class="col-3 ">
                                <label for="" class="col-form-label col-form-label-sm">Unit Pengukuran</label>
                                <input class="form-control form-control-sm" type="text" name="unit_pengukuran[]"
                                    value="{{ $ikps1->unit_pengukuran }}">
                            </div>
                            <div class="col-3 ">
                                <label for="" class="col-form-label col-form-label-sm">Kuantiti Dipesan</label>
                                <input class="form-control form-control-sm" type="number" name="kuantiti_dipesan[]"
                                    value="{{ $ikps1->kuantiti_dipesan }}">
                            </div>
                            <div class="col-3">
                                <label for="" class="col-form-label col-form-label-sm">Kuantiti DO</label>
                                <input class="form-control form-control-sm" type="number" name="kuantiti_do[]"
                                    value="{{ $ikps1->kuantiti_do }}">
                            </div>
                            <div class="col-3 mt-2">
                                <label for="" class="col-form-label col-form-label-sm">Kuantiti Diterima</label>
                                <input class="form-control form-control-sm" type="number" name="kuantiti_diterima[]"
                                    value="{{ $ikps1->kuantiti_diterima }}">
                            </div>
                            <div class="col-3 mt-2">
                                <label for="" class="col-form-label col-form-label-sm">Harga Seunit</label>
                                <input class="form-control form-control-sm" type="text" name="harga_seunit[]"
                                    value="{{ $ikps1->harga_seunit }}">
                            </div>
                            <div class="col-3 mt-2">
                                <label for="" class="col-form-label col-form-label-sm">Jumlah Harga</label>
                                <input class="form-control form-control-sm" type="text" name="jumlah_harga[]"
                                    value="{{ $ikps1->jumlah_harga }}">
                            </div>
                            <div class="col-3 mt-2">
                                <label for="" class="col-form-label col-form-label-sm">Catatan</label>
                                <input class="form-control form-control-sm" type="text" name="catatan[]"
                                    value="{{ $ikps1->catatan }}">
                            </div>
                        @endforeach


                        <div class="col-12 mt-3">
                            <button class="btn btn-primary" type="submit">Simpan</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
