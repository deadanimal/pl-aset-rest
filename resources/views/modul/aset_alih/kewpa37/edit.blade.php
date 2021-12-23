@extends('layouts.base_pa') @section('content')
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-white d-inline-block mb-0">Perbadanan Labuan</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="/kewpa37">Kewpa37</a></li>
                                <li class="breadcrumb-item"><a href="/kewpa37/{{ $kewpa37->id }}">Info Kewpa37</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid mt--6">
        <div id="show">
            <form id="create_form" method="POST" action="/kewpa37/{{ $kewpa37->id }}">
                @csrf
                @method('PUT')
                <div class="card mt-4" id="basic-info">
                    <div class="card-header">
                        <div class="row">
                            <div class="col">
                                <h2 class="mb-0">Laporan Hapus Kira Aset Alih</h2>
                            </div>
                        </div>
                    </div>

                    </br>
                    <div class="card-body pt-0">
                        <div class="row">
                            <div class="col-12">
                                <label for="">Tahun</label>
                                <input class="form-control mb-3 tahun" type="text" name="tahun" autocomplete="off"
                                    value="{{ $kewpa37->tahun }}">
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
                            <h2 class="mb-0">Info Kewpa37</h2>
                        </div>
                        <div class="text-end mr-2">
                            <button class="align-self-end btn btn-sm btn-primary" id="tambah">Tambah</button>
                        </div>
                    </div>
                </div>

                @foreach ($kewpa37->infokewpa37 as $ik)
                    <div class=" row mt-4 mx-2">
                        <div class="col-12">
                            <h3 class="d-inline mr-3">Info {{ $loop->iteration }}</h3>
                            <form action="/info_kewpa37/{{ $ik->id }}" method="POST" class="d-inline">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-danger btn-sm rounded-3" type="submit"><span
                                        class="fas fa-trash-alt"></span></button>
                            </form>
                        </div>
                    </div>

                    <form action="/info_kewpa37/{{ $ik->id }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="row mx-2 my-3">

                            <div class="col-3">
                                <label for="">ID Kewpa33</label>
                                <div class="input-group">
                                    <select name="kewpa33_id" class="form-control mb-3" required>
                                        @foreach ($kewpa33 as $k33)
                                            <option {{ $k33->id == $ik->kewpa33_id ? 'selected' : '' }}
                                                value="{{ $k33->id }}">{{ $k33->id }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-3">
                                <label for="">Agensi</label>
                                <div class="input-group">
                                    <input class="form-control mb-3" type="text" name="agensi" value="{{ $ik->agensi }}"
                                        required>
                                </div>
                            </div>
                            <div class="col-3">
                                <label for="">Kuantiti Hapus</label>
                                <div class="input-group">
                                    <input class="form-control mb-3" type="number" name="kuantiti_hapus"
                                        value="{{ $ik->kuantiti_hapus }}" required>
                                </div>
                            </div>
                            <div class="col-3">
                                <label for="">Nilai Perolehan Hapus</label>
                                <div class="input-group">
                                    <input class="form-control mb-3" type="text" name="nilai_perolehan_hapus"
                                        value="{{ $ik->nilai_perolehan_hapus }}" required>
                                </div>
                            </div>
                            <div class="col-3">
                                <label for="">Nilai Semasa Hapus</label>
                                <div class="input-group">
                                    <input class="form-control mb-3" type="text" name="nilai_semasa_hapus"
                                        value="{{ $ik->nilai_semasa_hapus }}" required>
                                </div>
                            </div>
                            <div class="col-3">
                                <label for="">Kes Surcaj</label>
                                <div class="input-group">
                                    <input class="form-control mb-3" type="text" name="kes_surcaj"
                                        value="{{ $ik->kes_surcaj }}" required>
                                </div>
                            </div>
                            <div class="col-3">
                                <label for="">Nilai Surcaj</label>
                                <div class="input-group">
                                    <input class="form-control mb-3" type="text" name="nilai_surcaj"
                                        value="{{ $ik->nilai_surcaj }}" required>
                                </div>
                            </div>
                            <div class="col-3">
                                <label for="">Kes Tatatertib</label>
                                <div class="input-group">
                                    <input class="form-control mb-3" type="text" name="kes_tatatertib"
                                        value="{{ $ik->kes_tatatertib }}" required>
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
            <form method="POST" action="/info_kewpa37">
                @csrf
                <div class="card mt-4">
                    <div class="card-header">
                        <div class="row">
                            <div class="col">
                                <h2 class="mb-0">Tambah Info Kewpa37</h2>
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
                            <input type="hidden" name="kewpa37_id" value="{{ $kewpa37->id }}">
                            <div class="col-3">
                                <label for="">ID Kewpa33</label>
                                <div class="input-group">
                                    <select name="kewpa33_id" class="form-control mb-3" required>
                                        <option selected>Pilih</option>
                                        @foreach ($kewpa33 as $k33)
                                            <option value="{{ $k33->id }}">{{ $k33->id }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-3">
                                <label for="">Agensi</label>
                                <div class="input-group">
                                    <input class="form-control mb-3" type="text" name="agensi"
                                        value="Perbadanan Aset Labuan" required>
                                </div>
                            </div>
                            <div class="col-3">
                                <label for="">Kuantiti Hapus</label>
                                <div class="input-group">
                                    <input class="form-control mb-3" type="number" name="kuantiti_hapus" required>
                                </div>
                            </div>
                            <div class="col-3">
                                <label for="">Nilai Perolehan Hapus</label>
                                <div class="input-group">
                                    <input class="form-control mb-3" type="text" name="nilai_perolehan_hapus" required>
                                </div>
                            </div>
                            <div class="col-3">
                                <label for="">Nilai Semasa Hapus</label>
                                <div class="input-group">
                                    <input class="form-control mb-3" type="text" name="nilai_semasa_hapus" required>
                                </div>
                            </div>
                            <div class="col-3">
                                <label for="">Kes Surcaj</label>
                                <div class="input-group">
                                    <input class="form-control mb-3" type="text" name="kes_surcaj" required>
                                </div>
                            </div>
                            <div class="col-3">
                                <label for="">Nilai Surcaj</label>
                                <div class="input-group">
                                    <input class="form-control mb-3" type="text" name="nilai_surcaj" required>
                                </div>
                            </div>
                            <div class="col-3">
                                <label for="">Kes Tatatertib</label>
                                <div class="input-group">
                                    <input class="form-control mb-3" type="text" name="kes_tatatertib" required>
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
        $(".tahun").datepicker({
            format: "yyyy",
            viewMode: "years",
            minViewMode: "years",
            autoclose: true
        });
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
