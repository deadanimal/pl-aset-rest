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
                                <li class="breadcrumb-item"><a href="">kewps13</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid mt--6">
        <form method="POST" action="/kewps13/{{ $kewps13->id }}">
            @method('put')
            @csrf
            <div class="card mt-4">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <h2 class="mb-0">Laporan Verifikasi</h2>
                        </div>
                    </div>
                </div>

                </br>
                <div class="card-body pt-0">
                    <div class="row">
                        <div class="col-4">
                            <label for="">Verifikasi Stor</label>
                            <select class="form-control mb-3" name="infokewps10_id">
                                <option value="{{ $kewps13->infokewps10_id }}">{{ $kewps13->infokewps10_id }} -
                                    {{ $kewps13->infokewps10->kewps10->kementerian }}
                                </option>
                                @foreach ($infokewps10 as $k10)
                                    @if ($k10->id != $kewps13->infokewps10_id)
                                        <option value="{{ $k10->id }}">{{ $k10->id }} -
                                            {{ $k10->kewps10->kementerian }}
                                        </option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="col-4">
                            <label for="">No Kod</label>
                            <select class="form-control mb-3" name="kewps3a_id">
                                <option value="{{ $kewps13->kewps3a_id }}">{{ $kewps13->kewps3a_id }} -
                                    {{ $kewps13->kewps3a->nama_stor }}
                                </option>
                                @foreach ($kewps3a as $k3a)
                                    @if ($k3a->id != $kewps13->kewps3a_id)
                                        <option value="{{ $k3a->id }}">{{ $k3a->id }} -
                                            {{ $k3a->nama_stor }}
                                        </option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="col-4 ">
                            <label for="">Stok Tidak Diverikasi</label>
                            <div class="input-group">
                                <input class="form-control" type="number" name="stok_tidak_diverifikasi"
                                    value="{{ $kewps13->stok_tidak_diverifikasi }}">
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                    <div class=" mt-3">
                        <button class="btn btn-primary" type="submit">Simpan</button>
                    </div>
                </div>
            </div>
        </form>
    </div>


@endsection
