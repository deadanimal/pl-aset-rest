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
                            <h2 class="mb-0">Borang Permohonan Stok (Antara Stor)</h2>
                        </div>
                    </div>
                </div>

                </br>
                <div class="card-body pt-0">
                    <div class="row">
                        <div class="col-3 mt-3">
                            <label for="">Nama Stor Pemesan</label>
                            <div class="input-group">
                                <input class="form-control" type="text" name="nama_stor_pemesan"
                                    value="{{ $kewps7->nama_stor_pemesan }}">
                            </div>
                        </div>
                        <div class="col-3 mt-3">
                            <label for="">Alamat Stor Pemesan</label>
                            <div class="input-group">
                                <input class="form-control" type="text" name="alamat_stor_pemesan"
                                    value="{{ $kewps7->alamat_stor_pemesan }}">
                            </div>
                        </div>
                        <div class="col-3 mt-3">
                            <label for="">Nama Stor Pengeluar</label>
                            <div class="input-group">
                                <input class="form-control" type="text" name="nama_stor_pengeluar"
                                    value="{{ $kewps7->nama_stor_pengeluar }}">
                            </div>
                        </div>
                        <div class="col-3 mt-3">
                            <label for="">Alamat Stor Pengeluar</label>
                            <div class="input-group">
                                <input class="form-control" type="text" name="alamat_stor_pengeluar"
                                    value="{{ $kewps7->alamat_stor_pengeluar }}">
                            </div>
                        </div>


                    </div>

                    <div class="row" id="info_kewps7">
                        @foreach ($kewps7->infokewps7 as $k7)
                            <input type="hidden" name="info7_id[]" value="{{ $k7->id }}">
                            <div class="col-12 mt-2 mb-2">
                                <h3 class="mt-4">Aset {{ $loop->iteration }}</h3>
                            </div>
                            <div class="col-12 mt-3">
                                <label for="">No Kod</label>
                                <select class="form-control" name="kewps3a_id[]">
                                    <option selected value="{{ $k7->kewps3a_id }}">{{ $k7->kewps3a_id }}</option>
                                    @foreach ($kewps3a as $k3a)
                                        @if ($k3a->id != $k7->kewps3a_id)
                                            <option value="{{ $k3a->id }}">{{ $k3a->id }}
                                            </option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-3 mt-3">
                                <label for="">Catatan Pemohon</label>
                                <div class="input-group">
                                    <input class="form-control" type="text" name="catatan_pemohon[]"
                                        value="{{ $k7->catatan_pemohon }}">
                                </div>
                            </div>
                            <div class="col-3 mt-3">
                                <label for="">Kuantiti Dimohon</label>
                                <div class="input-group">
                                    <input class="form-control" type="number" name="kuantiti_dimohon[]"
                                        value="{{ $k7->kuantiti_dimohon }}">
                                </div>
                            </div>
                            <div class="col-3 mt-3">
                                <label for="">Kuantiti Diluluskan</label>
                                <div class="input-group">
                                    <input class="form-control" type="number" name="kuantiti_diluluskan[]"
                                        value="{{ $k7->kuantiti_diluluskan }}">
                                </div>
                            </div>
                            <div class="col-3 mt-3">
                                <label for="">Catatan Pelulus</label>
                                <div class="input-group">
                                    <input class="form-control" type="text" name="catatan_pelulus[]"
                                        value="{{ $k7->catatan_pelulus }}">
                                </div>
                            </div>
                            <div class="col-4 mt-3">
                                <label for="">Kuantiti Dikeluarkan</label>
                                <div class="input-group">
                                    <input class="form-control" type="number" name="kuantiti_dikeluarkan[]"
                                        value="{{ $k7->kuantiti_dikeluarkan }}">
                                </div>
                            </div>
                            <div class="col-4 mt-3">
                                <label for="">Pembungkusan</label>
                                <select class="form-control" name="pembungkusan[]">
                                    <option selected value="Tidak Perlu">Tidak Perlu</option>
                                    <option value="Perlu">Perlu</option>
                                </select>
                            </div>
                            <div class="col-4 mt-3">
                                <label for="">Kuantiti Diterima</label>
                                <div class="input-group">
                                    <input class="form-control" type="number" name="kuantiti_diterima[]"
                                        value="{{ $k7->kuantiti_diterima }}">
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <button class="btn btn-primary mt-5" type="submit">Simpan</button>
                </div>
            </div>
        </form>
    </div>


@endsection
