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
                                <li class="breadcrumb-item"><a href="">kewps20</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid mt--6">
        <form method="POST" action="/kewps20">
            @csrf
            <div class="card mt-4">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <h2 class="mb-0">Pelupusan Stok</h2>
                        </div>
                    </div>
                </div>

                </br>
                <div class="card-body pt-0">
                    <div class="row">
                        <div class="col-6 mt-3">
                            <label for="">Agensi</label>
                            <div class="input-group">
                                <input class="form-control" type="text" name="kementerian" value="Perbadanan Labuan"
                                    readonly>
                            </div>
                        </div>
                        <div class="col-6 mt-3">
                            <label for="">Kategori Stor</label>
                            <select class="form-control" name="kategori_stor">
                                <option selected disabled hidden>Pilih</option>
                                <option value="Stor Alat Ganti">Stor Alat Ganti</option>
                                <option value="Stor Bekalan Pejabat">Stor Bekalan Pejabat</option>
                            </select>

                        </div>

                        <input type="hidden" name="kuasa_melulus" value="{{ Auth::user()->id }}">
                        <input type="hidden" name="nama_pemeriksa1" value="{{ Auth::user()->id }}">
                        <input type="hidden" name="nama_pemeriksa2" value="{{ Auth::user()->id }}">

                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <h3 class="mt-4">Info Kewps20</h3>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row" id="info_kewps20">
                        <div class="col-12 mb-2">
                            <h3 class="mt-4">Aset</h3>
                        </div>
                        <div class="col-4">
                            <label for="">No Kod</label>
                            <select class="form-control mb-3" name="kewps3a_id[]">
                                <option selected disabled hidden>Pilih</option>
                                @foreach ($kewps3a as $k3)
                                    <option value="{{ $k3->id }}">{{ $k3->no_kad }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-4">
                            <label for="">Kuantiti</label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="number" name="kuantiti[]" value="">
                            </div>
                        </div>
                        <div class="col-4">
                            <label for="">Keadaan Stok</label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="text" name="keadaan_stok[]" value="">
                            </div>
                        </div>
                        <div class="col-4">
                            <label for="">Kaedah Pelupusan</label>
                            <select class="form-control mb-3" name="kaedah_pelupusan[]">
                                <option selected disabled hidden>Pilih</option>
                                @foreach ($kaedah as $k)
                                    <option value="{{ $k->value }}">{{ $k->text }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-4">
                            <label for="">Justifikasi</label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="text" name="justifikasi[]" value="">
                            </div>
                        </div>
                        <div class="col-4">
                            <label for="">Keputusan</label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="text" name="keputusan[]" value="">
                            </div>
                        </div>
                    </div>
                    <div class="mt-2">
                        <a class="btn btn-sm btn-primary text-white" onclick="tambahAsetK20()">Tambah Aset</a>
                    </div>
                    <button class="btn btn-primary mt-5" type="submit">Simpan</button>

                </div>
        </form>
    </div>

    <script>
        function tambahAsetK20() {
            $("#info_kewps20").append(
                `       <div class="col-12 mb-2">
                            <h3 class="mt-4">Aset</h3>
                        </div>
                        <div class="col-4">
                            <label for="">No Kod</label>
                            <select class="form-control mb-3" name="kewps3a_id[]">
                                <option selected>Pilih</option>
                                @foreach ($kewps3a as $k3)
                                    <option value="{{ $k3->id }}">{{ $k3->no_kad }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-4">
                            <label for="">Kuantiti</label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="number" name="kuantiti[]" value="">
                            </div>
                        </div>
                        <div class="col-4">
                            <label for="">Keadaan Stok</label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="text" name="keadaan_stok[]" value="">
                            </div>
                        </div>
                        <div class="col-4">
                            <label for="">Kaedah Pelupusan</label>
                           <select class="form-control mb-3" name="kaedah_pelupusan[]">
                                <option selected>Pilih</option>
                                @foreach ($kaedah as $k)
                                    <option value="{{ $k->value }}">{{ $k->text }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-4">
                            <label for="">Justifikasi</label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="text" name="justifikasi[]" value="">
                            </div>
                        </div>
                        <div class="col-4">
                            <label for="">Keputusan</label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="text" name="keputusan[]" value="">
                            </div>
                        </div>
                `
            )
        }
    </script>
@endsection
