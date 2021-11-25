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
                                <li class="breadcrumb-item"><a href="">kewps7</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid mt--6">
        <form method="POST" action="/kewps7">
            @csrf
            <div class="card mt-4">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <h2 class="mb-0">Borang Permohonan Stok (Antara Stor)</h2>
                        </div>
                    </div>
                </div>

                </br>
                <div class="card-body pt-0">
                    <div class="row">
                        <div class="col-3 mt-3">
                            <label for="">Nama Stor Pemesan</label>
                            <div class="input-group">
                                <input class="form-control" type="text" name="nama_stor_pemesan" value="">
                            </div>
                        </div>
                        <div class="col-3 mt-3">
                            <label for="">Alamat Stor Pemesan</label>
                            <div class="input-group">
                                <input class="form-control" type="text" name="alamat_stor_pemesan" value="">
                            </div>
                        </div>
                        <div class="col-3 mt-3">
                            <label for="">Nama Stor Pengeluar</label>
                            <div class="input-group">
                                <input class="form-control" type="text" name="nama_stor_pengeluar" value="">
                            </div>
                        </div>
                        <div class="col-3 mt-3">
                            <label for="">Alamat Stor Pengeluar</label>
                            <div class="input-group">
                                <input class="form-control" type="text" name="alamat_stor_pengeluar" value="">
                            </div>
                        </div>

                        <input type="hidden" name="pemohon_id" value="{{ Auth::user()->id }}">
                        <input type="hidden" name="status" value="DERAF">
                        <input type="hidden" name="pelulus_id" value="{{ Auth::user()->id }}">
                        <input type="hidden" name="penerima_id" value="{{ Auth::user()->id }}">
                        <input type="hidden" name="pengeluar_id" value="{{ Auth::user()->id }}">
                    </div>

                    <div class="row" id="info_kewps7">
                        <div class="col-12 mt-2 mb-2">
                            <h3 class="mt-4">Aset</h3>
                        </div>
                        <div class="col-12 mt-3">
                            <label for="">No Kod</label>
                            <select class="form-control" name="kewps3a_id[]">
                                <option selected>Pilih</option>
                                @foreach ($kewps3a as $k3a)
                                    <option value="{{ $k3a->id }}">{{ $k3a->id }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-3 mt-3">
                            <label for="">Catatan Pemohon</label>
                            <div class="input-group">
                                <input class="form-control" type="text" name="catatan_pemohon[]" value="">
                            </div>
                        </div>
                        <div class="col-3 mt-3">
                            <label for="">Kuantiti Dimohon</label>
                            <div class="input-group">
                                <input class="form-control" type="number" name="kuantiti_dimohon[]" value="">
                            </div>
                        </div>
                        <div class="col-3 mt-3">
                            <label for="">Kuantiti Diluluskan</label>
                            <div class="input-group">
                                <input class="form-control" type="number" name="kuantiti_diluluskan[]" value="">
                            </div>
                        </div>
                        <div class="col-3 mt-3">
                            <label for="">Catatan Pelulus</label>
                            <div class="input-group">
                                <input class="form-control" type="text" name="catatan_pelulus[]" value="">
                            </div>
                        </div>
                        <div class="col-4 mt-3">
                            <label for="">Kuantiti Dikeluarkan</label>
                            <div class="input-group">
                                <input class="form-control" type="number" name="kuantiti_dikeluarkan[]" value="">
                            </div>
                        </div>
                        <div class="col-4 mt-3">
                            <label for="">Pembungkusan</label>
                            <select class="form-control" name="pembungkusan[]">
                                <option selected value="Tidak Perlu">Tidak Perlu</option>
                                <option value="Perlu">Perlu</option>
                            </select>
                        </div>
                        <div class="col-4 mt-3">
                            <label for="">Kuantiti Diterima</label>
                            <div class="input-group">
                                <input class="form-control" type="number" name="kuantiti_diterima[]" value="">
                            </div>
                        </div>
                    </div>
                    <div class="mt-2">
                        <a class="btn btn-sm btn-primary text-white" onclick="tambahAsetK7()">Tambah Aset</a>
                    </div>
                    <button class="btn btn-primary mt-5" type="submit">Simpan</button>
                </div>
            </div>
        </form>
    </div>

    <script>
        function tambahAsetK7() {
            $("#info_kewps7").append(
                `       
                        <div class="col-12 mt-3">
                            <label for="">No Kod</label>
                            <select class="form-control" name="kewps3a_id[]">
                                <option selected>Pilih</option>
                                @foreach ($kewps3a as $k3a)
                                    <option value="{{ $k3a->id }}">{{ $k3a->id }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-3 mt-3">
                            <label for="">Catatan Pemohon</label>
                            <div class="input-group">
                                <input class="form-control" type="text" name="catatan_pemohon[]" value="">
                            </div>
                        </div>
                        <div class="col-3 mt-3">
                            <label for="">Kuantiti Dimohon</label>
                            <div class="input-group">
                                <input class="form-control" type="number" name="kuantiti_dimohon[]" value="">
                            </div>
                        </div>
                        <div class="col-3 mt-3">
                            <label for="">Kuantiti Diluluskan</label>
                            <div class="input-group">
                                <input class="form-control" type="number" name="kuantiti_diluluskan[]" value="">
                            </div>
                        </div>
                        <div class="col-3 mt-3">
                            <label for="">Catatan Pelulus</label>
                            <div class="input-group">
                                <input class="form-control" type="text" name="catatan_pelulus[]" value="">
                            </div>
                        </div>
                        <div class="col-4 mt-3">
                            <label for="">Kuantiti Dikeluarkan</label>
                            <div class="input-group">
                                <input class="form-control" type="number" name="kuantiti_dikeluarkan[]" value="">
                            </div>
                        </div>
                        <div class="col-4 mt-3">
                            <label for="">Pembungkusan</label>
                            <select class="form-control" name="pembungkusan[]">
                                <option selected value="Tidak Perlu">Tidak Perlu</option>
                                <option value="Perlu">Perlu</option>
                            </select>
                        </div>
                        <div class="col-4 mt-3">
                            <label for="">Kuantiti Diterima</label>
                            <div class="input-group">
                                <input class="form-control" type="number" name="kuantiti_diterima[]" value="">
                            </div>
                        </div>
                `
            )
        }
    </script>
@endsection
