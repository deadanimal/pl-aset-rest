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
                                <li class="breadcrumb-item"><a href="">kewps36</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid mt--6">
        <form method="POST" action="/kewps36/{{ $kewps36->id }}">
            @method('put')
            @csrf
            <div class="card mt-4">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <h2 class="mb-0">Laporan Kehilangan Hapus Kira</h2>
                        </div>
                    </div>
                </div>

                </br>
                <div class="card-body pt-0">
                    <div class="row">
                        <div class="col-12">
                            <label for="">Tahun</label>
                            <select class="form-control mb-3" name="tahun">
                                <option selected value="{{ $kewps36->tahun }}">{{ $kewps36->tahun }}</option>
                                <option value="2020">2020</option>
                                <option value="2019">2019</option>
                                <option value="2018">2018</option>
                            </select>
                        </div>

                        <input type="hidden" name="staff_id" value="{{ Auth::user()->id }}">
                    </div>

                    <div class="row" id="info_kewps36">
                        @foreach ($kewps36->infokewps36 as $k36)
                            <input type="hidden" name="info36_id[]" value="{{ $k36->id }}">
                            <div class="col-12 mt-2 mb-2">
                                <h3 class="mt-4">Aset {{ $loop->iteration }}</h3>
                            </div>
                            <div class="col-4">
                                <label for="">No Kod</label>
                                <select class="form-control mb-3" name="kewps3a_id[]">
                                    <option selected value="{{ $k36->kewps3a_id }}">{{ $k36->kewps3a_id }}</option>
                                    @foreach ($kewps3a as $k3a)
                                        @if ($k36->kewps3a_id != $k3a->id)
                                            <option value="{{ $k3a->id }}">{{ $k3a->id }}
                                            </option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-4">
                                <label for="">Aset Kewps35</label>
                                <select class="form-control mb-3" name="infokewps35_id[]">
                                    <option selected value="{{ $k36->infokewps35_id }}">
                                        {{ $k36->infokewps35_id }}</option>
                                    @foreach ($infokewps35 as $ik35)
                                        @if ($k36->infokewps35_id != $ik35->id)
                                            <option value="{{ $ik35->id }}">{{ $ik35->id }}
                                            </option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-4">
                                <label for="">Kewps34</label>
                                <select class="form-control mb-3" name="kewps34_id[]">
                                    <option selected value="{{ $k36->kewps34_id }}">{{ $k36->kewps34_id }}
                                    </option>
                                    @foreach ($kewps34 as $k34)
                                        @if ($k36->kewps34_id != $k34->id)
                                            <option value="{{ $k34->id }}">{{ $k34->id }}
                                            </option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        @endforeach
                    </div>
                    <button class="btn btn-primary mt-5" type="submit">Simpan</button>
                </div>
            </div>
        </form>
    </div>


@endsection
