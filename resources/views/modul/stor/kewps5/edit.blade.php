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
        <form method="POST" action="/kewps5/{{ $kewps5->id }}">
            @method('put')
            @csrf
            <div class="card mt-4">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <h2 class="mb-0">Penentuan Kumpulan Stok</h2>
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
                                <option selected value="{{ $kewps5->kewps3a_id }}">{{ $kewps5->kewps3a_id }}</option>
                                @foreach ($kewps3a as $k3)
                                    @if ($k3->id != $kewps5->kewps3a_id)
                                        <option value="{{ $k3->id }}">{{ $k3->no_kad }}
                                        </option>
                                    @endif
                                @endforeach
                            </select>
                        </div>

                        <div class="col-12 mt-3">
                            <label for="">Jumlah beli tahun Lepas</label>
                            <input class="form-control" type="text" name="jumlah_beli_setahun_lepas"
                                value="{{ $kewps5->jumlah_beli_setahun_lepas }}">
                        </div>
                        <div class="col-12 mt-3">
                            <label for="">Jumlah beli dua tahun lepas</label>
                            <div class="input-group">
                                <input class="form-control" type="text" name="jumlah_beli_dua_tahun_lepas"
                                    value="{{ $kewps5->jumlah_beli_dua_tahun_lepas }}">
                            </div>
                        </div>
                        <div class="col-12 mt-3">
                            <label for="">Purata Pembelian</label>
                            <div class="input-group">
                                <input class="form-control" type="number" step="0.01" name="purata_pembelian"
                                    value="{{ $kewps5->purata_pembelian }}">
                            </div>
                        </div>
                        <div class="col-12 mt-3">
                            <label for="">Peratusan</label>
                            <div class="input-group">
                                <input class="form-control" type="number" step="0.01" name="peratusan"
                                    value="{{ $kewps5->peratusan }}">
                            </div>
                        </div>

                        <div class="col-3 mt-5">
                            <button class="btn btn-primary" type="submit">Simpan</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
