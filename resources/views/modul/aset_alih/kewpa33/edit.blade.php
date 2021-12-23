@extends('layouts.base_pa') @section('content')
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-white d-inline-block mb-0">Perbadanan Labuan</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="/kewpa33">Kewpa33</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid mt--6">
        <form method="POST" action="/kewpa33/{{ $kewpa33->id }}">
            @csrf
            @method('PUT')
            <div class="card mt-4">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <h2 class="mb-0">Laporan Awal Kehilangan Aset Alih</h2>
                        </div>
                    </div>
                </div>

                </br>
                <div class="card-body pt-0">
                    <div class="row">
                        <div class="col-4">
                            <label for="">No Siri Pendaftaran</label>
                            <select name="kewpa3a_id" class="form-control mb-3">
                                @foreach ($kewpa3a as $k3a)
                                    <option {{ $k3a->id == $kewpa33->kewpa3a_id ? 'selected' : '' }}
                                        value="{{ $k3a->id }}">{{ $k3a->no_siri_pendaftaran }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-4">
                            <label for="">Tempat Kehilangan</label>
                            <input class="form-control mb-3" type="text" name="tempat_kehilangan"
                                value="{{ $kewpa33->tempat_kehilangan }}" required>
                        </div>
                        <div class="col-4">
                            <label for="">Tarikh Kehilangan</label>
                            <input class="form-control mb-3" type="date" name="tarikh_kehilangan"
                                value="{{ $kewpa33->tarikh_kehilangan }}" required>
                        </div>
                        <div class="col-3">
                            <label for="">Cara Kehilangan</label>
                            <input class="form-control mb-3" type="text" name="cara_kehilangan"
                                value="{{ $kewpa33->cara_kehilangan }}" required>
                        </div>
                        <div class="col-3">
                            <label for="">No Rujukan Polis</label>
                            <input class="form-control mb-3" type="text" name="no_rujukan_polis"
                                value="{{ $kewpa33->no_rujukan_polis }}" required>
                        </div>
                        <div class="col-3">
                            <label for="">Tarikh Laporan Polis</label>
                            <input class="form-control mb-3" type="date" name="tarikh_laporan_polis"
                                value="{{ $kewpa33->tarikh_laporan_polis }}" required>
                        </div>
                        <div class="col-3">
                            <label for="">Langkah Sedia Ada</label>
                            <input class="form-control mb-3" type="text" name="langkah_sedia_ada"
                                value="{{ $kewpa33->langkah_sedia_ada }}" required>
                        </div>
                        <div class="col-3">
                            <label for="">Langkah Segera</label>
                            <input class="form-control mb-3" type="text" name="langkah_segera"
                                value="{{ $kewpa33->langkah_segera }}" required>
                        </div>
                        <div class="col-3">
                            <label for="">Document Sokongan</label>
                            <input class="form-control mb-3" type="text" name="dokumen_sokongan"
                                value="{{ $kewpa33->dokumen_sokongan }}" required>
                        </div>
                        <div class="col-3">
                            <label for="">Gambar</label>
                            <input class="form-control mb-3" type="text" name="gambar" value="{{ $kewpa33->gambar }}"
                                required>
                        </div>
                        <div class="col-3">
                            <label for="">Catatan</label>
                            <input class="form-control mb-3" type="text" name="catatan" value="{{ $kewpa33->catatan }}"
                                required>
                        </div>
                    </div>

                    <button class="my-2 btn btn-primary" type="submit">Simpan</button>
                </div>
            </div>
        </form>
    </div>

@endsection
