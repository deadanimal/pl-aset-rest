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
                                <li class="breadcrumb-item"><a href="">kewps23</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid mt--6">
        <form method="POST" action="/kewps23/{{ $kewps23->id }}">
            @method('put')
            @csrf
            <div class="card mt-4">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <h2 class="mb-0">Kenyataan Tawaran Tender Pelupusan</h2>
                        </div>
                    </div>
                </div>

                </br>
                <div class="card-body pt-0">
                    <div class="row">
                        <div class="col-6 mt-3">
                            <label for="">Tarikh Mula</label>
                            <div class="input-group">
                                <input class="form-control" type="date" name="tarikh_mula"
                                    value="{{ $kewps23->tarikh_mula }}">
                            </div>
                        </div>
                        <div class="col-6 mt-3">
                            <label for="">Tarikh Tamat</label>
                            <div class="input-group">
                                <input class="form-control" type="date" name="tarikh_tamat"
                                    value="{{ $kewps23->tarikh_tamat }}">
                            </div>
                        </div>
                        <div class="col-4 mt-3">
                            <label for="">Masa Mula</label>
                            <div class="input-group">
                                <input class="form-control" type="time" name="masa_mula"
                                    value="{{ $kewps23->masa_mula }}">
                            </div>
                        </div>
                        <div class="col-4 mt-3">
                            <label for="">Masa Tamat</label>
                            <div class="input-group">
                                <input class="form-control" type="time" name="masa_tamat"
                                    value="{{ $kewps23->masa_tamat }}">
                            </div>
                        </div>
                        <div class="col-4 mt-3">
                            <label for="">Tempat</label>
                            <div class="input-group">
                                <input class="form-control" type="text" name="tempat" value="{{ $kewps23->tempat }}">
                            </div>
                        </div>
                        <div class="col-4 mt-3">
                            <label for="">Tarikh Tutup</label>
                            <div class="input-group">
                                <input class="form-control" type="date" name="tarikh_tutup"
                                    value="{{ $kewps23->tarikh_tutup }}">
                            </div>
                        </div>
                        <div class="col-4 mt-3">
                            <label for="">Alamat</label>
                            <div class="input-group">
                                <input class="form-control" type="text" name="alamat" value="{{ $kewps23->alamat }}">
                            </div>
                        </div>
                        <div class="col-4 mt-3">
                            <label for="">Kementerian</label>
                            <div class="input-group">
                                <input class="form-control" type="text" name="kementerian"
                                    value="{{ $kewps23->kementerian }}">
                            </div>
                        </div>
                        <input type="hidden" name="staff_id" value="{{ Auth::user()->id }}">
                    </div>
                    <div class="row">
                        @foreach ($kewps23->infokewps23 as $k23)
                            <div class="col-12 mt-2 mb-2">
                                <h3 class="mt-4">Aset {{ $loop->iteration }}</h3>
                            </div>
                            <input type="hidden" name="info23_id[]" value="{{ $k23->id }}">
                            <div class="col-4">
                                <label for="">No Kod</label>
                                <select class="form-control mb-3" name="kewps3a_id[]">
                                    <option selected value="{{ $k23->kewps3a_id }}">{{ $k23->kewps3a->nama_stor }}
                                        -
                                        {{ $k23->kewps3a->perihal_stok }}
                                    </option>
                                    @foreach ($kewps3a as $k3)
                                        @if ($k3->id != $k23->kewps3a_id)
                                            <option value="{{ $k3->id }}">{{ $k3->nama_stor }} -
                                                {{ $k3->perihal_stok }}
                                            </option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-4">
                                <label for="">Kuantiti</label>
                                <div class="input-group">
                                    <input class="form-control mb-3" type="number" name="kuantiti[]"
                                        value="{{ $k23->kuantiti }}">
                                </div>
                            </div>
                            <div class="col-4">
                                <label for="">Keadaan Stok</label>
                                <div class="input-group">
                                    <input class="form-control mb-3" type="text" name="harga_simpanan[]"
                                        value="{{ $k23->harga_simpanan }}">
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
