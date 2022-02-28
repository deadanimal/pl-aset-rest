@extends('layouts.base_stor') @section('content')
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-white d-inline-block mb-0">Perbadanan Labuan</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="/kewps10"><i class="fas fa-file"></i></a></li>
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

                        <div class="col-3 mt-3">
                            <label for="">Tahun</label>
                            <input type="text" class="form-control mb-3" name="tahun" id="k10_tahun" autocomplete="off"
                                value="{{ $kewps10->tahun }}">

                        </div>
                        <div class="col-3 mt-3">
                            <label for="">Kementerian</label>
                            <div class="input-group">
                                <input class="form-control" type="text" name="kementerian"
                                    value="{{ $kewps10->kementerian }}">
                            </div>
                        </div>
                        <div class="col-3 mt-3">
                            <label for="">Bahagian</label>
                            <div class="input-group">
                                <select name="bahagian" class="form-control">
                                    @foreach ($bahagian as $b)
                                        <option {{ $b->nama_jabatan == $kewps10->bahagian ? 'selected' : '' }}
                                            value="{{ $b->nama_jabatan }}">{{ $b->singkatan }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-3 mt-3">
                            <label for="">Kategori Stor</label>
                            <select name="kategori_stor" class="form-control">
                                <option {{ $kewps10->kategori_stor == 'Stor Alat Ganti' ? 'selected' : '' }}
                                    value="Stor Alat Ganti">Stor Alat Ganti</option>
                                <option {{ $kewps10->kategori_stor == 'Stor Bekalan Pejabat' ? 'selected' : '' }}
                                    value="Stor Bekalan Pejabat">Stor Bekalan Pejabat</option>
                            </select>
                        </div>

                    </div>
                    <div class="mt-5">
                        <button class="btn btn-sm btn-primary" type="submit">Simpan</button>
                    </div>

                </div>
        </form>
    </div>

    <div class="card mt-4">
        <div class="card-header">
            <div class="row">
                <div class="col">
                    <h2 class="mb-0">Info Kewps10</h2>
                </div>
            </div>
        </div>

        </br>
        <div class="card-body pt-0">
            <div class="row">
                <div class="col">
                    <h3 class="mt-3">Kuantiti Stok</h3>
                </div>
                <div class="text-end">
                    <a id="btninfokewps10" class="btn btn-sm btn-primary mx-3 text-lighter text-end" data-toggle="modal"
                        data-target="#modalinfokewps10"><span class="fas fa-plus text-lighther mr-1"></span>Tambah</a>
                </div>
            </div>
            @foreach ($kewps10->infokewps10 as $k10)
                <div class="row mt-4">
                    <div class="col">
                        <h3 class="d-inline mr-3">Info {{ $loop->iteration }}</h3>
                        <form action="/infokewps10/{{ $k10->id }}" method="POST" class="d-inline mr-3">
                            @method('DELETE')
                            @csrf
                            <button class="btn btn-danger btn-sm rounded-3" type="submit"><span
                                    class="fas fa-trash-alt"></span></button>
                        </form>

                    </div>
                </div>

                <form action="/infokewps10/{{ $k10->id }}" method="post">
                    <div class="row">
                        @csrf
                        @method('put')
                        <div class="col-1 mt-3 text-center">
                            <h4 class="d-inline-flex">Selected: </h4>
                            <input type="checkbox" name="selected" {{ $k10->selected == 'selected' ? 'checked' : '' }}
                                value="selected" class="">
                        </div>
                        <div class="col-3">
                            <label for="">No Kod</label>
                            <select class="form-control mb-3" name="kewps3a_id">
                                @foreach ($kewps3a as $k3)
                                    <option {{ $k3->id == $k10->kewps3a_id ? 'selected' : '' }}
                                        value="{{ $k3->id }}">
                                        {{ $k3->no_kad }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-3">
                            <label for="">Kuantiti Fizikal Stok</label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="number" name="kuantiti_fizikal_stok"
                                    value="{{ $k10->kuantiti_fizikal_stok }}">
                            </div>
                        </div>
                        <div class="col-4">
                            <label for="">Catatan</label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="text" name="catatan" value="{{ $k10->catatan }}">
                            </div>
                        </div>
                        <div class="col-12">
                            <h3>Status Stok</h3>
                        </div>
                        <div class="col-2">
                            <label for="">(A) Usang</label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="number" name="statusA"
                                    value="{{ $k10->statusA }}">
                            </div>
                        </div>
                        <div class="col-2">
                            <label for="">(B) Rosak</label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="number" name="statusB"
                                    value="{{ $k10->statusB }}">
                            </div>
                        </div>
                        <div class="col-2">
                            <label for="">(C) Tidak Aktif</label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="number" name="statusC"
                                    value="{{ $k10->statusC }}">
                            </div>
                        </div>
                        <div class="col-2">
                            <label for="">(D) Tidak Diperlukan</label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="number" name="statusD"
                                    value="{{ $k10->statusD }}">
                            </div>
                        </div>
                        <div class="col-2">
                            <label for="">(E) Luput Tempoh</label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="number" name="statusE"
                                    value="{{ $k10->statusE }}">
                            </div>
                        </div>
                        <div class="col-2">
                            <label for="">(F) Hilang</label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="number" name="statusF"
                                    value="{{ $k10->statusF }}">
                            </div>
                        </div>
                        <div class="col text-center">
                            <button type="submit" class="btn btn-primary btn-sm mt-2"><span
                                    class="fas fa-arrow-up"></span>Kemas Kini</button>
                        </div>
                    </div>
                </form>
            @endforeach



            <div class="modal fade" id="modalinfokewps10" tabindex="-1" role="dialog"
                aria-labelledby="modalinfokewps10Label" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalinfokewps10Label">Tambah Info Kewps10</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="/infokewps10" method="POST">
                            @csrf
                            <div class="modal-body row">
                                <div class="col-12">
                                    <h4 class="d-inline">Selected</h4>
                                    <input type="checkbox" name="selected" value="selected" required>
                                </div>

                                <div class="col-12 mt-2">
                                    <label for="">No Kod</label>
                                    <select class="form-control mb-3" name="kewps3a_id">
                                        <option selected>Pilih</option>
                                        @foreach ($kewps3a as $k3)
                                            <option value="{{ $k3->id }}">{{ $k3->no_kad }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-6">
                                    <label for="">Kuantiti Fizikal Stok</label>
                                    <div class="input-group">
                                        <input class="form-control mb-3" type="number" name="kuantiti_fizikal_stok"
                                            value="{{ old('kuantiti_fizikal_stok') }}">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <label for="">Catatan</label>
                                    <div class="input-group">
                                        <input class="form-control mb-3" type="text" name="catatan"
                                            value="{{ old('catatan') }}">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <h3>Status Stok</h3>
                                </div>
                                <div class="col-4">
                                    <label for="">(A) Usang</label>
                                    <div class="input-group">
                                        <input class="form-control mb-3" type="number" name="statusA" value="">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <label for="">(B) Rosak</label>
                                    <div class="input-group">
                                        <input class="form-control mb-3" type="number" name="statusB" value="">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <label for="">(C) Tidak Aktif</label>
                                    <div class="input-group">
                                        <input class="form-control mb-3" type="number" name="statusC" value="">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <label for="">(D) Tidak Diperlukan</label>
                                    <div class="input-group">
                                        <input class="form-control mb-3" type="number" name="statusD" value="">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <label for="">(E) Luput Tempoh</label>
                                    <div class="input-group">
                                        <input class="form-control mb-3" type="number" name="statusE" value="">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <label for="" class="mt-4">(F) Hilang</label>
                                    <div class="input-group">
                                        <input class="form-control mb-3 " type="number" name="statusF" value="">
                                    </div>
                                </div>
                                <input type="hidden" name="kewps10_id" value="{{ $kewps10->id }}">
                            </div>
                            <div class="modal-footer">
                                <a type="button" class="btn btn-secondary" data-dismiss="modal">Close</a>
                                <button type="submit" id="tambahinfo" class="btn btn-primary">Save changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script>
        $("#k10_tahun").datepicker({
            format: " yyyy",
            viewMode: "years",
            minViewMode: "years",
            autoclose: true
        });
    </script>
@endsection
