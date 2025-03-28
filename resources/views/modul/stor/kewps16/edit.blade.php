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
        <form method="POST" action="/kewps16/{{ $kewps16->id }}">
            @method('put')
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
                        <div class="col-12 mt-3">
                            <label for="">Kementerian</label>
                            <div class="input-group">
                                <input class="form-control" type="text" name="agensi" value="Perbadanan Labuan" readonly>
                            </div>
                        </div>
                        <div class="col-12 mt-3">
                            <label for="">Bahagian</label>
                            <div class="input-group">
                                <input class="form-control" type="text" name="bahagian" value="A" readonly>
                            </div>
                        </div>

                        <div class="col-12 mt-3">
                            <label for="">Ulasan</label>
                            <div class="input-group">
                                <input class="form-control" type="text" name="ulasan" value="{{ $kewps16->ulasan }}">
                            </div>
                        </div>
                        <div class="col-12 mt-3">
                            <label for="">Tindakan</label>
                            <div class="input-group">
                                <input class="form-control" type="text" name="tindakan"
                                    value="{{ $kewps16->tindakan }}">
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        @foreach ($kewps16->infokewps16 as $ik16)
                            <div class="col-12 mt-2">
                                <h3 class="mt-4">Aset {{ $loop->iteration }}</h3>
                            </div>
                            <input type="hidden" name="info16_id[]" value="{{ $ik16->id }}">
                            <div class="col-3">
                                <label for="">No Kod</label>
                                <select class="form-control mb-3" name="kewps3a_id[]">
                                    <option selected value="{{ $ik16->kewps3a_id }}">
                                        {{ $ik16->kewps3a_id }} -
                                        {{ $ik16->kewps3a->perihal_stok }}
                                    </option>
                                    @foreach ($kewps3a as $k3)
                                        @if ($ckewps3a->id != $k3->id)
                                            <option value="{{ $k3->id }}">{{ $k3->no_kad }}
                                            </option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-3">
                                <label for="">Kuantiti Fizikal Diserahkan</label>
                                <div class="input-group">
                                    <input class="form-control mb-3" type="number" name="kuantiti_fizikal_diserahkan[]"
                                        value="{{ $ik16->kuantiti_fizikal_diserahkan }}">
                                </div>
                            </div>
                            <div class="col-3">
                                <label for="">Kuantiti Fizikal Diambil</label>
                                <div class="input-group">
                                    <input class="form-control mb-3" type="number" name="kuantiti_fizikal_diambil[]"
                                        value="{{ $ik16->kuantiti_fizikal_diambil }}">
                                </div>
                            </div>
                            <div class="col-3">
                                <label for="">Catatan</label>
                                <div class="input-group">
                                    <input class="form-control mb-3" type="text" name="catatan[]"
                                        value="{{ $ik16->catatan }}">
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <button class="btn btn-primary mt-5" type="submit">Simpan</button>
                </div>
            </div>
        </form>
    </div>


@endsection
