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
                                <li class="breadcrumb-item"><a href="">kewps27</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid mt--6">
        <form method="POST" action="/kewps27">
            @csrf
            <div class="card mt-4">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <h2 class="mb-0">Sebut Harga Pelupusan</h2>
                        </div>
                    </div>
                </div>

                </br>
                <div class="card-body pt-0">
                    <div class="row">
                        <div class="col-6">
                            <label for="">Nama</label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="text" name="nama" value="">
                            </div>
                        </div>
                        <div class="col-6">
                            <label for="">IC No Syarikat</label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="text" name="ic_no_syarikat" value="">
                            </div>
                        </div>
                        <div class="col-6">
                            <label for="">Alamat</label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="text" name="alamat" value="">
                            </div>
                        </div>
                        <div class="col-6">
                            <label for="">Nama Penerima</label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="text" name="nama_penerima" value="">
                            </div>
                        </div>
                        <div class="col-6">
                            <label for="">Alamat Penerima</label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="text" name="alamat_penerima" value="">
                            </div>
                        </div>
                        <div class="col-6">
                            <label for="">Deposit</label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="text" name="deposit" value="">
                            </div>
                        </div>
                        <div class="col-6">
                            <label for="">No Bank</label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="text" name="no_bank" value="">
                            </div>
                        </div>
                        <div class="col-6">
                            <label for="">Nama Jabatan</label>
                            <div class="input-group">
                                <select name="nama_jabatan" class="form-control mb-3">
                                    <option selected>Pilih</option>
                                    @foreach ($jabatan as $j)
                                        <option value="{{ $j->nama_jabatan }}">{{ $j->singkatan }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <input type="hidden" name="staff_id" value="{{ Auth::user()->id }}">
                    </div>

                    <div class="row" id="info_kewps27">
                        <div class="col-12 mt-2 mb-2">
                            <h3 class="mt-4">Aset</h3>
                        </div>
                        <div class="col-3">
                            <label for="">Kenyataan Tawaran Sebut Harga</label>
                            <select class="form-control mb-3" name="kewps26_id[]">
                                <option selected>Pilih</option>
                                @foreach ($kewps26 as $k26)
                                    <option value="{{ $k26->id }}">{{ $k26->id }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-3">
                            <label for="">Kuantiti</label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="number" name="kuantiti[]" value="">
                            </div>
                        </div>
                        <div class="col-3">
                            <label for="">Harga Tawaran</label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="text" name="harga_tawaran[]" value="">
                            </div>
                        </div>
                        <div class="col-3">
                            <label for="">Deposit</label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="text" name="deposit2[]" value="">
                            </div>
                        </div>

                    </div>
                    <div class="mt-2">
                        <a class="btn btn-sm btn-primary text-white" onclick="tambahAsetK27()">Tambah Aset</a>
                    </div>
                    <button class="btn btn-primary mt-5" type="submit">Simpan</button>
                </div>
            </div>
        </form>
    </div>

    <script>
        function tambahAsetK27() {
            $("#info_kewps27").append(
                `      <div class="col-3">
                            <label for="">No Kod</label>
                            <select class="form-control mb-3" name="kewps26_id[]">
                                <option selected>Pilih</option>
                                @foreach ($kewps26 as $k26)
                                    <option value="{{ $k26->id }}">{{ $k26->id }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-3">
                            <label for="">Kuantiti</label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="number" name="kuantiti[]" value="">
                            </div>
                        </div>
                        <div class="col-3">
                            <label for="">Harga Tawaran</label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="text" name="harga_tawaran[]" value="">
                            </div>
                        </div>
                        <div class="col-3">
                            <label for="">Deposit</label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="text" name="deposit2[]" value="">
                            </div>
                        </div>
                `
            )
        }
    </script>
@endsection
