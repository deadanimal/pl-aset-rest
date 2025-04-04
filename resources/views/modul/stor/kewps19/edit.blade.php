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
                                <li class="breadcrumb-item"><a href="">kewps19</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid mt--6">
        <form method="POST" action="/kewps19/{{ $kewps19->id }}">
            @method('put')
            @csrf
            <div class="card mt-4">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <h2 class="mb-0">Borang Lantikan</h2>
                        </div>
                    </div>
                </div>

                </br>
                <div class="card-body pt-0">
                    <div class="row">
                        <div class="col-6 mt-3">
                            <label for="">No Rujukan</label>
                            <div class="input-group">
                                <input class="form-control" type="text" value="{{ $kewps19->id }}" readonly>
                            </div>
                        </div>
                        <div class="col-6 mt-3">
                            <label for="">Tarikh</label>
                            <div class="input-group">
                                <input class="form-control" type="date" name="tarikh" value="{{ $kewps19->tarikh }}">
                            </div>
                        </div>

                        <div class="col-4 mt-3">
                            <label for="">Tarikh Mula</label>
                            <div class="input-group">
                                <input class="form-control" type="date" name="tempoh_mula"
                                    value="{{ $kewps19->tempoh_mula }}">
                            </div>
                        </div>
                        <div class="col-4 mt-3">
                            <label for="">Tarikh Tamat</label>
                            <div class="input-group">
                                <input class="form-control" type="date" name="tempoh_tamat"
                                    value="{{ $kewps19->tempoh_tamat }}">
                            </div>
                        </div>
                        <div class="col-4 mt-3">
                            <label for="">Tempoh</label>
                            <div class="input-group">
                                <input class="form-control" type="number" value="{{ $kewps19->tempoh }}" readonly>
                            </div>
                        </div>

                        <input type="hidden" name="penerima_id" value="{{ Auth::user()->id }}">
                        <input type="hidden" name="pegawai_id" value="{{ Auth::user()->id }}">
                    </div>

                    <button class="btn btn-primary mt-5" type="submit">Simpan</button>
                </div>
            </div>
        </form>
    </div>
@endsection
