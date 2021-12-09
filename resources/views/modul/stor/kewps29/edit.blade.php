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
                                <li class="breadcrumb-item"><a href="">kewps29</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid mt--6">
        <form method="POST" action="/kewps29/{{ $kewps29->id }}">
            @method('put')
            @csrf
            <div class="card mt-4">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <h2 class="mb-0">Kenyataan Jual Lelong</h2>
                        </div>
                    </div>
                </div>

                </br>
                <div class="card-body pt-0">
                    <div class="row">
                        <div class="col-12 mt-3">
                            <label for="">Agensi</label>
                            <div class="input-group">
                                <input class="form-control" type="text" name="agensi" value="{{ $kewps29->agensi }}"
                                    readonly>
                            </div>
                        </div>
                        <div class=" col-4 mt-3">
                            <label for="">Pelupusan Stok</label>
                            <select class="form-control" name="kewps20_id">
                                <option selected value="{{ $kewps29->kewps20_id }}">{{ $kewps29->kewps20_id }}
                                </option>
                                @foreach ($kewps20 as $k20)
                                    @if ($k20->id != $kewps29->kewps20_id)
                                        <option value="{{ $k20->id }}">{{ $k20->id }}
                                        </option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="col-4 mt-3">
                            <label for="">Tarikh</label>
                            <div class="input-group">
                                <input class="form-control" type="date" name="tarikh" value="{{ $kewps29->tarikh }}">
                            </div>
                        </div>
                        <div class="col-4 mt-3">
                            <label for="">Masa</label>
                            <div class="input-group">
                                <input class="form-control" type="time" name="masa" value="{{ $kewps29->masa }}">
                            </div>
                        </div>
                        <div class="col-4 mt-3">
                            <label for="">Tempat</label>
                            <div class="input-group">
                                <input class="form-control" type="text" name="tempat" value="{{ $kewps29->tempat }}">
                            </div>
                        </div>
                        <div class="col-4 mt-3">
                            <label for="">Tarikh Mula</label>
                            <div class="input-group">
                                <input class="form-control" type="date" name="tarikh_mula"
                                    value="{{ $kewps29->tarikh_mula }}">
                            </div>
                        </div>
                        <div class="col-4 mt-3">
                            <label for="">Tarikh Tamat</label>
                            <div class="input-group">
                                <input class="form-control" type="date" name="tarikh_tamat"
                                    value="{{ $kewps29->tarikh_tamat }}">
                            </div>
                        </div>
                        <div class="col-4 mt-3">
                            <label for="">Alamat</label>
                            <div class="input-group">
                                <input class="form-control" type="text" name="alamat" value="{{ $kewps29->alamat }}">
                            </div>
                        </div>
                        <div class="col-4 mt-3">
                            <label for="">Masa Mula</label>
                            <div class="input-group">
                                <input class="form-control" type="time" name="masa_mula"
                                    value="{{ $kewps29->masa_mula }}">
                            </div>
                        </div>
                        <div class="col-4 mt-3">
                            <label for="">Masa Tamat</label>
                            <div class="input-group">
                                <input class="form-control" type="time" name="masa_tamat"
                                    value="{{ $kewps29->masa_tamat }}">
                            </div>
                        </div>


                        <input type="hidden" name="staff_id" value="{{ Auth::user()->id }}">
                    </div>

                    <button class="btn btn-primary mt-5" type="submit">Simpan</button>
                </div>
            </div>
        </form>
    </div>


@endsection
