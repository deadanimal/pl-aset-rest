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
                                <li class="breadcrumb-item"><a href="">kewps9</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid mt--6">
        <form method="POST" action="/kewps9/{{ $kewps9->id }}">
            @method('put')
            @csrf
            <div class="card mt-4">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <h2 class="mb-0">Pembungkusan Stok</h2>
                        </div>
                    </div>
                </div>

                </br>
                <div class="card-body pt-0">
                    <div class="row">
                        <div class="col-12">
                            <label for="">No Permohonan</label>
                            <select class="form-control mb-3" name="kewps7_id">
                                <option selected value="{{ $kewps9->infokewps7_id }}">{{ $kewps9->infokewps7_id }}
                                </option>
                                @foreach ($infokewps7 as $k7)
                                    @if ($k7->id != $kewps9->infokewps7_id)
                                        <option value="{{ $k7->id }}">{{ $k7->id }}
                                        </option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="col-12">
                            <label for="">Kuantiti Dibungkus</label>
                            <input class="form-control mb-3" type="number" name="kuantiti_dibungkus"
                                value="{{ $kewps9->kuantiti_dibungkus }}">
                        </div>
                        <div class="col-12">
                            <label for="">Maklumat Pembungkusan</label>
                            <input class="form-control mb-3" type="text" name="maklumat_bungkusan"
                                value="{{ $kewps9->maklumat_bungkusan }}">
                        </div>
                        <div class="col-12">
                            <label for="">Maklumat Penghantaran</label>
                            <input class="form-control mb-3" type="text" name="maklumat_penghantaran"
                                value="{{ $kewps9->maklumat_penghantaran }}">
                        </div>
                        <div class="col-12">
                            <label for="">Pemeriksa ID</label>
                            <input class="form-control mb-3" type="text" name="pemeriksa_id"
                                value="{{ $kewps9->pemeriksa_id }}">
                        </div>
                        <div class="col-12">
                            <label for="">Pembungkus ID</label>
                            <input class="form-control mb-3" type="text" name="pembungkus_id"
                                value="{{ $kewps9->pembungkus_id }}">
                        </div>
                        <div class="col-12">
                            <label for="">Penerima ID</label>
                            <input class="form-control mb-3" type="text" name="penerima_id"
                                value="{{ $kewps9->penerima_id }}">
                        </div>
                        <div class="col-12">
                            <button class="btn btn-primary" type="submit">Simpan</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
