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
                                <li class="breadcrumb-item"><a href="">kewps6</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid mt--6">
        <form method="POST" action="/kewps6/{{ $kewps6->id }}">
            @method('put')
            @csrf
            <div class="card mt-4">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <h2 class="mb-0">Senarai Stok Bertarikh Luput</h2>
                        </div>
                    </div>
                </div>

                </br>
                <div class="card-body pt-0">
                    <div class="row">
                        <input class="form-control form-control-sm" type="hidden" name="user_id"
                            value="{{ Auth::user()->id }}">

                        <div class="col-12">
                            <label for="">No Kod</label>
                            <select class="form-control mb-3" name="kewps3a_id">
                                <option selected value="{{ $kewps6->kewps3a_id }}">{{ $kewps6->kewps3a_id }}</option>
                                @foreach ($kewps3a as $k3)
                                    @if ($k3->id != $kewps6->kewps3a_id)
                                        <option value="{{ $k3->id }}">{{ $k3->id }} - {{ $k3->perihal_stok }}
                                        </option>
                                    @endif
                                @endforeach
                            </select>
                        </div>

                        <div class="col-12">
                            <label for="">Agensi</label>
                            <input class="form-control mb-3" type="text" name="agensi" value="{{ $kewps6->agensi }}">
                        </div>
                        <div class="col-12">
                            <label for="">Kategori Stor</label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="text" name="kategori_stor"
                                    value="{{ $kewps6->kategori_stor }}">
                            </div>
                        </div>
                        <div class="col-12">
                            <label for="">Tarikh Luput</label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="date" name="tarikh_luput"
                                    value="{{ $kewps6->tarikh_luput }}">
                            </div>
                        </div>
                        <div class="col-4">
                            <label for="">Baki Stok 6 Bulan</label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="number" name="baki_stok_6bulan"
                                    value="{{ $kewps6->baki_stok_6bulan }}">
                            </div>
                        </div>
                        <div class="col-4">
                            <label for="">Baki Stok 5 Bulan</label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="number" name="baki_stok_5bulan"
                                    value="{{ $kewps6->baki_stok_5bulan }}">
                            </div>
                        </div>
                        <div class="col-4">
                            <label for="">Baki Stok 4 Bulan</label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="number" name="baki_stok_4bulan"
                                    value="{{ $kewps6->baki_stok_4bulan }}">
                            </div>
                        </div>
                        <div class="col-4">
                            <label for="">Baki Stok 3 Bulan</label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="number" name="baki_stok_3bulan"
                                    value="{{ $kewps6->baki_stok_3bulan }}">
                            </div>
                        </div>
                        <div class="col-4">
                            <label for="">Baki Stok 2 Bulan</label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="number" name="baki_stok_2bulan"
                                    value="{{ $kewps6->baki_stok_2bulan }}">
                            </div>
                        </div>
                        <div class="col-4">
                            <label for="">Baki Stok 1 Bulan</label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="number" name="baki_stok_1bulan"
                                    value="{{ $kewps6->baki_stok_1bulan }}">
                            </div>
                        </div>
                        <div class="col-3">
                            <button class="btn btn-primary" type="submit">Simpan</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
