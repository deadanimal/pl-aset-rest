@extends('layouts.base_pa') @section('content')
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-white d-inline-block mb-0">Perbadanan Labuan</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="#"><i class="fas fa-file"></i></a></li>
                                <li class="breadcrumb-item"><a href="/kewpa10">kewpa10</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid mt--6">
        <div id="updateDiv">
            <form id="updateForm" action="/kewpa10" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card mt-4" id="basic-info">
                    <div class="card-header">
                        <div class="row">
                            <div class="col">
                                <h2 class="mb-0">Tambah Aduan Kerosakan</h2>
                            </div>
                        </div>
                    </div>

                    </br>
                    <div class="card-body pt-0">
                        <div class="row">
                            <div class="col-4">
                                <label for="">No Siri Pendaftaran</label>
                                <div class="input-group">
                                    <select class="form-control mb-3" name="no_siri_pendaftaran" required>
                                        <option value="" selected disabled hidden>Pilih No Siri Pendaftaran</option
                                            required>
                                        @foreach ($kewpa3a as $kp3)
                                            <option value="{{ $kp3->no_siri_pendaftaran }}">{{ $kp3->no_siri_pendaftaran }}</option>
                                        @endforeach
                                    </select>

                                </div>
                            </div>
                            <div class="col-4">
                                <label for="">Pengguna Terakhir</label>
                                <div class="input-group">
                                    <select class="form-control mb-3" name="pengguna_terakhir" required>
                                        <option value="" selected disabled hidden>Pilih Pengguna</option required>
                                        @foreach ($pengguna as $pengguna)
                                            <option value="{{ $pengguna->id }}">{{ $pengguna->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-4">
                                <label for="">Tarikh Kerosakan</label>
                                <div class="input-group">
                                    <input class="form-control mb-3" type="date" name="tarikh_kerosakan" value="" required>
                                </div>
                            </div>
                            <div class="col-4">
                                <label for="">Perihal Kerosakan</label>
                                <div class="input-group">
                                    <input class="form-control mb-3" type="text" name="perihal_kerosakan" value="" required>
                                </div>
                            </div>
                            {{-- <div class="col-4">
                                <label for="">Jumlah Kos Penyelenggaraan</label>
                                <div class="input-group">
                                    <input class="form-control mb-3" type="text" name="jumlah_kos_penyelenggaraan" value="" required>
                                </div>
                            </div>
                            <div class="col-4">
                                <label for="">Anggaran Kos Penyelenggaraan</label>
                                <div class="input-group">
                                    <input class="form-control mb-3" type="text" name="anggaran_kos" value="" required>
                                </div>
                            </div>
                            <div class="col-4">
                                <label for="">Ulasan</label>
                                <div class="input-group">
                                    <input class="form-control mb-3" type="text" name="ulasan" value="" required>
                                </div>
                            </div>
                            <div class="col-4">
                                <label for="">Syor dan Ulasan</label>
                                <div class="input-group">
                                    <input class="form-control mb-3" type="text" name="syor_ulasan" value="" required>
                                </div>
                            </div> --}}
                           
                        </div>
                        <button class="btn btn-primary btn-sm" type="submit">Simpan</button>

                    </div>
            </form>
        </div>
    </div>
@endsection
