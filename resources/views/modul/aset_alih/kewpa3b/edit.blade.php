@extends('layouts.base_pa') @section('content')
<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">Perbadanan Labuan</h6>
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="#"><i class="fas fa-file"></i></a></li>
                            <li class="breadcrumb-item"><a href="/kewpa3b">kewpa3b</a></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid mt--6">
    <div id="updateDiv">
        <form id="updateForm" action="/kewpa3b/{{$kewpa3b->id}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="card mt-4" id="basic-info">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <h2 class="mb-0">Tambah Naik Taraf Aset</h2>
                        </div>
                    </div>
                </div>

                </br>
                <div class="card-body pt-0">
                    <div class="row">
                        <div class="col-4">
                            <label for="">Kos</label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="text" name="kos" value="{{$kewpa3b->kos}}" required>
                            </div>
                        </div>
                        <div class="col-4">
                            <label for="">Tempoh Jaminan</label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="text" name="tempoh_jaminan" value="{{$kewpa3b->tempoh_jaminan}}" required>
                            </div>
                        </div>
                        <div class="col-4">
                            <label for="">Tarikh Dipasang</label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="date" name="tarikh_dipasang" value="{{$kewpa3b->tarikh_dipasang}}" required>
                            </div>
                        </div>
                        <div class="col-4">
                            <label for="">Tarikh Dikeluarkan</label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="date" name="tarikh_dipasang" value="{{$kewpa3b->tarikh_dipasang}}" required>
                            </div>
                        </div>
                        <div class="col-4">
                            <label for="">Tarikh Dilupus Hapus</label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="date" name="tarikh_dilupus_hapus" value="{{$kewpa3b->tarikh_dilupus_hapus}}" required>
                            </div>
                        </div>
                        <div class="col-4">
                            <label for="">Catatan</label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="text" name="catatan" value="{{$kewpa3b->catatan}}" required>
                            </div>
                        </div>
                        <div class="col-4">
                            <label for="">Pegawai Bertanggungjawab</label>
                            <div class="input-group">
                                <select class="form-control mb-3" name="pegawai_bertanggungjawab" required>
                                    <option value="{{$kewpa3b->pegawai_bertanggungjawab}}" selected hidden>{{$kewpa3b->pg_bertanggungjawab->name}}</option required>
                                    @foreach ($pegawais as $pegawai)
                                    <option value="{{$pegawai->id}}">{{$pegawai->name}}</option>
                                    @endforeach
                                </select>

                            </div>
                        </div>
                        <div class="col-4">
                            <label for="">No Siri Pendaftaran</label>
                            <div class="input-group">
                                <select class="form-control mb-3" name="no_siri_pendaftaran" required>
                                    <option value="{{$kewpa3b->no_siri_pendaftaran}}" selected hidden>{{$kewpa3b->kewpa3a->no_siri_pendaftaran}}</option required>
                                    @foreach ($kewpa3a as $kp3)
                                    <option value="{{$kp3->id}}">{{$kp3->no_siri_pendaftaran}}</option>
                                    @endforeach
                                </select>

                            </div>
                        </div>
                    </div>
                    <button class="btn btn-primary btn-sm" type="submit">Simpan</button>

                </div>
        </form>
    </div>
</div>
@endsection