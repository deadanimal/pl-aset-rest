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
        <form method="POST" action="/kewps7/{{ $kewps7->id }}">
            @method('put')
            @csrf
            <div class="card mt-4">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <h2 class="mb-0">Permohonan Stok</h2>
                        </div>
                    </div>
                </div>

                </br>
                <div class="card-body pt-0">
                    <div class="row">
                        <input class="form-control form-control-sm" type="hidden" name="status" value="DIREKOD">
                        <input class="form-control form-control-sm" type="hidden" name="pengeluar_id"
                            value="{{ Auth::user()->id }}">

                        <div class="col-3">
                            <label for="">Kuantiti Dikeluarkan</label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="number" name="kuantiti_dikeluarkan" value="">
                            </div>
                        </div>
                        <div class="col-3">
                            <label for="">Nama Stor Pengeluar</label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="text" name="nama_stor_pengeluar" value="">
                            </div>
                        </div>
                        <div class="col-3">
                            <label for="">Alamat Stor Pengeluar</label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="text" name="alamat_stor_pengeluar" value="">
                            </div>
                        </div>
                        <div class="col-3">
                            <label for="">Pembungkusan</label>
                            <select class="form-control mb-3" name="pembungkusan" id="k7_pembungkusan">
                                <option selected value="Tidak Perlu">Tidak Perlu</option>
                                <option value="Perlu">Perlu</option>
                            </select>
                        </div>
                        <div class="col-3 d-none" id="k7_divk9">
                            <label for="">No Borang Pembungkusan Stok</label>
                            <select class="form-control mb-3" name="kewps9_id">
                                <option selected>Pilih</option>
                                @foreach ($kewps9 as $k9)
                                    <option value="{{ $k9->id }}">{{ $k9->id }} -
                                        {{ $k9->maklumat_bungkusan }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-12">
                            <button class="btn btn-primary" type="submit">Simpan</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <script>
        $(document).ready(function() {

            $('#k7_pembungkusan').change(function() {
                if (this.value == "Perlu") {
                    $('#k7_divk9').removeClass('d-none');
                } else {
                    $('#k7_divk9').addClass('d-none');
                }
            });
        });
    </script>
@endsection
