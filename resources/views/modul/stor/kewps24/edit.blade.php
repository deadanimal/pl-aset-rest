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
                                <li class="breadcrumb-item"><a href="">kewps24</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid mt--6">
        <form method="POST" action="/kewps24/{{ $kewps24->id }}">
            @method('put')
            @csrf
            <div class="card mt-4">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <h2 class="mb-0">Tender Pelupusan</h2>
                        </div>
                    </div>
                </div>

                </br>
                <div class="card-body pt-0">
                    <div class="row">
                        <div class="col-6 mt-3">
                            <label for="">Kementerian</label>
                            <div class="input-group">
                                <input class="form-control" type="text" name="nama_kementerian"
                                    value="{{ $kewps24->nama_kementerian }}" readonly>
                            </div>
                        </div>
                        <div class="col-6 mt-3">
                            <label for="">Nama</label>
                            <div class="input-group">
                                <input class="form-control" type="text" name="nama" value="{{ $kewps24->nama }}">
                            </div>
                        </div>
                        <div class="col-6 mt-3">
                            <label for="">Kad Pengenalan</label>
                            <div class="input-group">
                                <input class="form-control" type="number" name="kp" value="{{ $kewps24->kp }}">
                            </div>
                        </div>
                        <div class="col-6 mt-3">
                            <label for="">Alamat Pemberi</label>
                            <div class="input-group">
                                <input class="form-control" type="text" name="alamat_pemberi"
                                    value="{{ $kewps24->alamat_pemberi }}">
                            </div>
                        </div>
                        <div class="col-6 mt-3">
                            <label for="">Nama Penerima</label>
                            <div class="input-group">
                                <input class="form-control" type="text" name="nama_penerima"
                                    value="{{ $kewps24->nama_penerima }}">
                            </div>
                        </div>
                        <div class="col-6 mt-3">
                            <label for="">Alamat Penerima</label>
                            <div class="input-group">
                                <input class="form-control" type="text" name="alamat_penerima"
                                    value="{{ $kewps24->alamat_penerima }}">
                            </div>
                        </div>
                        <div class="col-6 mt-3">
                            <label for="">Nilai</label>
                            <div class="input-group">
                                <input class="form-control" type="number" name="nilai" value="{{ $kewps24->nilai }}">
                            </div>
                        </div>
                        <div class="col-6 mt-3">
                            <label for="">No Bank</label>
                            <div class="input-group">
                                <input class="form-control" type="text" name="no_bank" value="{{ $kewps24->no_bank }}">
                            </div>
                        </div>
                        <input type="hidden" name="staff_id" value="{{ Auth::user()->id }}">
                    </div>
                    <div class="row" id="info_kewps24">
                        @foreach ($kewps24->infokewps24 as $k24)
                            <input type="hidden" name="info24_id[]" value="{{ $k24->id }}">
                            <div class="col-12 mt-2 mb-2">
                                <h3 class="mt-4">Aset {{ $loop->iteration }}</h3>
                            </div>
                            <div class="col-4">
                                <label for="">Kenyataan Tawaran Tender Pelupusan ID</label>
                                <select class="form-control mb-3" name="kewps23_id[]">
                                    <option selected value="{{ $k24->kewps23_id }}">{{ $k24->kewps23_id }}
                                    </option>
                                    @foreach ($kewps23 as $k23)
                                        @if ($k23->id != $k24->kewps23_id)
                                            <option value="{{ $k23->id }}">{{ $k23->id }}
                                            </option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-4">
                                <label for="">Harga Tawaran</label>
                                <div class="input-group">
                                    <input class="form-control mb-3" type="number" name="harga_tawaran[]"
                                        value="{{ $k24->harga_tawaran }}">
                                </div>
                            </div>
                            <div class="col-4">
                                <label for="">Deposit Tender</label>
                                <div class="input-group">
                                    <input class="form-control mb-3" type="number" name="deposit_tender[]"
                                        value="{{ $k24->deposit_tender }}">
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
