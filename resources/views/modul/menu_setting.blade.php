@extends('layouts.base_module')
@section('content')

<style>
.nav-pills > .active {
    background-color: rgba(24,79,121) !important;
    
}
</style>
<section>
    <div class="row pb">
        <div class="col-1"></div>
        <div class="col-2 d-flex align-items-center">
            <a class="navbar-brand">
                <img src="/assets/img/logo-labuan.png" class="mt-3 ml-3 navbar-brand-img" style="max-height: 6rem;">
            </a>
        </div>

        <div class="col-9"
            style="display: flex; justify-content: flex-end; border-bottom-left-radius: 300px; background: rgba(24,79,121)">
            <div class="mx-auto my-auto">
                <h1 class="text-white text-center" style="font-size: 30px;">SISTEM PENGURUSAN ASET DAN STOR</h1>
                <h1 class="text-white text-center" style="font-size: 30px;">PERBADANAN LABUAN</h1>
            </div>
        </div>
    </div>
</section>

    <div class="container" style="margin-left: 13%;">
        <div class="row">
            <div class="col-3">
                <div class="nav flex-column nav-pills mt-5" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <p class="h3 fw-bold text-center">Hi, {{auth()->user()->name}}</p>
                    <a onclick="clickProfil()" class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab"
                        aria-controls="v-pills-home" aria-selected="true">
                        <p id="profil_title" class="h4 fw-bold m-0"><span class="fas fa-user-alt mr-2"></span> Profil Pengguna</p>
                    </a>
                    <a onclick="clickNotifikasi()" class="nav-link mt-3" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab"
                        aria-controls="v-pills-profile" aria-selected="false">
                        <p id="notifikasi_title" class="h4 fw-bold m-0"><span class="fas fa-bell mr-2"></span> Notifikasi</p>
                    </a>
                    {{-- <a class="nav-link mt-3" href="{{ route('logout') }}" aria-selected="false">
                        <p class="h4 fw-bold m-0"><span class="fas fa-sign-out-alt mr-2"></span> Log Keluar</p>
                    </a> --}}
                </div>
            </div>
            <div class="col-9">
                <div class="tab-content ml-3 mt-5" id="v-pills-tabContent" style="width: 75%;">
                    <div class="tab-pane fade  show active" id="v-pills-home" role="tabpanel"
                        aria-labelledby="v-pills-home-tab">
                        <div class="">
                            <div class="">
                                <p class="text-center h3 fw-bold">Profil Pengguna</p>
                                <div class="row mt-4">
                                    <div class="col-4">
                                        <label class="mt-2">Nama Pengguna</label>
                                    </div>
                                    <div class="col-8">
                                        <input class="form-control" type="text" value="{{ auth()->user()->name }}">
                                    </div>
                                </div>
                                <div class="row mt-4">
                                    <div class="col-4">
                                        <label class="mt-2">Nama Pertama</label>
                                    </div>
                                    <div class="col-8">
                                        <input class="form-control" type="text" value="{{ auth()->user()->nama_awal }}">
                                    </div>
                                </div>
                                <div class="row mt-4">
                                    <div class="col-4">
                                        <label class="mt-2">Nama Akhir</label>
                                    </div>
                                    <div class="col-8">
                                        <input class="form-control" type="text" value="{{ auth()->user()->nama_akhir }}">
                                    </div>
                                </div>
                                <div class="row mt-4">
                                    <div class="col-4">
                                        <label class="mt-2">E-Mel</label>
                                    </div>
                                    <div class="col-8">
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
                        <p class="text-center h3 fw-bold">Notifikasi</p>

                        @for ($i = 0; $i < 5; $i++)
                            <div class="card">
                                <div class="card-body">
                                    
                                    <div class="row">
                                        <div class="col-12">
                                            <p class="h3 fw-bold m-0">NOTIFIKASI</p>
                                            <P class="m-0"> Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                                                Error, iure veritatis
                                                sint
                                                tempore
                                                magnam eaque non necessitatibus odio ex exercitationem modi corrupti? Eligendi
                                                eveniet
                                                eum,
                                                quibusdam debitis atque eius neque. </P>
                                        <br>
                                        <a href="#" class="card-link">BUANG</a>

                                        </div>
                                        {{-- <div class="col-2">
                                            <a href="#" class="btn btn-danger btn-block h-100"> <span
                                                class="fas fa-trash-alt mt-2">
                                            </span></a>
                                        </div> --}}
                                    </div>
                                </div>
                            </div>
                        @endfor
                    </div>
    
                </div>
            </div>
            
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function() {
            clickProfil();
        })
        function clickProfil() {
            $("#profil_title").css("color", "white");
            $("#notifikasi_title").css("color", "rgba(24,79,121)");
        }

        function clickNotifikasi() {
            $("#profil_title").css("color", "rgba(24,79,121)");
            $("#notifikasi_title").css("color", "white");
        }

    </script>



@endsection
