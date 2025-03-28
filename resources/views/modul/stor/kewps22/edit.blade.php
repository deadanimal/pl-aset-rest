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
                                <li class="breadcrumb-item"><a href="">kewps22</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid mt--6">
        <form method="POST" action="/kewps22/{{ $kewps22->id }}">
            @method('put')
            @csrf
            <div class="card mt-4">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <h2 class="mb-0">Sijil Pelupusan</h2>
                        </div>
                    </div>
                </div>

                </br>
                <div class="card-body pt-0">
                    <div class="row">
                        <div class="col-3 mt-3">
                            <label for="">ID InfoKewps20</label>
                            <select name="kewps20_id" class="form-control">
                                @foreach ($kewps20 as $k20)
                                    <option {{ $k20->id == $kewps22->kewps20_id ? 'selected' : '' }}
                                        value="{{ $k20->id }}">{{ $k20->id }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-3 mt-3">
                            <label for="">No Resit</label>
                            <div class="input-group">
                                <input class="form-control" type="text" name="no_resit"
                                    value="{{ $kewps22->no_resit }}">
                            </div>
                        </div>
                        <div class="col-3 mt-3">
                            <label for="">Hasil Perbelanjaan</label>
                            <div class="input-group">
                                <input class="form-control" type="text" name="hasil_perbelanjaan"
                                    value="{{ $kewps22->hasil_perbelanjaan }}">
                            </div>
                        </div>
                        <div class="col-3 mt-3">
                            <label for="">Penerima Syarikat</label>
                            <div class="input-group">
                                <input class="form-control" type="text" name="penerima_syarikat"
                                    value="{{ $kewps22->penerima_syarikat }}">
                            </div>
                        </div>


                        <input type="hidden" name="pegawai_pelupusan" value="{{ Auth::user()->id }}">
                        <input type="hidden" name="ketua_jabatan" value="{{ Auth::user()->id }}">
                    </div>

                    <button class="btn btn-primary mt-5" type="submit">Simpan</button>
                </div>
            </div>
        </form>
    </div>


@endsection
