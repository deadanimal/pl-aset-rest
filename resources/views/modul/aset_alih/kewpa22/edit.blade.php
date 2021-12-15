@extends('layouts.base_pa') @section('content')
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-white d-inline-block mb-0">Perbadanan Labuan</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="/kewpa22">Kewpa22</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid mt--6">
        <form method="POST" action="/kewpa22/{{ $kewpa22->id }}">
            @csrf
            @method('PUT')
            <div class="card mt-4">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <h2 class="mb-0">Sijil Penyaksian Pemusnahan Aset Alih</h2>
                        </div>
                    </div>
                </div>

                </br>
                <div class="card-body pt-0">
                    <div class="row">
                        <div class="col-6">
                            <label for="">Agensi</label>
                            <input class="form-control mb-3" type="date" name="agensi" value="{{ $kewpa22->agensi }}"
                                required>
                        </div>
                        <div class="col-6">
                            <label for="">Secara</label>
                            <input class="form-control mb-3" type="text" name="secara" value="{{ $kewpa22->secara }}"
                                required>
                        </div>
                        <div class="col-4">
                            <label for="">Kuantiti</label>
                            <input class="form-control mb-3" type="number" name="kuantiti" value="{{ $kewpa22->kuantiti }}"
                                required>
                        </div>
                        <div class="col-4">
                            <label for="">Tarikh</label>
                            <input class="form-control mb-3" type="date" name="tarikh" value="{{ $kewpa22->tarikh }}"
                                required>
                        </div>
                        <div class="col-4">
                            <label for="">Tempat</label>
                            <input class="form-control mb-3" type="text" name="tempat" value="{{ $kewpa22->tempat }}"
                                required>
                        </div>
                    </div>

                    <button class="my-2 btn btn-primary" type="submit">Simpan</button>
                </div>
            </div>
        </form>
    </div>

@endsection
