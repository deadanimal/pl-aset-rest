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
        <form method="POST" action="/kewps10">
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
                            <input type="text" class="form-control mb-3" name="tahun" id="k10_tahun" autocomplete="off">

                        </div>
                        <div class="col-3 mt-3">
                            <label for="">Kementerian</label>
                            <div class="input-group">
                                <input class="form-control" type="text" name="kementerian" value="Perbadanan Aset Labuan">
                            </div>
                        </div>
                        <div class="col-3 mt-3">
                            <label for="">Bahagian</label>
                            <div class="input-group">
                                <select name="bahagian" class="form-control">
                                    <option selected>Pilih</option>
                                    @foreach ($bahagian as $b)
                                        <option value="{{ $b->nama_jabatan }}">{{ $b->singkatan }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-3 mt-3">
                            <label for="">Kategori Stor</label>
                            <select name="kategori_stor" class="form-control">
                                <option selected>Pilih</option>
                                <option value="Stor Alat Ganti">Stor Alat Ganti</option>
                                <option value="Stor Bekalan Pejabat">Stor Bekalan Pejabat</option>
                            </select>
                        </div>

                        <input class="form-control" type="hidden" name="pegawai_verifikasi1"
                            value="{{ Auth::user()->id }}">

                        <input class="form-control" type="hidden" name="pegawai_verifikasi2"
                            value="{{ Auth::user()->id }}">

                        <input class="form-control" type="hidden" name="pegawai_aset" value="{{ Auth::user()->id }}">
                    </div>
                    <div class="row" id="aset_create">
                        <div class="col-12 mt-2">
                            <h3 class="mt-4">Kuantiti Stok</h3>
                        </div>
                        <div class="col-4">
                            <label for="">No Kod</label>
                            <select class="form-control mb-3" name="kewps3a_id[]">
                                <option selected>Pilih</option>
                                @foreach ($kewps3a as $k3)
                                    <option value="{{ $k3->id }}">{{ $k3->id }} - {{ $k3->perihal_stok }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-4">
                            <label for="">Kuantiti Fizikal Stok</label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="number" name="kuantiti_fizikal_stok[]"
                                    value="{{ old('kuantiti_fizikal_stok') }}">
                            </div>
                        </div>
                        <div class="col-4">
                            <label for="">Catatan</label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="text" name="catatan[]"
                                    value="{{ old('catatan') }}">
                            </div>
                        </div>
                        <div class="col-12">
                            <h3>Status Stok</h3>
                        </div>
                        <div class="col-2">
                            <label for="">(A) Usang</label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="number" name="statusA[]" value="">
                            </div>
                        </div>
                        <div class="col-2">
                            <label for="">(B) Rosak</label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="number" name="statusB[]" value="">
                            </div>
                        </div>
                        <div class="col-2">
                            <label for="">(C) Tidak Aktif</label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="number" name="statusC[]" value="">
                            </div>
                        </div>
                        <div class="col-2">
                            <label for="">(D) Tidak Diperlukan</label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="number" name="statusD[]" value="">
                            </div>
                        </div>
                        <div class="col-2">
                            <label for="">(E) Luput Tempoh</label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="number" name="statusE[]" value="">
                            </div>
                        </div>
                        <div class="col-2">
                            <label for="">(F) Hilang</label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="number" name="statusF[]" value="">
                            </div>
                        </div>
                    </div>
                    <div class="   mt-2">
                        <a class="btn btn-sm btn-primary text-white" onclick="tambahAset()">Tambah Aset</a>
                    </div>
                    <div class=" mt-3">
                        <button class="btn btn-primary" type="submit">Simpan</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <script>
        $(document).ready(function() {
            $("#k10_tahun").datepicker({
                format: "yyyy",
                viewMode: "years",
                minViewMode: "years",
                autoclose: true
            });
        });

        function tambahAset() {
            $("#aset_create").append(
                `   <div class="col-12 mt-2">
                            <h3 class="mt-4">Kuantiti Stok</h3>
                        </div>
                        <div class="col-4">
                            <label for="">No Kod</label>
                            <select class="form-control mb-3" name="kewps3a_id[]">
                                <option selected>Pilih</option>
                                @foreach ($kewps3a as $k3)
                                    <option value="{{ $k3->id }}">{{ $k3->id }} - {{ $k3->perihal_stok }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-4">
                            <label for="">Kuantiti Fizikal Stok</label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="number" name="kuantiti_fizikal_stok[]"
                                    value="{{ old('kuantiti_fizikal_stok') }}">
                            </div>
                        </div>
                        <div class="col-4">
                            <label for="">Catatan</label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="text" name="catatan[]"
                                    value="{{ old('catatan') }}">
                            </div>
                        </div>
                        <div class="col-12">
                            <h3>Status Stok</h3>
                        </div>
                        <div class="col-2">
                            <label for="">(A) Usang</label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="number" name="statusA[]" value="">
                            </div>
                        </div>
                        <div class="col-2">
                            <label for="">(B) Rosak</label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="number" name="statusB[]" value="">
                            </div>
                        </div>
                        <div class="col-2">
                            <label for="">(C) Tidak Aktif</label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="number" name="statusC[]" value="">
                            </div>
                        </div>
                        <div class="col-2">
                            <label for="">(D) Tidak Diperlukan</label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="number" name="statusD[]" value="">
                            </div>
                        </div>
                        <div class="col-2">
                            <label for="">(E) Luput Tempoh</label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="number" name="statusE[]" value="">
                            </div>
                        </div>
                        <div class="col-2">
                            <label for="">(F) Hilang</label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="number" name="statusF[]" value="">
                            </div>
                        </div>
                `
            )
        }
    </script>
@endsection
