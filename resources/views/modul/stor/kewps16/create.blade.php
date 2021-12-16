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
                                <li class="breadcrumb-item"><a href="">kewps16</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid mt--6">
        <form method="POST" action="/kewps16">
            @csrf
            <div class="card mt-4">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <h2 class="mb-0">Perakuan Ambil Alih</h2>
                        </div>
                    </div>
                </div>

                </br>
                <div class="card-body pt-0">
                    <div class="row">
                        <div class="col-6 mt-3">
                            <label for="">Kementerian</label>
                            <input class="form-control" type="text" name="agensi" value="Perbadanan Aset Labuan">
                        </div>
                        <div class="col-6 mt-3">
                            <label for="">Bahagian</label>
                            <select name="bahagian" class="form-control">
                                <option selected>Pilih</option>
                                @foreach ($bahagian as $b)
                                    <option value="{{ $b->nama_jabatan }}">{{ $b->singkatan }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-6 mt-3">
                            <label for="">Ulasan</label>
                            <div class="input-group">
                                <input class="form-control" type="text" name="ulasan" value="">
                            </div>
                        </div>
                        <div class="col-6 mt-3">
                            <label for="">Tindakan</label>
                            <div class="input-group">
                                <input class="form-control" type="text" name="tindakan" value="">
                            </div>
                        </div>
                        <input type="hidden" name="pegawai_menyerah" value="{{ Auth::user()->id }}">
                        <input type="hidden" name="pegawai_mengambil" value="{{ Auth::user()->id }}">
                        <input type="hidden" name="pegawai_mengesahkan" value="{{ Auth::user()->id }}">
                    </div>
                    <div class="row" id="info_kewps16">
                        <div class="col-12 mt-2 mb-2">
                            <h3 class="mt-4">Aset</h3>
                        </div>
                        <div class="col-3">
                            <label for="">No Kod</label>
                            <select class="form-control mb-3" name="kewps3a_id[]">
                                <option selected>Pilih</option>
                                @foreach ($kewps3a as $k3)
                                    <option value="{{ $k3->id }}">{{ $k3->no_kad }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-3">
                            <label for="">Kuantiti Fizikal Diserahkan</label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="number" name="kuantiti_fizikal_diserahkan[]"
                                    value="">
                            </div>
                        </div>
                        <div class="col-3">
                            <label for="">Kuantiti Fizikal Diambil</label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="number" name="kuantiti_fizikal_diambil[]" value="">
                            </div>
                        </div>
                        <div class="col-3">
                            <label for="">Catatan</label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="text" name="catatan[]" value="">
                            </div>
                        </div>
                    </div>
                    <div class="mt-2">
                        <a class="btn btn-sm btn-primary text-white" onclick="tambahAsetK16()">Tambah Aset</a>
                    </div>
                    <button class="btn btn-primary mt-5" type="submit">Simpan</button>
                </div>
            </div>
        </form>
    </div>

    <script>
        function tambahAsetK16() {
            $("#info_kewps16").append(
                `       <div class="col-3">
                            <label for="">No Kod</label>
                            <select class="form-control mb-3" name="kewps3a_id[]">
                                <option selected>Pilih</option>
                                @foreach ($kewps3a as $k3)
                                    <option value="{{ $k3->id }}">{{ $k3->no_kad }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-3">
                            <label for="">Kuantiti Fizikal Diserahkan</label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="number" name="kuantiti_fizikal_diserahkan[]"
                                    value="">
                            </div>
                        </div>
                        <div class="col-3">
                            <label for="">Kuantiti Fizikal Diambil</label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="number" name="kuantiti_fizikal_diambil[]" value="">
                            </div>
                        </div>
                        <div class="col-3">
                            <label for="">Catatan</label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="text" name="catatan[]" value="">
                            </div>
                        </div>
                `
            )
        }
    </script>
@endsection
