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
                                <li class="breadcrumb-item"><a href="">kewps20</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid mt--6">
        <form method="POST" action="/kewps20/{{ $kewps20->id }}">
            @method('put')
            @csrf
            <div class="card mt-4">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <h2 class="mb-0">Pelupusan Stok</h2>
                        </div>
                    </div>
                </div>

                </br>
                <div class="card-body pt-0">
                    <div class="row">
                        <div class="col-12 mt-3">
                            <label for="">Kuasa Melulus</label>
                            <div class="input-group">
                                <input class="form-control" type="text" name="kuasa_melulus"
                                    value="{{ $kewps20->kuasa_melulus }}">
                            </div>
                        </div>
                        <input type="hidden" name="nama_pemeriksa1" value="{{ Auth::user()->id }}">
                        <input type="hidden" name="nama_pemeriksa2" value="{{ Auth::user()->id }}">

                    </div>
                    <button class="btn btn-primary mt-5" type="submit">Simpan</button>

                </div>
            </div>
        </form>

        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col">
                        <h2 class="mb-0">Info Kewps20</h2>
                    </div>
                    <div class="text-end">
                        <a class="mb-0 btn btn-primary mr-4 text-lighter btn-sm" data-toggle="modal"
                            data-target="#modal_add_k20"> <span class="fas fa-plus"></span>Tambah Aset</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                @foreach ($kewps20->infokewps20 as $k20)
                    <div class="row">
                        <div class="col-12 mt-4">
                            <h3 class="d-inline mr-3">Aset {{ $loop->iteration }}</h3>
                            <form action="/infokewps20/{{ $k20->id }}" method="POST" class="d-inline">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-danger btn-sm rounded-3" type="submit"><span
                                        class="fas fa-trash-alt"></span></button>
                            </form>
                        </div>
                    </div>

                    <form action="/infokewps20/{{ $k20->id }}" method="post">
                        @method('put')
                        @csrf
                        <div class="row">
                            <input type="hidden" name="kewps20_id" value="{{ $kewps20->id }}">
                            <div class="col-4">
                                <label for="">No Kod</label>
                                <select class="form-control mb-3" name="kewps3a_id">
                                    @foreach ($kewps3a as $k3)
                                        <option {{ $k3->id == $k20->kewps3a_id ? 'selected' : '' }}
                                            value="{{ $k3->id }}">
                                            {{ $k3->no_kad }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-4">
                                <label for="">Kuantiti</label>
                                <div class="input-group">
                                    <input class="form-control mb-3" type="number" name="kuantiti"
                                        value="{{ $k20->kuantiti }}">
                                </div>
                            </div>
                            <div class="col-4">
                                <label for="">Keadaan Stok</label>
                                <div class="input-group">
                                    <input class="form-control mb-3" type="text" name="keadaan_stok"
                                        value="{{ $k20->keadaan_stok }}">
                                </div>
                            </div>
                            <div class="col-4">
                                <label for="">Kaedah Pelupusan</label>
                                <select class="form-control mb-3" name="kaedah_pelupusan">
                                    @foreach ($kaedah as $k)
                                        <option {{ $k->value == $k20->kaedah_pelupusan ? 'selected' : '' }}
                                            value="{{ $k->value }}">{{ $k->text }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-4">
                                <label for="">Justifikasi</label>
                                <div class="input-group">
                                    <input class="form-control mb-3" type="text" name="justifikasi"
                                        value="{{ $k20->justifikasi }}">
                                </div>
                            </div>
                            <div class="col-4">
                                <label for="">Keputusan</label>
                                <div class="input-group">
                                    <input class="form-control mb-3" type="text" name="keputusan"
                                        value="{{ $k20->keputusan }}">
                                </div>
                            </div>
                            <div class="col text-center">
                                <button type="submit" class="btn btn-primary btn-sm"><span class="fas fa-arrow-up"></span>
                                    Kemaskini</button>
                            </div>
                        </div>
                    </form>
                @endforeach
            </div>

        </div>
    </div>
    </div>



    <div class="modal fade" id="modal_add_k20" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Info Kewps20</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="/infokewps20" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <input type="hidden" name="kewps20_id" value="{{ $kewps20->id }}">
                            <div class="col-12">
                                <label for="">No Kod</label>
                                <select class="form-control mb-3" name="kewps3a_id">
                                    <option selected>Pilih</option>
                                    @foreach ($kewps3a as $k3)
                                        <option value="{{ $k3->id }}">{{ $k3->no_kad }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-12">
                                <label for="">Kuantiti</label>
                                <div class="input-group">
                                    <input class="form-control mb-3" type="number" name="kuantiti" value="">
                                </div>
                            </div>
                            <div class="col-12">
                                <label for="">Keadaan Stok</label>
                                <div class="input-group">
                                    <input class="form-control mb-3" type="text" name="keadaan_stok" value="">
                                </div>
                            </div>
                            <div class="col-12">
                                <label for="">Kaedah Pelupusan</label>
                                <select class="form-control mb-3" name="kaedah_pelupusan">
                                    <option selected>Pilih</option>
                                    @foreach ($kaedah as $k)
                                        <option value="{{ $k->value }}">{{ $k->text }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-12">
                                <label for="">Justifikasi</label>
                                <div class="input-group">
                                    <input class="form-control mb-3" type="text" name="justifikasi" value="">
                                </div>
                            </div>
                            <div class="col-12">
                                <label for="">Keputusan</label>
                                <div class="input-group">
                                    <input class="form-control mb-3" type="text" name="keputusan" value="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a class="btn btn-secondary" data-dismiss="modal">Close</a>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
