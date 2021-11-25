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
                                <li class="breadcrumb-item"><a href="">kewps27</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid mt--6">
        <form method="POST" action="/kewps27/{{ $kewps27->id }}">
            @method('put')
            @csrf
            <div class="card mt-4">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <h2 class="mb-0">Sebut Harga Pelupusan</h2>
                        </div>
                    </div>
                </div>

                </br>
                <div class="card-body pt-0">
                    <div class="row">
                        <div class="col-6">
                            <label for="">Nama</label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="text" name="nama" value="{{ $kewps27->nama }}">
                            </div>
                        </div>
                        <div class="col-6">
                            <label for="">IC No Syarikat</label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="text" name="ic_no_syarikat"
                                    value="{{ $kewps27->ic_no_syarikat }}">
                            </div>
                        </div>
                        <div class="col-6">
                            <label for="">Alamat</label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="text" name="alamat" value="{{ $kewps27->alamat }}">
                            </div>
                        </div>
                        <div class="col-6">
                            <label for="">Nama Penerima</label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="text" name="nama_penerima"
                                    value="{{ $kewps27->nama_penerima }}">
                            </div>
                        </div>
                        <div class="col-6">
                            <label for="">Alamat Penerima</label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="text" name="alamat_penerima"
                                    value="{{ $kewps27->alamat_penerima }}">
                            </div>
                        </div>
                        <div class="col-6">
                            <label for="">Deposit</label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="text" name="deposit"
                                    value="{{ $kewps27->deposit }}">
                            </div>
                        </div>
                        <div class="col-6">
                            <label for="">No Bank</label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="text" name="no_bank"
                                    value="{{ $kewps27->no_bank }}">
                            </div>
                        </div>
                        <div class="col-6">
                            <label for="">Nama Jabatan</label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="text" name="nama_jabatan"
                                    value="{{ $kewps27->nama_jabatan }}">
                            </div>
                        </div>
                        <input type="hidden" name="staff_id" value="{{ Auth::user()->id }}">
                    </div>

                    <div class="row">
                        @foreach ($kewps27->infokewps27 as $k27)
                            <input type="hidden" name="info27_id[]" value="{{ $k27->id }}">
                            <div class="col-12 mt-2 mb-2">
                                <h3 class="mt-4">Aset {{ $loop->iteration }}</h3>
                            </div>
                            <div class="col-3">
                                <label for="">Kenyataan Tawaran Sebut Harga</label>
                                <select class="form-control mb-3" name="kewps26_id[]">
                                    <option selected value="{{ $k27->kewps26_id }}">{{ $k27->kewps26_id }}
                                    </option>
                                    @foreach ($kewps26 as $k26)
                                        @if ($k26->id != $k27->kewps26_id)
                                            <option value="{{ $k26->id }}">{{ $k26->id }}
                                            </option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-3">
                                <label for="">Kuantiti</label>
                                <div class="input-group">
                                    <input class="form-control mb-3" type="number" name="kuantiti[]"
                                        value="{{ $k27->kuantiti }}">
                                </div>
                            </div>
                            <div class="col-3">
                                <label for="">Harga Tawaran</label>
                                <div class="input-group">
                                    <input class="form-control mb-3" type="text" name="harga_tawaran[]"
                                        value="{{ $k27->harga_tawaran }}">
                                </div>
                            </div>
                            <div class="col-3">
                                <label for="">Deposit</label>
                                <div class="input-group">
                                    <input class="form-control mb-3" type="text" name="deposit2[]"
                                        value="{{ $k27->deposit }}">
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
