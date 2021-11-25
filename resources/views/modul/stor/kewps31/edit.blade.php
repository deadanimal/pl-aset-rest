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
                                <li class="breadcrumb-item"><a href="">kewps31</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid mt--6">
        <form method="POST" action="/kewps31/{{ $kewps31->id }}">
            @method('put')
            @csrf
            <div class="card mt-4">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <h2 class="mb-0">Laporan Pelupusan Stok</h2>
                        </div>
                    </div>
                </div>

                </br>
                <div class="card-body pt-0">
                    <div class="row">
                        <div class="col-6">
                            <label for="">Tahun</label>
                            <select class="form-control mb-3" name="tahun">
                                <option selected value="{{ $kewps31->tahun }}">{{ $kewps31->tahun }}</option>
                                <option value="2020">2020</option>
                                <option value="2019">2019</option>
                                <option value="2018">2018</option>
                            </select>
                        </div>
                        <div class="col-6">
                            <label for="">Kementerian</label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="text" name="kementerian_display"
                                    value="Perbadanan Labuan" readonly>
                            </div>
                        </div>

                        <input type="hidden" name="staff_id" value="{{ Auth::user()->id }}">
                    </div>

                    <div class="row">
                        @foreach ($kewps31->infokewps31 as $k31)
                            <input type="hidden" name="info31_id[]" value="{{ $k31->id }}">
                            <div class="col-12 mt-2 mb-2">
                                <h3 class="mt-4">Aset {{ $loop->iteration }}</h3>
                            </div>
                            <input type="hidden" name="kementerian[]" value="Perbadanan Labuan">
                            <div class="col-4">
                                <label for="">Pelupusan Stok</label>
                                <select class="form-control mb-3" name="kewps20_id[]">
                                    <option selected value="{{ $k31->kewps20_id }}">{{ $k31->kewps20_id }}</option>
                                    @foreach ($kewps20 as $k20)
                                        @if ($k20->id != $k31->kewps20_id)
                                            <option value="{{ $k20->id }}">{{ $k20->id }}
                                            </option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-4">
                                <label for="">Hasil Pelupusan</label>
                                <div class="input-group">
                                    <input class="form-control mb-3" type="text" name="hasil_pelupusan[]"
                                        value="{{ $k31->hasil_pelupusan }}">
                                </div>
                            </div>
                            <div class="col-4">
                                <label for="">Kos Pengendalian</label>
                                <div class="input-group">
                                    <input class="form-control mb-3" type="text" name="kos_pengendalian[]"
                                        value="{{ $k31->kos_pengendalian }}">
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
