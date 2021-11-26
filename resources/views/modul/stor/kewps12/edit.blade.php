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
                                <li class="breadcrumb-item"><a href="">kewps12</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid mt--6">
        <form method="POST" action="/kewps12/{{ $kewps12->id }}">
            @method('put')
            @csrf
            <div class="card mt-4">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <h2 class="mb-0">Sijil Verifikasi</h2>
                        </div>
                    </div>
                </div>

                </br>
                <div class="card-body pt-0">
                    <div class="row">
                        <div class="col-3">
                            <label for="">Kew.PS-7</label>
                            <select class="form-control mb-3" name="kewps10_id">
                                <option value="{{ $kewps12->kewps10_id }}">{{ $kewps12->kewps10_id }} -
                                    {{ $kewps12->kewps10->kementerian }}
                                </option>
                                @foreach ($kewps10 as $k10)
                                    @if ($k10->id != $kewps12->kewps10_id)
                                        <option value="{{ $k10->id }}">{{ $k10->id }} -
                                            {{ $k10->kementerian }}
                                        </option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="col-12 mt-3">
                            <label for="">Kategori Stor</label>
                            <div class="input-group">
                                <input class="form-control" type="text" name="kategori_stor"
                                    value="{{ $kewps12->kategori_stor }}">
                            </div>
                        </div>
                        <div class="col-12 mt-3">
                            <label for="">Jabatan</label>
                            <div class="input-group">
                                <input class="form-control" type="text" name="jabatan" value="{{ $kewps12->jabatan }}">
                            </div>
                        </div>
                        <div class="col-12 mt-3">
                            <label for="">Pelaksanaan Verifikasi</label>
                            <div class="input-group">
                                <input class="form-control" type="number" step="0.01" name="pelaksanaan_verifikasi"
                                    value="{{ $kewps12->pelaksanaan_verifikasi }}">
                            </div>
                        </div>
                        <div class="col-12 mt-3">
                            <label for="">Prestasi Penilaian</label>
                            <div class="input-group">
                                <input class="form-control" type="number" step="0.01" name="prestasi_penilaian"
                                    value="{{ $kewps12->prestasi_penilaian }}">
                            </div>
                        </div>

                        <input class="form-control" type="hidden" name="ketua_jabatan" value="{{ Auth::user()->id }}">

                    </div>
                    <div class=" mt-3">
                        <button class="btn btn-primary" type="submit">Simpan</button>
                    </div>
                </div>
            </div>
        </form>
    </div>


@endsection
