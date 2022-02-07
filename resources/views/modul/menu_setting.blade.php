@extends('layouts.base_module')
@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="nav flex-column nav-pills mt-5" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <p class="h3 fw-bold">SELAMAT DATANG, SUPER ADMIN</p>
                <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab"
                    aria-controls="v-pills-home" aria-selected="true">
                    <p class="h4 fw-bold m-0"><span class="fas fa-user-alt mr-2"></span> Profil Pengguna</p>
                </a>
                <a class="nav-link mt-3" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab"
                    aria-controls="v-pills-profile" aria-selected="false">
                    <p class="h4 fw-bold m-0"><span class="fas fa-bell mr-2"></span> Notifikasi</p>
                </a>
                <a class="nav-link mt-3" href="{{ route('logout') }}" aria-selected="false">
                    <p class="h4 fw-bold m-0"><span class="fas fa-sign-out-alt mr-2"></span> Log Keluar</p>
                </a>
            </div>
            <div class="tab-content ml-3 mt-5" id="v-pills-tabContent" style="width: 75%;">
                <div class="tab-pane fade  show active" id="v-pills-home" role="tabpanel"
                    aria-labelledby="v-pills-home-tab">
                    <div class="card">
                        <div class="card-body">
                            <p class="h3 fw-bold">Profil Pengguna</p>
                            <div class="row mt-4">
                                <div class="col-2">
                                    <label class="mt-2">Nama Pengguna</label>
                                </div>
                                <div class="col-4">
                                    <input class="form-control" type="text" value="{{ auth()->user()->name }}">
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-2">
                                    <label class="mt-2">Nama Pertama</label>
                                </div>
                                <div class="col-4">
                                    <input class="form-control" type="text" value="{{ auth()->user()->nama_awal }}">
                                </div>
                                <div class="col-2">
                                    <label class="mt-2">Nama Akhir</label>
                                </div>
                                <div class="col-4">
                                    <input class="form-control" type="text" value="{{ auth()->user()->nama_akhir }}">
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-2">
                                    <label class="mt-2">E-Mel</label>
                                </div>
                                <div class="col-4">
                                    <input class="form-control" type="text" value="{{ auth()->user()->email }}">
                                </div>
                            </div>

                            <div class="row mt-4">
                                <div class="col-2">
                                    <label class="mt-2">Tarikh Mula</label>
                                </div>
                                <div class="col-4">
                                    <input class="form-control" type="text" value="{{ auth()->user()->tarikh_mula }}">
                                </div>
                                <div class="col-2">
                                    <label class="mt-2">Tarikh Akhir</label>
                                </div>
                                <div class="col-4">
                                    <input class="form-control" type="text" value="{{ auth()->user()->tarikh_akhir }}">
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                    @for ($i = 0; $i < 5; $i++)
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-10">
                                        <p class="h3 fw-bold m-0">NOTIFIKASI</p>
                                        <P class="m-0"> Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                                            Error, iure veritatis
                                            sint
                                            tempore
                                            magnam eaque non necessitatibus odio ex exercitationem modi corrupti? Eligendi
                                            eveniet
                                            eum,
                                            quibusdam debitis atque eius neque. </P>
                                    </div>
                                    <div class="col-2">
                                        <a href="#" class="btn btn-danger btn-block h-100"> <span
                                                class="fas fa-trash-alt fa-3x mt-2">
                                            </span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endfor
                </div>

            </div>
        </div>
    </div>



@endsection
