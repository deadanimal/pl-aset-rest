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
        <form method="POST" action="/kewps30">
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
                    @foreach ($infokewps20 as $ik20)
                        <div class="row mt-5">
                            <div class="col-12">
                                <h3>No Rujukan Infokewps20 : {{ $ik20->id }}</h3>
                            </div>
                            <div class="col-4 mt-3">
                                <label for="">No Rujukan Kewps29</label>
                                <select class="form-control" name="kewps29_id[]" required>
                                    <option selected disabled hidden>Pilih</option>
                                    @foreach ($kewps29 as $k29)
                                        <option value="{{ $k29->id }}">{{ $k29->id }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-4 mt-3">
                                <label for="">No Kod</label>
                                <select class="form-control" name="kewps3a_id[]">
                                    <option selected disabled hidden>Pilih</option>
                                    @foreach ($kewps3a as $k3a)
                                        <option {{ $k3a->id == $ik20->kewps3a_id ? 'selected' : '' }}
                                            value="{{ $k3a->id }}">{{ $k3a->no_kad }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-4 mt-3">
                                <label for="">Agensi</label>
                                <div class="input-group">
                                    <input class="form-control" type="text" value="Perbadanan Labuan" readonly>
                                </div>
                            </div>
                            <div class="col-4 mt-3">
                                <label for="">Kuantiti</label>
                                <div class="input-group">
                                    <input class="form-control" type="number" name="kuantiti[]"
                                        value="{{ $ik20->kuantiti }}">
                                </div>
                            </div>
                            <div class="col-4 mt-3">
                                <label for="">Harga Simpanan</label>
                                <div class="input-group">
                                    <input class="form-control" type="text" name="harga_simpanan[]" value="">
                                </div>
                            </div>
                            <div class="col-4 mt-3">
                                <label for="">Deposit</label>
                                <div class="input-group">
                                    <input class="form-control" type="text" name="deposit[]" value="">
                                </div>
                            </div>

                        </div>
                    @endforeach

                    <button class="btn btn-primary mt-5" type="submit">Simpan</button>
                </div>
            </div>
        </form>
    </div>
@endsection
