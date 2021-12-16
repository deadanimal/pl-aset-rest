@extends('layouts.base_pa') @section('content')
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-white d-inline-block mb-0">Perbadanan Labuan</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="/kewpa19">Kewpa19</a></li>
                                <li class="breadcrumb-item"><a href="/kewpa19/{{ $kewpa19->id }}">Info Kewpa19</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid mt--6">
        <div id="show">
            <form id="create_form" method="POST" action="/kewpa19/{{ $kewpa19->id }}">
                @csrf
                @method('PUT')
                <div class="card mt-4" id="basic-info">
                    <div class="card-header">
                        <div class="row">
                            <div class="col">
                                <h2 class="mb-0">Perakuan Pelupusan</h2>
                            </div>
                        </div>
                    </div>

                    </br>
                    <div class="card-body pt-0">
                        <div class="row">
                            <div class="col-6">
                                <label for="">Agensi</label>
                                <input class="form-control mb-3" type="text" name="agensi" value="{{ $kewpa19->agensi }}"
                                    required>
                            </div>
                            <div class="col-6">
                                <label for="">Alamat</label>
                                <input class="form-control mb-3" type="text" name="alamat" value="{{ $kewpa19->alamat }}"
                                    required>
                            </div>
                        </div>

                        <button class="btn-sm btn btn-primary" type="submit">Simpan</button>
                    </div>
                </div>
            </form>

            <div class="card mt-4">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <h2 class="mb-0">Info Kewpa19</h2>
                        </div>
                        <div class="text-end mr-2">
                            <button class="align-self-end btn btn-sm btn-primary" id="tambah">Tambah</button>
                        </div>
                    </div>
                </div>

                @foreach ($kewpa19->infokewpa19 as $ik19)
                    <div class=" row mt-4 mx-2">
                        <input type="hidden" name="info_k19" value="{{ $ik19->id }}">
                        <div class="col-12">
                            <h3 class="d-inline mr-3">Info {{ $loop->iteration }}</h3>
                            <form action="/info_kewpa19/{{ $ik19->id }}" method="POST" class="d-inline">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-danger btn-sm rounded-3" type="submit"><span
                                        class="fas fa-trash-alt"></span></button>
                            </form>
                        </div>
                    </div>
                    <form action="/info_kewpa19/{{ $ik19->id }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="row mx-2">
                            <div class="col-4">
                                <label for="">No Siri Pendaftaran</label>
                                <div class="input-group">
                                    <select name="no_siri_pendaftaran" class="form-control mb-3" required>
                                        @foreach ($kewpa3a as $k3a)
                                            <option {{ $k3a->id == $ik19->no_siri_pendaftaran ? 'selected' : '' }}
                                                value="{{ $k3a->id }}">{{ $k3a->no_siri_pendaftaran }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-3">
                                <label for="">Butiran Penambahbaikan</label>
                                <div class="input-group">
                                    <input class="form-control mb-3" type="text" name="butiran_penambahbaikan" required
                                        value="{{ $ik19->butiran_penambahbaikan }}">
                                </div>
                            </div>
                            <div class="col-3">
                                <label for="">Laporan Pemeriksaan</label>
                                <div class="input-group">
                                    <input class="form-control mb-3" type="text" name="laporan_pemeriksaan" required
                                        value="{{ $ik19->laporan_pemeriksaan }}">
                                </div>
                            </div>
                            <div class="col-2 mt-5">
                                <button type="submit" class="btn btn-primary btn-sm"><span
                                        class="fas fa-arrow-up"></span>Kemas
                                    Kini</button>
                            </div>
                        </div>
                    </form>
                @endforeach
            </div>
        </div>

        <div id="create" style="display: none;">
            <form method="POST" action="/info_kewpa19">
                @csrf
                <div class="card mt-4">
                    <div class="card-header">
                        <div class="row">
                            <div class="col">
                                <h2 class="mb-0">Tambah Info Perakuan Pelupusan</h2>
                            </div>
                            <div class="text-end mr-2">
                                <a class="align-self-end btn btn-sm btn-primary text-white"
                                    onclick="batalTambah()">Batal</a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body pt-0">
                        <br>
                        <div class="row">
                            <input type="hidden" name="kewpa19_id" value="{{ $kewpa19->id }}">
                            <div class="col-4">
                                <label for="">No Pindahan Aset Alih</label>
                                <div class="input-group">
                                    <select name="no_siri_pendaftaran" class="form-control mb-3" required>
                                        <option selected>Pilih</option>
                                        @foreach ($kewpa3a as $k3a)
                                            <option value="{{ $k3a->id }}">{{ $k3a->id }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-4">
                                <label for="">Butiran Penambahbaikan</label>
                                <div class="input-group">
                                    <input class="form-control mb-3" type="text" name="butiran_penambahbaikan" required>
                                </div>
                            </div>
                            <div class="col-4">
                                <label for="">Laporan Pemeriksaan</label>
                                <div class="input-group">
                                    <input class="form-control mb-3" type="text" name="laporan_pemeriksaan" value=""
                                        required>
                                </div>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script type="text/javascript">
        $("#tambah").click(function() {
            $("#show").hide();
            $("#create").show();
        });

        function batalTambah() {
            $("#create").hide()
            $("#show").show();
        }
    </script>

@endsection
