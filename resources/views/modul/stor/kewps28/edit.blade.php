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
                                <li class="breadcrumb-item"><a href="">kewps28</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid mt--6">
        <form method="POST" action="/kewps28/{{ $kewps28->id }}">
            @method('put')
            @csrf
            <div class="card mt-4">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <h2 class="mb-0">Jadual Sebut Harga Pelupusan</h2>
                        </div>
                    </div>
                </div>

                </br>
                <div class="card-body pt-0">
                    <div class="row">
                        <div class="col-12">
                            <label for="">Pengerusi</label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="text" name="nama" value="{{ Auth::user()->name }}"
                                    readonly>
                            </div>
                        </div>

                        <input type="hidden" name="pengerusi_id" value="{{ Auth::user()->id }}">
                        <input type="hidden" name="ahli1_id" value="{{ Auth::user()->id }}">
                        <input type="hidden" name="ahli2_id" value="{{ Auth::user()->id }}">
                    </div>

                    <div class="row">
                        @foreach ($kewps28->infokewps28 as $k28)
                            <input type="hidden" name="info28_id[]" value="{{ $k28->id }}">
                            <div class="col-12 mt-2 mb-2">
                                <h3 class="mt-4">Aset {{ $loop->iteration }}</h3>
                            </div>
                            <div class="col-4">
                                <label for="">Kenyataan Tawaran Sebut Harga</label>
                                <select class="form-control mb-3" name="kewps26_id[]">
                                    <option selected value="{{ $k28->kewps28_id }}">{{ $k28->kewps28_id }}</option>
                                    @foreach ($kewps26 as $k26)
                                        <option value="{{ $k26->id }}">{{ $k26->id }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-4">
                                <label for="">Kod Penyebut Harga</label>
                                <div class="input-group">
                                    <input class="form-control mb-3" type="number" name="kod_penyebut_harga[]"
                                        value="{{ $k28->kod_penyebut_harga }}">
                                </div>
                            </div>
                            <div class="col-4">
                                <label for="">Harga</label>
                                <div class="input-group">
                                    <input class="form-control mb-3" type="text" name="harga[]"
                                        value="{{ $k28->harga }}">
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
