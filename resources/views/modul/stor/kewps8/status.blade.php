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
                                <li class="breadcrumb-item"><a href="">kewps8</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid mt--6">
        <form method="POST" action="{{ route('kewps8.update', $kewps8->id) }} ">
            @method('put')
            @csrf
            <div class="card mt-4">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <h2 class="mb-0">Permohonan Stok (Individu Kepada Stor)</h2>
                        </div>
                    </div>
                </div>

                </br>
                <div class="card-body pt-0">
                    <div class="row">
                        @if ($kewps8->status == 'DIPOHON')

                            <input class="form-control mb-3" type="hidden" name="pelulus_id"
                                value="{{ Auth::user()->id }}">
                            <input class="form-control mb-3" type="hidden" name="status" value="DILULUS">

                            <div class="col-3">
                                <label for="">No Kad</label>
                                <input type="text" class="form-control mb-3" value="{{ $kewps8->kewps3a->no_kad }}"
                                    readonly>
                            </div>

                            <div class="col-3">
                                <label for="">Perihal Stok</label>
                                <input type="text" class="form-control mb-3" value="{{ $kewps8->kewps3a->perihal_stok }}"
                                    readonly>
                            </div>

                            <div class="col-3">
                                <label for="">Kuantiti Dimohon</label>
                                <input type="text" class="form-control mb-3" value="{{ $kewps8->kuantiti_dimohon }}"
                                    readonly>
                            </div>

                            <div class="col-3">
                                <label for="">Catatan</label>
                                <input type="text" class="form-control mb-3" value="{{ $kewps8->catatan_pemohon }}"
                                    readonly>
                            </div>

                            <div class="col-6">
                                <label for="">Kuantiti Diluluskan</label>
                                <input class="form-control mb-3" type="number" name="kuantiti_diluluskan" value="">
                            </div>
                            <div class="col-6">
                                <label for="">Catatan Pelulus</label>
                                <input class="form-control mb-3" type="text" name="catatan_pelulus" value="">
                            </div>

                        @elseif($kewps8->status == 'DILULUS')
                            <input class="form-control mb-3" type="hidden" name="penerima_id"
                                value="{{ Auth::user()->id }}">
                            <input class="form-control mb-3" type="hidden" name="status" value="DITERIMA">
                            <div class="col-3">
                                <label for="">No Kad</label>
                                <input type="text" class="form-control mb-3" value="{{ $kewps8->kewps3a->no_kad }}"
                                    readonly>
                            </div>

                            <div class="col-3">
                                <label for="">Perihal Stok</label>
                                <input type="text" class="form-control mb-3" value="{{ $kewps8->kewps3a->perihal_stok }}"
                                    readonly>
                            </div>

                            <div class="col-3">
                                <label for="">Kuantiti Dimohon</label>
                                <input type="text" class="form-control mb-3" value="{{ $kewps8->kuantiti_dimohon }}"
                                    readonly>
                            </div>

                            <div class="col-3">
                                <label for="">Catatan</label>
                                <input type="text" class="form-control mb-3" value="{{ $kewps8->catatan_pemohon }}"
                                    readonly>
                            </div>

                            <div class="col-3">
                                <label for="">Kuantiti Diluluskan</label>
                                <input class="form-control mb-3" type="number" name="kuantiti_diluluskan"
                                    value="{{ $kewps8->kuantiti_diluluskan }}" readonly>
                            </div>
                            <div class="col-3">
                                <label for="">Catatan Pelulus</label>
                                <input class="form-control mb-3" type="text" name="catatan_pelulus"
                                    value="{{ $kewps8->catatan_pelulus }}" readonly>
                            </div>

                            <div class="col-3">
                                <label for="">Kuantiti Diterima</label>
                                <input class="form-control mb-3" type="number" name="kuantiti_diterima" value="">
                            </div>

                            <div class="col-3">
                                <label for="">Catatan Penerima</label>
                                <input class="form-control mb-3" type="text" name="catatan_penerima" value="">
                            </div>
                        @endif
                        <div class="col-12">
                            <button class="btn btn-primary" type="submit">Simpan</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
