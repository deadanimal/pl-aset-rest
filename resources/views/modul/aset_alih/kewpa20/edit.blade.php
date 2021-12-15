@extends('layouts.base_pa') @section('content')
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-white d-inline-block mb-0">Perbadanan Labuan</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="/kewpa20">Kewpa20</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid mt--6">
        <form method="POST" action="/kewpa20/{{ $kewpa20->id }}">
            @csrf
            @method('PUT')
            <div class="card mt-4">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <h2 class="mb-0">Lantikan Lembaga Pemeriksa</h2>
                        </div>
                    </div>
                </div>

                </br>
                <div class="card-body pt-0">
                    <div class="row">
                        <div class="col-3">
                            <label for="">Tarikh</label>
                            <input class="form-control mb-3" type="date" name="tarikh" value="{{ $kewpa20->tarikh }}"
                                required>
                        </div>
                        <div class="col-3 form-group">
                            <label for="">Tempoh</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" aria-describedby="basic-addon2" name="tempoh"
                                    value="{{ $kewpa20->tempoh }}">
                                <div class="input-group-append">
                                    <span class="input-group-text" id="basic-addon2">Tahun</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-3">
                            <label for="">Tarikh Mula</label>
                            <input class="form-control mb-3" type="date" name="tarikh_mula"
                                value="{{ $kewpa20->tarikh_mula }}" required>
                        </div>
                        <div class="col-3">
                            <label for="">Tarikh Tamat</label>
                            <input class="form-control mb-3" type="date" name="tarikh_tamat"
                                value="{{ $kewpa20->tarikh_tamat }}" required>
                        </div>
                        <input type="hidden" name="pegawai_dilantik" value="{{ Auth::user()->id }}">
                        <input type="hidden" name="ketua_jabatan" value="{{ Auth::user()->id }}">
                    </div>

                    <button class="my-2 btn btn-primary" type="submit">Simpan</button>
                </div>
            </div>
        </form>
    </div>

@endsection
