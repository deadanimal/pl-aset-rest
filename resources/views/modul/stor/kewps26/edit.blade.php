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
                                <li class="breadcrumb-item"><a href="">kewps26</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid mt--6">
        <form method="POST" action="/kewps26/{{ $kewps26->id }}">
            @method('put')
            @csrf
            <div class="card mt-4">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <h2 class="mb-0">Kenyataan Tawaran Sebut Harga</h2>
                        </div>
                    </div>
                </div>

                </br>
                <div class="card-body pt-0">
                    <div class="row">
                        <div class="col-12">
                            <label for="">Pengerusi</label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="text" name="kementerian"
                                    value="{{ $kewps26->kementerian }}" readonly>
                            </div>
                        </div>
                        <div class="col-3">
                            <label for="">Tarikh Mula</label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="date" name="tarikh_mula"
                                    value="{{ $kewps26->tarikh_mula }}">
                            </div>
                        </div>
                        <div class="col-3">
                            <label for="">Tarikh Tamat</label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="date" name="tarikh_tamat"
                                    value="{{ $kewps26->tarikh_tamat }}">
                            </div>
                        </div>
                        <div class="col-3">
                            <label for="">Masa Mula</label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="time" name="masa_mula"
                                    value="{{ $kewps26->masa_mula }}">
                            </div>
                        </div>
                        <div class="col-3">
                            <label for="">Masa Tamat</label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="time" name="masa_tamat"
                                    value="{{ $kewps26->masa_tamat }}">
                            </div>
                        </div>
                        <div class="col-3">
                            <label for="">Lokasi</label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="text" name="lokasi" value="{{ $kewps26->lokasi }}">
                            </div>
                        </div>
                        <div class="col-3">
                            <label for="">Alamat Sebut Harga</label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="text" name="alamat_sebut_harga"
                                    value="{{ $kewps26->alamat_sebut_harga }}">
                            </div>
                        </div>
                        <div class="col-3">
                            <label for="">Tarikh Tutup</label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="date" name="tarikh_tutup"
                                    value="{{ $kewps26->tarikh_tutup }}">
                            </div>
                        </div>
                        <div class="col-3">
                            <label for="">Nama Deposit</label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="text" name="nama_deposit"
                                    value="{{ $kewps26->nama_deposit }}">
                            </div>
                        </div>

                        <input type="hidden" name="ketua_jabatan" value="{{ Auth::user()->id }}">

                    </div>
                    <div class="row">
                        @foreach ($kewps26->infokewps26 as $k26)
                            <input type="hidden" name="info26_id[]" value="{{ $k26->id }}">
                            <div class="col-12 mt-2 mb-2">
                                <h3 class="mt-4">Aset {{ $loop->iteration }}</h3>
                            </div>
                            <div class="col-4">
                                <label for="">No Kod</label>
                                <select class="form-control mb-3" name="kewps3a_id[]">
                                    <option value="{{ $k26->kewps3a_id }}">{{ $k26->kewps3a_id }} -
                                        {{ $k26->kewps3a->nama_stor }}
                                    </option>
                                    @foreach ($kewps3a as $k3a)
                                        @if ($k3a->id != $k26->kewps3a_id)
                                            <option value="{{ $k3a->id }}">{{ $k3a->id }} -
                                                {{ $k3a->nama_stor }}
                                            </option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-4">
                                <label for="">Kuantiti</label>
                                <div class="input-group">
                                    <input class="form-control mb-3" type="number" name="kuantiti[]"
                                        value="{{ $k26->kuantiti }}">
                                </div>
                            </div>
                            <div class="col-4">
                                <label for="">Harga Simpanan</label>
                                <div class="input-group">
                                    <input class="form-control mb-3" type="number" name="harga_simpanan[]"
                                        value="{{ $k26->harga_simpanan }}">
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
