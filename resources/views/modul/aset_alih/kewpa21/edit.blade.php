@extends('layouts.base_pa') @section('content')
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-white d-inline-block mb-0">Perbadanan Labuan</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="/kewpa21">Kewpa21</a></li>
                                <li class="breadcrumb-item"><a href="/kewpa21/{{ $kewpa21->id }}">Info Kewpa21</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid mt--6">
        <div id="show">
            <form id="create_form" method="POST" action="/kewpa21/{{ $kewpa21->id }}">
                @csrf
                @method('PUT')
                <div class="card mt-4" id="basic-info">
                    <div class="card-header">
                        <div class="row">
                            <div class="col">
                                <h2 class="mb-0">Borang Pelupusan Aset Alih</h2>
                            </div>
                        </div>
                    </div>

                    </br>
                    <div class="card-body pt-0">
                        <div class="row">
                            <div class="col-12">
                                <label for="">Kuasa Melulus</label>
                                <input class="form-control mb-3" type="text" name="kuasa_melulus"
                                    value="{{ $kewpa21->kuasa_melulus }}" required>
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
                            <h2 class="mb-0">Info Kewpa21</h2>
                        </div>
                        <div class="text-end mr-2">
                            <button class="align-self-end btn btn-sm btn-primary" id="tambah">Tambah</button>
                        </div>
                    </div>
                </div>

                @foreach ($kewpa21->infokewpa21 as $ik21)
                    <div class=" row mt-4 mx-2">
                        <input type="hidden" name="info_k21" value="{{ $ik21->id }}">
                        <div class="col-12">
                            <h3 class="d-inline mr-3">Info {{ $loop->iteration }}</h3>
                            <form action="/info_kewpa21/{{ $ik21->id }}" method="POST" class="d-inline">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-danger btn-sm rounded-3" type="submit"><span
                                        class="fas fa-trash-alt"></span></button>
                            </form>

                        </div>

                    </div>

                    <form action="/info_kewpa21/{{ $ik21->id }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="row mx-2 my-3">

                            <div class="col-4">
                                <label for="">No Siri Pendaftaran</label>
                                <div class="input-group">
                                    <select name="no_siri_pendaftaran" class="form-control mb-3" required>
                                        @foreach ($kewpa3a as $k3a)
                                            <option {{ $k3a->id == $ik21->no_siri_pendaftaran ? 'selected' : '' }}
                                                value="{{ $k3a->no_siri_pendaftaran }}">{{ $k3a->no_siri_pendaftaran }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-4">
                                <label for="">Keadaan Aset</label>
                                <div class="input-group">
                                    <input class="form-control mb-3" type="text" name="keadaan_aset"
                                        value="{{ $ik21->keadaan_aset }}" required>
                                </div>
                            </div>
                            <div class="col-4">
                                <label for="">Kaedah Pelupusan</label>
                                <select name="kaedah_pelupusan" class="form-control mb-3" required>
                                    @foreach ($kaedah_pelupusan as $kp)
                                        <option {{ $kp->value == $ik21->kaedah_pelupusan ? 'selected' : '' }}
                                            value="{{ $kp->value }}">{{ $kp->text }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-4">
                                <label for="">Justifikasi</label>
                                <div class="input-group">
                                    <input class="form-control mb-3" type="text" name="justifikasi"
                                        value="{{ $ik21->justifikasi }}" required>
                                </div>
                            </div>
                            <div class="col-4">
                                <label for="">Keputusan Melulus</label>
                                <div class="input-group">
                                    <input class="form-control mb-3" type="text" name="keputusan_melulus"
                                        value="{{ $ik21->keputusan_melulus }}" required>
                                </div>
                            </div>
                            <div class="col-4">
                                <label for="">Catatan</label>
                                <div class="input-group">
                                    <input class="form-control mb-3" type="text" name="catatan"
                                        value="{{ $ik21->catatan }}" required>
                                </div>
                            </div>
                            <div class="col-12 text-center">
                                <button class="btn btn-sm btn-primary d-inline" type="submit"> <span
                                        class="fas fa-arrow-up"></span>Kemas Kini</button>
                            </div>
                        </div>
                    </form>
                @endforeach
            </div>
        </div>

        <div id="create" style="display: none;">
            <form method="POST" action="/info_kewpa21">
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
                            <input type="hidden" name="kewpa21_id" value="{{ $kewpa21->id }}">
                            <div class="col-4">
                                <label for="">No Siri Pendaftaran</label>
                                <div class="input-group">
                                    <select name="no_siri_pendaftaran" class="form-control mb-3" required>
                                        <option selected>Pilih</option>
                                        @foreach ($kewpa3a as $k3a)
                                            <option value="{{ $k3a->no_siri_pendaftaran }}">{{ $k3a->no_siri_pendaftaran }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-4">
                                <label for="">Keadaan Aset</label>
                                <div class="input-group">
                                    <input class="form-control mb-3" type="text" name="keadaan_aset" required>
                                </div>
                            </div>
                            <div class="col-4">
                                <label for="">Kaedah Pelupusan</label>
                                <select name="kaedah_pelupusan" class="form-control mb-3" required>
                                    <option selected>Pilih</option>
                                    @foreach ($kaedah_pelupusan as $kp)
                                        <option value="{{ $kp->value }}">{{ $kp->text }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-4">
                                <label for="">Justifikasi</label>
                                <div class="input-group">
                                    <input class="form-control mb-3" type="text" name="justifikasi" value="" required>
                                </div>
                            </div>
                            <div class="col-4">
                                <label for="">Keputusan Melulus</label>
                                <div class="input-group">
                                    <input class="form-control mb-3" type="text" name="keputusan_melulus" value="" required>
                                </div>
                            </div>
                            <div class="col-4">
                                <label for="">Catatan</label>
                                <div class="input-group">
                                    <input class="form-control mb-3" type="text" name="catatan" value="" required>
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
