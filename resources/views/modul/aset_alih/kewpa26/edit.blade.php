@extends('layouts.base_pa') @section('content')
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-white d-inline-block mb-0">Perbadanan Labuan</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="/kewpa26">Kewpa26</a></li>
                                <li class="breadcrumb-item"><a href="/kewpa26/{{ $kewpa26->id }}">Info Kewpa26</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid mt--6">
        <div id="show">
            <form id="create_form" method="POST" action="/kewpa26/{{ $kewpa26->id }}">
                @csrf
                @method('PUT')
                <div class="card mt-4" id="basic-info">
                    <div class="card-header">
                        <div class="row">
                            <div class="col">
                                <h2 class="mb-0">Jadual Tender Pelupusan Aset Alih</h2>
                            </div>
                        </div>
                    </div>

                    </br>
                    <div class="card-body pt-0">
                        <div class="row">

                        </div>
                        <button class="btn-sm btn btn-primary" type="submit">Simpan</button>
                    </div>
                </div>
            </form>

            <div class="card my-4">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <h2 class="mb-0">Info Kewpa26</h2>
                        </div>
                        <div class="text-end mr-2">
                            <button class="align-self-end btn btn-sm btn-primary" id="tambah">Tambah</button>
                        </div>
                    </div>
                </div>

                @foreach ($kewpa26->infokewpa26 as $ik26)
                    <div class=" row mt-4 mx-2">
                        <div class="col-12">
                            <h3 class="d-inline mr-3">Info {{ $loop->iteration }}</h3>
                            <form action="/info_kewpa26/{{ $ik26->id }}" method="POST" class="d-inline">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-danger btn-sm rounded-3" type="submit"><span
                                        class="fas fa-trash-alt"></span></button>
                            </form>
                        </div>
                    </div>

                    <form action="/info_kewpa26/{{ $ik26->id }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="row mx-2 my-3">

                            <div class="col-4">
                                <label for="">No Tender</label>
                                <div class="input-group">
                                    <select name="no_tender" class="form-control mb-3" required>
                                        @foreach ($kewpa24 as $k24)
                                            <option {{ $k24->id == $kewpa26->no_tender ? 'selected' : '' }}
                                                value="{{ $k24->id }}">{{ $k24->id }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-4">
                                <label for="">Kod Pertender</label>
                                <div class="input-group">
                                    <input class="form-control mb-3" type="text" name="kod_petender"
                                        value="{{ $ik26->kod_petender }}" required>
                                </div>
                            </div>
                            <div class="col-4">
                                <label for="">Harga</label>
                                <div class="input-group">
                                    <input class="form-control mb-3" type="text" name="harga" value="{{ $ik26->harga }}"
                                        required>
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
            <form method="POST" action="/info_kewpa26">
                @csrf
                <div class="card mt-4">
                    <div class="card-header">
                        <div class="row">
                            <div class="col">
                                <h2 class="mb-0">Tambah Info Kewpa26</h2>
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
                            <input type="hidden" name="kewpa26_id" value="{{ $kewpa26->id }}">
                            <div class="col-4">
                                <label for="">No Tender</label>
                                <div class="input-group">
                                    <select name="no_tender" class="form-control mb-3" required>
                                        <option selected>Pilih</option>
                                        @foreach ($kewpa24 as $k24)
                                            <option value="{{ $k24->id }}">{{ $k24->id }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-4">
                                <label for="">Kod Pertender</label>
                                <div class="input-group">
                                    <input class="form-control mb-3" type="number" name="kod petender" required>
                                </div>
                            </div>
                            <div class="col-4">
                                <label for="">Harga</label>
                                <div class="input-group">
                                    <input class="form-control mb-3" type="number" name="harga" value="" required>
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
