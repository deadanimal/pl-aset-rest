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
                                <li class="breadcrumb-item"><a href="">kewps10</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid mt--6">
        <form method="POST" action="/kewps10/{{ $kewps10->id }}">
            @method('put')
            @csrf
            <div class="card mt-4">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <h2 class="mb-0">Verifikasi Stor</h2>
                        </div>
                    </div>
                </div>

                </br>
                <div class="card-body pt-0">
                    <div class="row">
                        <div class="col-12 mt-3">
                            <label for="">Tahun</label>
                            <input class="form-control" type="number" name="tahun" value="{{ $kewps10->tahun }}">
                        </div>
                        <div class="col-12 mt-3">
                            <label for="">Kementerian</label>
                            <div class="input-group">
                                <input class="form-control" type="text" name="kementerian"
                                    value="{{ $kewps10->kementerian }}">
                            </div>
                        </div>
                        <div class="col-12 mt-3">
                            <label for="">Kategori Stor</label>
                            <div class="input-group">
                                <input class="form-control" type="text" name="kategori_stor"
                                    value="{{ $kewps10->kategori_stor }}">
                            </div>
                        </div>
                        <div class="col-12 mt-3">
                            <label for="">Bahagian</label>
                            <div class="input-group">
                                <input class="form-control" type="text" name="bahagian"
                                    value="{{ $kewps10->bahagian }}">
                            </div>
                        </div>
                        <div class="col-6 mt-3">
                            <label for="">Pegawai Verifikasi</label>
                            <div class="input-group">
                                <input class="form-control" type="text" name="pegawai_verifikasi1"
                                    value="{{ $kewps10->pegawai_verifikasi1 }}">
                            </div>
                        </div>
                        <div class="col-6 mt-3">
                            <label for="">Pegawai Verifikasi 2</label>
                            <div class="input-group">
                                <input class="form-control" type="text" name="pegawai_verifikasi2"
                                    value="{{ $kewps10->pegawai_verifikasi2 }}">
                            </div>
                        </div>
                        <div class="col-12 mt-3">
                            <label for="">Pegawai Aset</label>
                            <div class="input-group">
                                <input class="form-control" type="text" name="pegawai_aset"
                                    value="{{ $kewps10->pegawai_aset }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 mt-2">
                            <h3 class="mt-4">Kuantiti Stok</h3>
                        </div>
                        @foreach ($infokewps10 as $ik10)
                            <input class="form-control form-control-sm" type="hidden" name="info_id[]"
                                value="{{ $ik10->id }}">
                            <div class="col-3">
                                <label for="">No Kod</label>
                                <select class="form-control mb-3" name="kewps3a_id[]">
                                    <option selected value="{{ $ik10->kewps3a_id }}">{{ $ik10->kewps3a_id }} -
                                        {{ $ik10->kewps3a->perihal_stok }}
                                    </option>
                                    @foreach ($kewps3a as $k3)
                                        @if ($k3->id != $ik10->kewps3a_id)
                                            <option value="{{ $k3->id }}">{{ $k3->no_kad }}
                                            </option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-3">
                                <label for="">Kuantiti Fizikal Stok</label>
                                <div class="input-group">
                                    <input class="form-control mb-3" type="number" name="kuantiti_fizikal_stok[]"
                                        value="{{ $ik10->kuantiti_fizikal_stok }}">
                                </div>
                            </div>
                            <div class="col-3">
                                <label for="">Kuantiti Perbezaan</label>
                                <div class="input-group">
                                    <input class="form-control mb-3" type="number" name="kuantiti_perbezaan[]"
                                        value="{{ $ik10->kuantiti_perbezaan }}">
                                </div>
                            </div>
                            <div class="col-3">
                                <label for="">Catatan</label>
                                <div class="input-group">
                                    <input class="form-control mb-3" type="text" name="catatan[]"
                                        value="{{ $ik10->catatan }}">
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class=" mt-3">
                        <button class="btn btn-primary" type="submit">Simpan</button>
                    </div>
                </div>
            </div>
        </form>
    </div>


@endsection
