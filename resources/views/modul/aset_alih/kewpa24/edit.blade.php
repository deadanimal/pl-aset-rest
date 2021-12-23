@extends('layouts.base_pa') @section('content')
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-white d-inline-block mb-0">Perbadanan Labuan</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="/kewpa24">Kewpa24</a></li>
                                <li class="breadcrumb-item"><a href="/kewpa24/{{ $kewpa24->id }}">Info Kewpa24</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid mt--6">
        <div id="show">
            <form id="create_form" method="POST" action="/kewpa24/{{ $kewpa24->id }}">
                @csrf
                @method('PUT')
                <div class="card mt-4" id="basic-info">
                    <div class="card-header">
                        <div class="row">
                            <div class="col">
                                <h2 class="mb-0">Kenyataan Tawaran Tender Pelupusan Aset Alih</h2>
                            </div>
                        </div>
                    </div>

                    </br>
                    <div class="card-body pt-0">
                        <div class="row">
                            <div class="col-3">
                                <label for="">Tarikh Mula</label>
                                <input class="form-control mb-3" type="date" name="tarikh_mula"
                                    value="{{ $kewpa24->tarikh_mula }}" required>
                            </div>
                            <div class="col-3">
                                <label for="">Tarikh Tamat</label>
                                <input class="form-control mb-3" type="date" name="tarikh_tamat"
                                    value="{{ $kewpa24->tarikh_tamat }}" required>
                            </div>
                            <div class="col-3">
                                <label for="">Jam Mula</label>
                                <input class="form-control mb-3" type="time" name="jam_mula"
                                    value="{{ $kewpa24->jam_mula }}" required>
                            </div>
                            <div class="col-3">
                                <label for="">Jam Tamat</label>
                                <input class="form-control mb-3" type="time" name="jam_tamat"
                                    value="{{ $kewpa24->jam_tamat }}" required>
                            </div>
                            <div class="col-3">
                                <label for="">Tempat</label>
                                <input class="form-control mb-3" type="text" name="tempat" value="{{ $kewpa24->tempat }}"
                                    required>
                            </div>
                            <div class="col-3">
                                <label for="">Tarikh Tutup</label>
                                <input class="form-control mb-3" type="date" name="tarikh_tutup"
                                    value="{{ $kewpa24->tarikh_tutup }}" required>
                            </div>
                            <div class="col-3">
                                <label for="">Alamat</label>
                                <input class="form-control mb-3" type="text" name="alamat" value="{{ $kewpa24->alamat }}"
                                    required>
                            </div>
                            <div class="col-3">
                                <label for="">Agensi</label>
                                <input class="form-control mb-3" type="text" name="agensi" value="{{ $kewpa24->agensi }}"
                                    required>
                            </div>

                        </div>
                        <button class="btn-sm btn btn-primary" type="submit">Simpan</button>
                    </div>
                </div>
            </form>

            <div class="card my-4">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <h2 class="mb-0">Info Kewpa24</h2>
                        </div>
                        <div class="text-end mr-2">
                            <button class="align-self-end btn btn-sm btn-primary" id="tambah">Tambah</button>
                        </div>
                    </div>
                </div>

                @foreach ($kewpa24->infokewpa24 as $ik24)
                    <div class=" row mt-4 mx-2">
                        <input type="hidden" name="info_k24" value="{{ $ik24->id }}">
                        <div class="col-12">
                            <h3 class="d-inline mr-3">Info {{ $loop->iteration }}</h3>
                            <form action="/info_kewpa24/{{ $ik24->id }}" method="POST" class="d-inline">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-danger btn-sm rounded-3" type="submit"><span
                                        class="fas fa-trash-alt"></span></button>
                            </form>

                        </div>

                    </div>

                    <form action="/info_kewpa24/{{ $ik24->id }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="row mx-2 my-3">

                            <div class="col-4">
                                <label for="">ID Borang Pelupusan</label>
                                <div class="input-group">
                                    <select name="kewpa21_id" class="form-control mb-3" required>
                                        @foreach ($infokewpa21 as $ik21)
                                            <option {{ $ik21->id == $kewpa24->kewpa21_id ? 'selected' : '' }}
                                                value="{{ $ik21->id }}">{{ $ik21->id }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-3">
                                <label for="">Kuantiti</label>
                                <div class="input-group">
                                    <input class="form-control mb-3" type="number" name="kuantiti"
                                        value="{{ $ik24->kuantiti }}" required>
                                </div>
                            </div>
                            <div class="col-3">
                                <label for="">Harga Simpanan</label>
                                <div class="input-group">
                                    <input class="form-control mb-3" type="text" name="harga simpanan"
                                        value="{{ $ik24->harga_simpanan }}" required>
                                </div>
                            </div>
                            <div class="col-2 mt-5">
                                <button class="btn btn-sm btn-primary" type="submit"> <span
                                        class="fas fa-arrow-up"></span>Kemas Kini</button>
                            </div>
                        </div>
                    </form>
                @endforeach
            </div>
        </div>

        <div id="create" style="display: none;">
            <form method="POST" action="/info_kewpa24">
                @csrf
                <div class="card mt-4">
                    <div class="card-header">
                        <div class="row">
                            <div class="col">
                                <h2 class="mb-0">Tambah Info Kewpa24</h2>
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
                            <input type="hidden" name="kewpa24_id" value="{{ $kewpa24->id }}">
                            <div class="col-4">
                                <label for="">ID Borang Pelupusan</label>
                                <div class="input-group">
                                    <select name="kewpa21_id" class="form-control mb-3" required>
                                        <option selected>Pilih</option>
                                        @foreach ($infokewpa21 as $ik21)
                                            <option value="{{ $ik21->id }}">{{ $ik21->id }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-4">
                                <label for="">Kuantiti</label>
                                <div class="input-group">
                                    <input class="form-control mb-3" type="number" name="kuantiti" required>
                                </div>
                            </div>
                            <div class="col-4">
                                <label for="">Harga Simpanan</label>
                                <div class="input-group">
                                    <input class="form-control mb-3" type="text" name="harga simpanan" value="" required>
                                </div>
                            </div>
                            <div class="col-12">
                                <button class="btn-sm btn btn-primary" type="submit">Simpan</button>
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
