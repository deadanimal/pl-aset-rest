@extends('layouts.base_pa') @section('content')
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-white d-inline-block mb-0">Perbadanan Labuan</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="/kewpa27">Kewpa27</a></li>
                                <li class="breadcrumb-item"><a href="/kewpa27/{{ $kewpa27->id }}">Info Kewpa27</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid mt--6">
        <div id="show">
            <form id="create_form" method="POST" action="/kewpa27/{{ $kewpa27->id }}">
                @csrf
                @method('PUT')
                <div class="card mt-4" id="basic-info">
                    <div class="card-header">
                        <div class="row">
                            <div class="col">
                                <h2 class="mb-0">Kenyataan Tawaran Sebut Harga Pelupusan Aset Alih</h2>
                            </div>
                        </div>
                    </div>

                    </br>
                    <div class="card-body pt-0">
                        <div class="row">
                            <div class="col-3">
                                <label for="">Agensi</label>
                                <input type="text" name="agensi" class="form-control mb-3" value="Perbadanan Aset Labuan"
                                    value="{{ $kewpa27->agensi }}" required>
                            </div>
                            <div class="col-3">
                                <label for="">Tarikh Mula</label>
                                <input type="date" name="tarikh_mula" class="form-control mb-3"
                                    value="{{ $kewpa27->tarikh_mula }}" required>
                            </div>
                            <div class="col-3">
                                <label for="">Tarikh Tamat</label>
                                <input type="date" name="tarikh_tamat" class="form-control mb-3"
                                    value="{{ $kewpa27->tarikh_tamat }}" required>
                            </div>
                            <div class="col-3">
                                <label for="">Jam Mula</label>
                                <input type="time" name="jam_mula" class="form-control mb-3"
                                    value="{{ $kewpa27->jam_mula }}" required>
                            </div>
                            <div class="col-3">
                                <label for="">Jam Tamat</label>
                                <input type="time" name="jam_tamat" class="form-control mb-3"
                                    value="{{ $kewpa27->jam_tamat }}" required>
                            </div>
                            <div class="col-3">
                                <label for="">Tempat</label>
                                <input type="text" name="tempat" class="form-control mb-3" value="{{ $kewpa27->tempat }}"
                                    required>
                            </div>
                            <div class="col-3">
                                <label for="">Alamat</label>
                                <input type="text" name="alamat" class="form-control mb-3" value="{{ $kewpa27->alamat }}"
                                    required>
                            </div>
                            <div class="col-3">
                                <label for="">Tarikh Tutup</label>
                                <input type="date" name="tarikh_tutup" class="form-control mb-3"
                                    value="{{ $kewpa27->tarikh_tutup }}" required>
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
                            <h2 class="mb-0">Info Kewpa27</h2>
                        </div>
                        <div class="text-end mr-2">
                            <button class="align-self-end btn btn-sm btn-primary" id="tambah">Tambah</button>
                        </div>
                    </div>
                </div>

                @foreach ($kewpa27->infokewpa27 as $ik27)
                    <div class=" row mt-4 mx-2">
                        <div class="col-12">
                            <h3 class="d-inline mr-3">Info {{ $loop->iteration }}</h3>
                            <form action="/info_kewpa27/{{ $ik27->id }}" method="POST" class="d-inline">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-danger btn-sm rounded-3" type="submit"><span
                                        class="fas fa-trash-alt"></span></button>
                            </form>
                        </div>
                    </div>

                    <form action="/info_kewpa27/{{ $ik27->id }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="row mx-2 my-3">

                            <div class="col-4">
                                <label for="">ID Perakuan Pelupusan</label>
                                <div class="input-group">
                                    <select name="kewpa21_id" class="form-control mb-3" required>
                                        @foreach ($kewpa21 as $k21)
                                            <option {{ $k21->id == $ik27->kewpa21_id ? 'selected' : '' }}
                                                value="{{ $k21->id }}">{{ $k21->id }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-4">
                                <label for="">Kuantiti</label>
                                <div class="input-group">
                                    <input class="form-control mb-3" type="number" name="kuantiti"
                                        value="{{ $ik27->kuantiti }}" required>
                                </div>
                            </div>
                            <div class="col-4">
                                <label for="">Harga Simpanan</label>
                                <div class="input-group">
                                    <input class="form-control mb-3" type="number" name="harga_simpanan"
                                        value="{{ $ik27->harga_simpanan }}" required>
                                </div>
                            </div>
                            <div class="col-12 text-center">
                                <button class="btn btn-sm btn-primary" type="submit"> <span
                                        class="fas fa-arrow-up"></span>Kemas Kini</button>
                            </div>
                        </div>
                    </form>
                @endforeach
            </div>
        </div>

        <div id="create" style="display: none;">
            <form method="POST" action="/info_kewpa27">
                @csrf
                <div class="card mt-4">
                    <div class="card-header">
                        <div class="row">
                            <div class="col">
                                <h2 class="mb-0">Tambah Info Kewpa27</h2>
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
                            <input type="hidden" name="kewpa27_id" value="{{ $kewpa27->id }}">
                            <div class="col-4">
                                <label for="">ID Perakuan Pelupusan</label>
                                <div class="input-group">
                                    <select name="kewpa21_id" class="form-control mb-3" required>
                                        <option selected>Pilih</option>
                                        @foreach ($kewpa21 as $k21)
                                            <option value="{{ $k21->id }}">{{ $k21->id }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-4">
                                <label for="">Kuantiti</label>
                                <div class="input-group">
                                    <input class="form-control mb-3" type="number" name="kuantiti" value="" required>
                                </div>
                            </div>
                            <div class="col-4">
                                <label for="">Harga Simpanan</label>
                                <div class="input-group">
                                    <input class="form-control mb-3" type="number" name="harga_simpanan" value="" required>
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
