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
                                <li class="breadcrumb-item"><a href="">kewps17</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid mt--6">
        <form method="POST" action="/kewps17">
            @csrf
            <div class="card mt-4">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <h2 class="mb-0">Pindahan Stok</h2>
                        </div>
                    </div>
                </div>

                </br>
                <div class="card-body pt-0">
                    <div class="row">
                        <div class="col-12 mt-3">
                            <label for="">Status Pindahan</label>
                            <div class="input-group">
                                <input class="form-control" type="text" name="status_pindahan" value="">
                            </div>
                        </div>
                        <input type="hidden" name="pemohon_id" value="{{ Auth::user()->id }}">
                        <input type="hidden" name="pelulus_id" value="{{ Auth::user()->id }}">
                        <input type="hidden" name="penyerah_id" value="{{ Auth::user()->id }}">
                        <input type="hidden" name="penerima_id" value="{{ Auth::user()->id }}">
                    </div>
                    <div class="row" id="info_kewps17">
                        <div class="col-12 mt-2 mb-2">
                            <h3 class="mt-4">Aset</h3>
                        </div>
                        <div class="col-3">
                            <label for="">No Kod</label>
                            <select class="form-control mb-3" name="kewps3a_id[]">
                                <option selected disabled hidden>Pilih</option>
                                @foreach ($kewps3a as $k3)
                                    <option value="{{ $k3->id }}">{{ $k3->no_kad }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-3">
                            <label for="">Kuantiti Dimohon</label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="number" name="kuantiti_dimohon[]" value="">
                            </div>
                        </div>
                        <div class="col-3">
                            <label for="">Kuantiti Dilulus</label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="number" name="kuantiti_dilulus[]" value="">
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
                        <a class="btn btn-sm btn-primary text-white" onclick="tambahAsetK17()">Tambah Aset</a>
                    </div>
                    <button class="btn btn-primary mt-5" type="submit">Simpan</button>
                </div>
            </div>
        </form>
    </div>

    <script>
        function tambahAsetK17() {
            $("#info_kewps17").append(
                `       <div class="col-3">
                            <label for="">No Kod</label>
                            <select class="form-control mb-3" name="kewps3a_id[]">
                                <option disabled hidden selected>Pilih</option>
                                @foreach ($kewps3a as $k3)
                                    <option value="{{ $k3->id }}">{{ $k3->no_kad }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-3">
                            <label for="">Kuantiti Dimohon</label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="number" name="kuantiti_dimohon[]" value="">
                            </div>
                        </div>
                        <div class="col-3">
                            <label for="">Kuantiti Dilulus</label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="number" name="kuantiti_dilulus[]" value="">
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
