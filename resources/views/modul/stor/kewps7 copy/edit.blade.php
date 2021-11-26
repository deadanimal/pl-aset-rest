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
                                <li class="breadcrumb-item"><a href="">kewps7</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid mt--6">
        <form method="POST" action="/kewps7/{{ $kewps7->id }}">
            @method('put')
            @csrf
            <div class="card mt-4">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <h2 class="mb-0">Permohonan Stok</h2>
                        </div>
                    </div>
                </div>

                </br>
                <div class="card-body pt-0">
                    <div class="row">
                        <div class="col-12">
                            <label for="">Nama Stor Pemesan</label>
                            <input class="form-control mb-3" type="text" name="nama_stor_pemesan"
                                value="{{ $kewps7->nama_stor_pemesan }}">
                        </div>
                        <div class="col-12">
                            <label for="">Alamat Stor Pemesan</label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="text" name="alamat_stor_pemesan"
                                    value="{{ $kewps7->alamat_stor_pemesan }}">
                            </div>
                        </div>
                        <div class="col-12">
                            <label for="">Kuantiti Dipohon</label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="number" name="kuantiti_dimohon"
                                    value="{{ $kewps7->kuantiti_dimohon }}">
                            </div>
                        </div>
                        <div class="col-12">
                            <label for="">Catatan Pemohon</label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="text" name="catatan_pemohon"
                                    value="{{ $kewps7->catatan_pemohon }}">
                            </div>
                        </div>
                        <div class="col-12">
                            <label for="">Kuantiti Diluluskan</label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="number" name="kuantiti_diluluskan"
                                    value="{{ $kewps7->kuantiti_diluluskan }}">
                            </div>
                        </div>
                        <div class="col-12">
                            <label for="">Catatan Pelulus</label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="text" name="catatan_pelulus"
                                    value="{{ $kewps7->catatan_pelulus }}">
                            </div>
                        </div>
                        <div class="col-12">
                            <label for="">Kuantiti Dikeluarkan</label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="number" name="kuantiti_dikeluarkan"
                                    value="{{ $kewps7->kuantiti_dikeluarkan }}">
                            </div>
                        </div>
                        <div class="col-12">
                            <label for="">Pembungkusan</label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="text" name="pembungkusan"
                                    value="{{ $kewps7->pembungkusan }}">
                            </div>
                        </div>
                        <div class="col-12">
                            <label for="">Kuantiti Diterima</label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="number" name="kuantiti_diterima"
                                    value="{{ $kewps7->kuantiti_diterima }}">
                            </div>
                        </div>
                        <div class="col-12">
                            <label for="">Pemohon ID</label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="text" name="pemohon_id"
                                    value="{{ $kewps7->pemohon_id }}">
                            </div>
                        </div>
                        <div class="col-12">
                            <label for="">Penerima ID</label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="text" name="penerima_id"
                                    value="{{ $kewps7->penerima_id }}">
                            </div>
                        </div>
                        <div class="col-12">
                            <label for="">Pelulus ID</label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="text" name="pelulus_id"
                                    value="{{ $kewps7->pelulus_id }}">
                            </div>
                        </div>
                        <div class="col-12">
                            <label for="">Pengeluar ID</label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="text" name="pengeluar_id"
                                    value="{{ $kewps7->pengeluar_id }}">
                            </div>
                        </div>

                        <div class="col-12">
                            <button class="btn btn-primary" type="submit">Simpan</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
