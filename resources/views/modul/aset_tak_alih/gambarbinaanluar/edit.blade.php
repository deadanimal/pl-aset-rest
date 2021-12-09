@extends('layouts.base_ata') @section('content')
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-white d-inline-block mb-0">Perbadanan Labuan</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="#"><i class="fas fa-file"></i></a></li>
                                <li class="breadcrumb-item"><a href="">Gambar Blok</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid mt--6">
        <form method="POST" action="/gambarblok/{{ $gambarblok->id }}" enctype="multipart/form-data">
            @method('put')
            @csrf
            <div class="card mt-4">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <h2 class="mb-0">Gambar Blok Bangunan</h2>
                        </div>
                    </div>
                </div>

                </br>
                <div class="card-body pt-0">
                    <div class="row">
                        <div class="col-6 mt-3">
                            <label for="">ID Blok Bangunan</label>
                            <div class="input-group">
                                <select name="senarai_blok_bangunan_id" class="form-control">
                                    <option selected>Pilih</option>
                                    @foreach ($blokbangunan as $bb)
                                        <option {{ $bb->id == $gambarblok->senarai_blok_bangunan_id ? 'selected' : '' }}
                                            value="{{ $bb->id }}">{{ $bb->id }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-6 mt-3">
                            <label for="">Tarikh</label>
                            <div class="input-group">
                                <input class="form-control" type="date" name="tarikh" value="{{ $gambarblok->tarikh }}">
                            </div>
                        </div>
                        <div class="col-6 mt-3">
                            <label for="">From Page</label>
                            <div class="input-group">
                                <input class="form-control" type="number" name="from_page"
                                    value="{{ $gambarblok->from_page }}">
                            </div>
                        </div>
                        <div class="col-6 mt-3">
                            <label for="">To Page</label>
                            <div class="input-group">
                                <input class="form-control" type="number" name="to_page"
                                    value="{{ $gambarblok->to_page }}">
                            </div>
                        </div>

                        <div class="col-6 mt-3">
                            <label for="">Gambar Hadapan</label><br>
                            <img class="mb-2 rounded mx-auto d-block" style="height: 100px;"
                                src="{{ asset('/storage/' . $gambarblok->gambar_hadapan) }}">
                            <div class="input-group">
                                <input style="height: 38px;" class="form-control" type="file" name="gambar_hadapan1"
                                    value="">
                            </div>
                        </div>
                        <div class="col-6 mt-3">
                            <label for="">Gambar Belakang</label><br>
                            <img class="mb-2 rounded mx-auto d-block" style="height: 100px;"
                                src="{{ asset('/storage/' . $gambarblok->gambar_belakang) }}">
                            <div class="input-group">
                                <input style="height: 38px;" class="form-control" type="file" name="gambar_belakang1"
                                    value="">
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                    </div>
                    <button class="btn btn-primary mt-5" type="submit">Simpan</button>
                </div>
            </div>
        </form>
    </div>


@endsection
