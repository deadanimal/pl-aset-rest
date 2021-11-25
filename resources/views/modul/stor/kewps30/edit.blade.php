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
                                <li class="breadcrumb-item"><a href="">kewps30</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid mt--6">
        <form method="POST" action="/kewps30/{{ $kewps30->id }}">
            @method('put')
            @csrf
            <div class="card mt-4">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <h2 class="mb-0">Senarai Stok Yang Dilelong</h2>
                        </div>
                    </div>
                </div>

                </br>
                <div class="card-body pt-0">
                    <div class="row">
                        <div class="col-6 mt-3">
                            <label for="">Kenyataan Jual Lelong</label>
                            <select class="form-control" name="kewps29_id">
                                <option selected value="{{ $kewps30->kewps29_id }}">{{ $kewps30->kewps29_id }}</option>
                                @foreach ($kewps29 as $k29)
                                    @if ($kewps30->kewps29_id != $k29->id)
                                        <option value="{{ $k29->id }}">{{ $k29->id }}
                                        </option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="col-6 mt-3">
                            <label for="">No Kod</label>
                            <select class="form-control" name="kewps3a_id">
                                <option selected value="{{ $kewps30->kewps3a_id }}">{{ $kewps30->kewps3a_id }}</option>
                                @foreach ($kewps3a as $k3a)
                                    @if ($k3a->id != $kewps30->kewps3a_id)
                                        <option value="{{ $k3a->id }}">{{ $k3a->id }}
                                        </option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="col-4 mt-3">
                            <label for="">Kuantiti</label>
                            <div class="input-group">
                                <input class="form-control" type="text" name="kuantiti" value="{{ $kewps30->kuantiti }}">
                            </div>
                        </div>
                        <div class="col-4 mt-3">
                            <label for="">Harga Simpanan</label>
                            <div class="input-group">
                                <input class="form-control" type="text" name="harga_simpanan"
                                    value="{{ $kewps30->harga_simpanan }}">
                            </div>
                        </div>
                        <div class="col-4 mt-3">
                            <label for="">Deposit</label>
                            <div class="input-group">
                                <input class="form-control" type="text" name="deposit" value="{{ $kewps30->deposit }}">
                            </div>
                        </div>

                    </div>

                    <button class="btn btn-primary mt-5" type="submit">Simpan</button>
                </div>
            </div>
        </form>
    </div>


@endsection
