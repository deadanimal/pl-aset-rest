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
                                <li class="breadcrumb-item"><a href="">kewps8</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid mt--6">
        <form method="POST" action="/kewps8/{{ $kewps8->id }}">
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
                            <label for="">Kuantiti Dipohon</label>
                            <input class="form-control mb-3" type="number" name="kuantiti_dimohon"
                                value="{{ $kewps8->kuantiti_dimohon }}">
                        </div>
                        <div class="col-12">
                            <label for="">Catatan Pemohon</label>
                            <input class="form-control mb-3" type="text" name="catatan_pemohon"
                                value="{{ $kewps8->catatan_pemohon }}">
                        </div>
                        <div class="col-12">
                            <label for="">Kuantiti Diluluskan</label>
                            <input class="form-control mb-3" type="number" name="kuantiti_diluluskan"
                                value="{{ $kewps8->kuantiti_diluluskan }}">
                        </div>
                        <div class="col-12">
                            <label for="">Catatan Pelulus</label>
                            <input class="form-control mb-3" type="text" name="catatan_pelulus"
                                value="{{ $kewps8->catatan_pelulus }}">
                        </div>
                        <div class="col-12">
                            <label for="">Kuantiti Diterima</label>
                            <input class="form-control mb-3" type="number" name="kuantiti_diterima"
                                value="{{ $kewps8->kuantiti_diterima }}">
                        </div>
                        <div class="col-12">
                            <label for="">Catatan Penerima</label>
                            <input class="form-control mb-3" type="text" name="catatan_penerima"
                                value="{{ $kewps8->catatan_penerima }}">
                        </div>
                        <div class="col-12">
                            <label for="">Pemohon ID</label>
                            <input class="form-control mb-3" type="text" name="pemohon_id"
                                value="{{ $kewps8->pemohon_id }}">
                        </div>
                        <div class="col-12">
                            <label for="">Pelulus ID</label>
                            <input class="form-control mb-3" type="text" name="pelulus_id"
                                value="{{ $kewps8->pelulus_id }}">
                        </div>
                        <div class="col-12">
                            <label for="">Penerima ID</label>
                            <input class="form-control mb-3" type="text" name="penerima_id"
                                value="{{ $kewps8->penerima_id }}">
                        </div>
                        <div class="col-12">
                            <label for="">No Kod</label>
                            <select class="form-control mb-3" name="kewps3a_id">
                                <option selected value="{{ $kewps8->kewps3a_id }}">{{ $kewps8->kewps3a_id }} -
                                    {{ $kewps8->kewps3a->perihal_stok }}
                                </option>
                                @foreach ($kewps3a as $k3)
                                    @if ($k3->id != $kewps8->kewps3a_id)
                                        <option value="{{ $k3->id }}">{{ $k3->no_kad }}
                                        </option>
                                    @endif
                                @endforeach
                            </select>
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
