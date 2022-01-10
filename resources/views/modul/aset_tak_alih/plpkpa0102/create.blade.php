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
                                <li class="breadcrumb-item"><a href="">PL-PK(PA)-01/02</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid mt--6">
        <form method="POST" action="/plpkpa0102">
            @csrf
            <div class="card mt-4">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <h2 class="mb-0">Jalan</h2>
                        </div>
                    </div>
                </div>

                </br>
                <div class="card-body pt-0">
                    <div class="row">
                        <div class="col-4 mt-3">
                            <label for="">No Arahan Kerja</label>
                            <div class="input-group">
                                <input class="form-control" type="text" name="no_arahan_kerja" value="">
                            </div>
                        </div>
                        <div class="col-4 mt-3">
                            <label for="">nama Penerima</label>
                            <div class="input-group">
                                <input class="form-control" type="text" name="nama_penerima" value="">
                            </div>
                        </div>
                        <div class="col-4 mt-3">
                            <label for="">Bil</label>
                            <div class="input-group">
                                <input class="form-control" type="text" name="bil" value="">
                            </div>
                        </div>
                        <div class="col-4 mt-3">
                            <label for="">Lokasi</label>
                            <div class="input-group">
                                <input class="form-control" type="text" name="lokasi" value="">
                            </div>
                        </div>
                        <div class="col-4 mt-3">
                            <label for="">Kerosakan</label>
                            <div class="input-group">
                                <input class="form-control" type="text" name="kerosakan" value="">
                            </div>
                        </div>
                        <div class="col-4 mt-3">
                            <label for="">Catatan</label>
                            <div class="input-group">
                                <input class="form-control" type="text" name="catatan" value="">
                            </div>
                        </div>
                        <div class="col-3 mt-3">
                            <label for="">Nama Pengadu</label>
                            <div class="input-group">
                                <input class="form-control" type="text" name="nama_pengadu" value="">
                            </div>
                        </div>
                        <div class="col-3 mt-3">
                            <label for="">No Telefon Pengadu</label>
                            <div class="input-group">
                                <input class="form-control" type="text" name="no_telefon_pengadu" value="">
                            </div>
                        </div>
                        <div class="col-3 mt-3">
                            <label for="">Nota</label>
                            <div class="input-group">
                                <input class="form-control" type="text" name="nota" value="">
                            </div>
                        </div>
                        <div class="col-3 mt-3">
                            <label for="">Tarikh Pengesahan</label>
                            <div class="input-group">
                                <input class="form-control" type="date" name="tarikh_pengesahan" value="">
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
