@extends('layouts.base_pa') @section('content')
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-white d-inline-block mb-0">Perbadanan Labuan</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="#"><i class="fas fa-file"></i></a></li>
                                <li class="breadcrumb-item"><a href="/kewpa22">Kewpa22</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <form method="POST" action="/kewpa22">
        @csrf
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
                        <input class="form-control mb-3" type="text" name="agensi" value="Perbadanan Aset Labuan" required>
                    </div>
                    <div class="col-6">
                        <label for="">Secara</label>
                        <input class="form-control mb-3" type="text" name="secara" value="" required>
                    </div>
                    <div class="col-4">
                        <label for="">Kuantiti</label>
                        <input class="form-control mb-3" type="number" name="kuantiti" value="" required>
                    </div>
                    <div class="col-4">
                        <label for="">Tarikh</label>
                        <input class="form-control mb-3" type="date" name="tarikh" value="" required>
                    </div>
                    <div class="col-4">
                        <label for="">Tempat</label>
                        <input class="form-control mb-3" type="text" name="tempat" value="" required>
                    </div>
                    <input type="hidden" name="pegawai_saksi1" value="{{ Auth::user()->id }}">
                    <input type="hidden" name="pegawai_saksi2" value="{{ Auth::user()->id }}">
                </div>

                <button class="my-4 btn btn-primary" type="submit">Simpan</button>
            </div>
        </div>
    </form>
@endsection
