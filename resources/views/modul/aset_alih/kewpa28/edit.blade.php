@extends('layouts.base_pa') @section('content')
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-white d-inline-block mb-0">Perbadanan Labuan</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="/kewpa28">Kewpa28</a></li>
                                <li class="breadcrumb-item"><a href="/kewpa28/{{ $kewpa28->id }}">Info Kewpa28</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid mt--6">
        <div id="show">
            <form id="create_form" method="POST" action="/kewpa28/{{ $kewpa28->id }}">
                @csrf
                @method('PUT')
                <div class="card mt-4" id="basic-info">
                    <div class="card-header">
                        <div class="row">
                            <div class="col">
                                <h2 class="mb-0">Borang Sebut Harga Pelupusan Aset Alih</h2>
                            </div>
                        </div>
                    </div>

                    </br>
                    <div class="card-body pt-0">
                        <div class="row">
                            <div class="col-4">
                                <label for="">Nama</label>
                                <input class="form-control mb-3" type="text" name="nama" value="{{ $kewpa28->nama }}"
                                    required>
                            </div>
                            <div class="col-4">
                                <label for="">No Pengenalan</label>
                                <input class="form-control mb-3" type="text" name="no_pengenalan"
                                    value="{{ $kewpa28->no_pengenalan }}" required>
                            </div>
                            <div class="col-4">
                                <label for="">Agensi</label>
                                <input class="form-control mb-3" type="text" name="agensi" value="{{ $kewpa28->agensi }}"
                                    required>
                            </div>
                            <div class="col-3">
                                <label for="">Alamat Agensi</label>
                                <input class="form-control mb-3" type="text" name="alamat_agensi"
                                    value="{{ $kewpa28->alamat_agensi }}" required>
                            </div>
                            <div class="col-3">
                                <label for="">Deposit</label>
                                <input class="form-control mb-3" type="text" name="deposit"
                                    value="{{ $kewpa28->deposit }}" required>
                            </div>
                            <div class="col-3">
                                <label for="">No Bank</label>
                                <input class="form-control mb-3" type="text" name="no_bank"
                                    value="{{ $kewpa28->no_bank }}" required>
                            </div>
                            <div class="col-3">
                                <label for="">Nama Agensi</label>
                                <input class="form-control mb-3" type="text" name="nama_agensi"
                                    value="{{ $kewpa28->nama_agensi }}" required>
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
                            <h2 class="mb-0">Info Kewpa28</h2>
                        </div>
                        <div class="text-end mr-2">
                            <button class="align-self-end btn btn-sm btn-primary" id="tambah">Tambah</button>
                        </div>
                    </div>
                </div>

                @foreach ($kewpa28->infokewpa28 as $ik28)
                    <div class=" row mt-4 mx-2">
                        <div class="col-12">
                            <h3 class="d-inline mr-3">Info {{ $loop->iteration }}</h3>
                            <form action="/info_kewpa28/{{ $ik28->id }}" method="POST" class="d-inline">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-danger btn-sm rounded-3" type="submit"><span
                                        class="fas fa-trash-alt"></span></button>
                            </form>
                        </div>
                    </div>

                    <form action="/info_kewpa28/{{ $ik28->id }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="row mx-2 my-3">

                            <div class="col-3">
                                <label for="">No Sebut Harga</label>
                                <div class="input-group">
                                    <select name="kewpa27_id" class="form-control mb-3" required>
                                        @foreach ($kewpa27 as $k27)
                                            <option {{ $k27->id == $ik28->kewpa27_id ? 'selected' : '' }}
                                                value="{{ $k27->id }}">{{ $k27->id }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-3">
                                <label for="">Kuantiti</label>
                                <div class="input-group">
                                    <input class="form-control mb-3" type="number" name="kuantiti"
                                        value="{{ $ik28->kuantiti }}" required>
                                </div>
                            </div>
                            <div class="col-3">
                                <label for="">Harga Tawaran</label>
                                <div class="input-group">
                                    <input class="form-control mb-3" type="number" name="harga_tawaran"
                                        value="{{ $ik28->harga_tawaran }}" required>
                                </div>
                            </div>
                            <div class="col-3">
                                <label for="">Deposit Harga</label>
                                <div class="input-group">
                                    <input class="form-control mb-3" type="number" name="deposit_harga"
                                        value="{{ $ik28->deposit_harga }}" required>
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
            <form method="POST" action="/info_kewpa28">
                @csrf
                <div class="card mt-4">
                    <div class="card-header">
                        <div class="row">
                            <div class="col">
                                <h2 class="mb-0">Tambah Info Kewpa28</h2>
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
                            <input type="hidden" name="kewpa28_id" value="{{ $kewpa28->id }}">
                            <div class="col-3">
                                <label for="">No Sebut Harga</label>
                                <div class="input-group">
                                    <select name="kewpa27_id" class="form-control mb-3" required>
                                        <option selected>Pilih</option>
                                        @foreach ($kewpa27 as $k27)
                                            <option value="{{ $k27->id }}">{{ $k27->id }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-3">
                                <label for="">Kuantiti</label>
                                <div class="input-group">
                                    <input class="form-control mb-3" type="number" name="kuantiti" value="" required>
                                </div>
                            </div>
                            <div class="col-3">
                                <label for="">Harga Tawaran</label>
                                <div class="input-group">
                                    <input class="form-control mb-3" type="number" name="harga_tawaran" value="" required>
                                </div>
                            </div>
                            <div class="col-3">
                                <label for="">Deposit Harga</label>
                                <div class="input-group">
                                    <input class="form-control mb-3" type="number" name="deposit_harga" value="" required>
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
