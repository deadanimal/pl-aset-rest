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
                                <li class="breadcrumb-item"><a href="">kewps21</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid mt--6">
        <form method="POST" action="/kewps21">
            @csrf
            <div class="card mt-4">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <h2 class="mb-0">Sijil Penyaksian Pemusnahan</h2>
                        </div>
                    </div>
                </div>

                </br>
                <div class="card-body pt-0">
                    <div class="row">
                        <div class="col-6 mt-3">
                            <label for="">Agensi</label>
                            <input type="text" value="Jabatan Perbadanan Labuan" name="kementerian" class="form-control"
                                readonly>
                        </div>
                        <div class="col-6 mt-3">
                            <label for="">Perihal Stok</label>
                            <select name="perihal" class="form-control">
                                <option disabled hidden selected>Pilih</option>
                                <option value="Alat Ganti">Alat Ganti</option>
                                <option value="Bekalan Am">Bekalan Am</option>
                            </select>
                        </div>
                        <div class="col-6 mt-3">
                            <label for="">Tarikh</label>
                            <div class="input-group">
                                <input class="form-control" type="date" name="tarikh" value="">
                            </div>
                        </div>
                        <div class="col-6 mt-3">
                            <label for="">Tempat</label>
                            <div class="input-group">
                                <input class="form-control" type="text" name="tempat" value="">
                            </div>
                        </div>
                    </div>

                    <div class="row mt-5" id="info">
                        @foreach ($kewps20 as $k20)
                            <div class="col-12 mt-4">
                                <h4>Aset {{ $loop->iteration }}</h4>
                            </div>
                            <div class="col-6">
                                <label for="">Kuantiti</label>
                                <input type="text" name="kuantiti[]" class="form-control" value="{{ $k20->kuantiti }}">
                            </div>
                            <div class="col-6">
                                <label for="">Secara</label>
                                <input type="text" name="secara[]" class="form-control" value="{{ $k20->cara }}">
                            </div>
                        @endforeach
                    </div>

                    <input type="hidden" name="pegawai_saksi1" value="{{ Auth::user()->id }}">
                    <input type="hidden" name="pegawai_saksi2" value="{{ Auth::user()->id }}">
                    <div class="row">
                        <div class="col-12 mt-3">
                            <button type="button" class="btn btn-sm btn-primary" onclick="tambah()">Tambah</button>
                        </div>
                        <div class="col-12 mt-3">
                            <button class="btn btn-primary mt-5" type="submit">Simpan</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <script>
        function tambah() {
            $("#info").append(`
                            <div class="col-12 mt-4">
                                <h4>Aset New</h4>
                            </div>
                            <div class="col-6">
                                <label for="">Kuantiti</label>
                                <input type="text" name="kuantiti[]" class="form-control" value="">
                            </div>
                            <div class="col-6">
                                <label for="">Secara</label>
                                <input type="text" name="secara[]" class="form-control" value="">
                            </div>
            `);
        }
    </script>
@endsection
