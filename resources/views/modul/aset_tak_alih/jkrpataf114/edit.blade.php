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
                                <li class="breadcrumb-item"><a href="">Jkr.Pata.F11/4</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid mt--6">
        <form method="POST" action="/jkrpataf114/{{ $jkrpataf114->id }}">
            @method('put')
            @csrf
            <div class="card mt-4">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <h2 class="mb-0">Sijil Hapus Kira Aset</h2>
                        </div>
                    </div>
                </div>

                </br>
                <div class="card-body pt-0">
                    <div class="row">
                        <div class="col-4 mt-3">
                            <label for="">No Dpa</label>
                            <div class="input-group">
                                <select name="jkrpataf68_id" class="form-control">
                                    <option selected>Pilih</option>
                                    @foreach ($jkrpataf68 as $ata68)
                                        <option {{ $jkrpataf114->jkrpataf68_id == $ata68->no_dpa ? 'selected' : '' }}
                                            value="{{ $ata68->no_dpa }}">{{ $ata68->no_dpa }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-4 mt-3">
                            <label for="">No Rujukan</label>
                            <div class="input-group">
                                <input class="form-control" type="text" name="rujukan_bil"
                                    value="{{ $jkrpataf114->rujukan_bil }}">
                            </div>
                        </div>
                        <div class="col-4 mt-3">
                            <label for="">Tarikh</label>
                            <div class="input-group">
                                <input class="form-control" type="date" name="tarikh"
                                    value="{{ $jkrpataf114->tarikh }}">
                            </div>
                        </div>
                        <div class="col-4 mt-3">
                            <label for="">Bil</label>
                            <div class="input-group">
                                <input class="form-control" type="number" name="bil" value="{{ $jkrpataf114->bil }}">
                            </div>
                        </div>
                        <div class="col-4 mt-3">
                            <label for="">Jenis Aset</label>
                            <div class="input-group">
                                <input class="form-control" type="text" name="jenis_aset"
                                    value="{{ $jkrpataf114->jenis_aset }}">
                            </div>
                        </div>
                        <div class="col-4 mt-3">
                            <label for="">No Pendaftaran</label>
                            <div class="input-group">
                                <input class="form-control" type="text" name="no_pendaftaran"
                                    value="{{ $jkrpataf114->no_pendaftaran }}">
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
