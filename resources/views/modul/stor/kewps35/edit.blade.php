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
                                <li class="breadcrumb-item"><a href="">kewps35</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid mt--6">
        <form method="POST" action="/kewps35/{{ $kewps35->id }}">
            @method('put')
            @csrf
            <div class="card mt-4">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <h2 class="mb-0">Sijil Hapus Kira</h2>
                        </div>
                    </div>
                </div>

                </br>
                <div class="card-body pt-0">
                    <div class="row">

                        <div class="col-6">
                            <label for="">Kelulusan Bil</label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="text" name="kelulusan_bil"
                                    value="{{ $kewps35->kelulusan_bil }}">
                            </div>
                        </div>
                        <div class="col-6">
                            <label for="">Tarikh Bil</label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="date" name="tarikh_bil"
                                    value="{{ $kewps35->tarikh_bil }}">
                            </div>
                        </div>

                        <input type="hidden" name="ketua_jabatan" value="{{ Auth::user()->id }}">
                    </div>

                    <div class="row" id="info_kewps35">
                        @foreach ($kewps35->infokewps35 as $k35)
                            <input type="hidden" name="info35_id[]" value="{{ $k35->id }}">
                            <div class="col-12 mt-2 mb-2">
                                <h3 class="mt-4">Aset {{ $loop->iteration }}</h3>
                            </div>
                            <div class="col-6">
                                <label for="">No Kod</label>
                                <select class="form-control mb-3" name="kewps3a_id[]">
                                    <option selected value="{{ $k35->kewps3a_id }}">{{ $k35->kewps3a_id }}</option>
                                    @foreach ($kewps3a as $k3a)
                                        @if ($k35->kewps3a_id != $k3a->id)
                                            <option value="{{ $k3a->id }}">{{ $k3a->id }}
                                            </option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-6">
                                <label for="">Kuantiti</label>
                                <div class="input-group">
                                    <input class="form-control mb-3" type="number" name="kuantiti[]"
                                        value="{{ $k35->kuantiti }}">
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
