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
                                <li class="breadcrumb-item"><a href="">kewps25</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid mt--6">
        <form method="POST" action="/kewps25">
            @csrf
            <div class="card mt-4">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <h2 class="mb-0">Jadual Tender Pelupusan</h2>
                        </div>
                    </div>
                </div>

                </br>
                <div class="card-body pt-0">
                    <div class="row">
                        <div class="col-4">
                            <label for="">Pengerusi</label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="text" name="nama" value="{{ Auth::user()->name }}"
                                    readonly>
                            </div>
                        </div>
                        <input type="hidden" name="pengerusi_id" value="{{ Auth::user()->id }}">
                        <input type="hidden" name="ahli1_id" value="{{ Auth::user()->id }}">
                        <input type="hidden" name="ahli2_id" value="{{ Auth::user()->id }}">
                    </div>
                    <div class="row" id="info_kewps25">
                        <div class="col-12 mt-2 mb-2">
                            <h3 class="mt-4">Aset</h3>
                        </div>
                        <div class="col-4">
                            <label for="">Kenyataan Tawaran Tender Pelupusan ID</label>
                            <select class="form-control mb-3" name="kewps23_id[]">
                                <option selected>Pilih</option>
                                @foreach ($kewps23 as $k23)
                                    <option value="{{ $k23->id }}">{{ $k23->id }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-4">
                            <label for="">Kod Petender</label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="number" name="kod_petender[]" value="">
                            </div>
                        </div>
                        <div class="col-4">
                            <label for="">Harga</label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="number" name="harga[]" value="">
                            </div>
                        </div>

                    </div>
                    <div class="mt-2">
                        <a class="btn btn-sm btn-primary text-white" onclick="tambahAsetK25()">Tambah Aset</a>
                    </div>
                    <button class="btn btn-primary mt-5" type="submit">Simpan</button>
                </div>
            </div>
        </form>
    </div>

    <script>
        function tambahAsetK25() {
            $("#info_kewps25").append(
                `       <div class="col-4">
                            <label for="">Kenyataan Tawaran Tender Pelupusan ID</label>
                            <select class="form-control mb-3" name="kewps23_id[]">
                                <option selected>Pilih</option>
                                @foreach ($kewps23 as $k23)
                                    <option value="{{ $k23->id }}">{{ $k23->id }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-4">
                            <label for="">Kuantiti</label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="number" name="kod_petender[]" value="">
                            </div>
                        </div>
                        <div class="col-4">
                            <label for="">Harga Tawaran</label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="number" name="harga[]" value="">
                            </div>
                        </div>
                `
            )
        }
    </script>
@endsection
