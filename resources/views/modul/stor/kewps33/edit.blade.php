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
                                <li class="breadcrumb-item"><a href="">kewps33</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid mt--6">
        <form method="POST" action="/kewps33/{{ $kewps33->id }}">
            @method('put')
            @csrf
            <div class="card mt-4">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <h2 class="mb-0">Pelantikan Jawatankuasa Penyiasat</h2>
                        </div>
                    </div>
                </div>

                </br>
                <div class="card-body pt-0">
                    <div class="row">
                        <div class="col-4 mt-3">
                            <label for="">ID Laporan Awal Kehilangan</label>
                            <select class="form-control" name="kewps32_id">
                                <option selected value="{{ $kewps33->kewps32_id }}">{{ $kewps33->kewps32_id }}</option>
                                @foreach ($kewps32 as $k32)
                                    @if ($kewps33->kewps32_id != $k32->id)
                                        <option value="{{ $k32->id }}">{{ $k32->id }}
                                        </option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="col-4 mt-3">
                            <label for="">Tarikh</label>
                            <div class="input-group">
                                <input class="form-control" type="date" name="tarikh" value="{{ $kewps33->tarikh }}">
                            </div>
                        </div>
                        <div class="col-4 mt-3">
                            <label for="">Tarikh Kembali</label>
                            <div class="input-group">
                                <input class="form-control" type="date" name="tarikh_kembali"
                                    value="{{ $kewps33->tarikh_kembali }}">
                            </div>
                        </div>

                        <input type="hidden" name="pegawai_pengawal" value="{{ Auth::user()->id }}">
                        <input type="hidden" name="pegawai_penerima" value="{{ Auth::user()->id }}">

                    </div>

                    <button class="btn btn-primary mt-5" type="submit">Simpan</button>
                </div>
            </div>
        </form>
    </div>


@endsection
