@extends('layouts.base_login')
@section('content')

    <section style="background-image: url('/assets/img/bg-labuan.jpg') !important;
                                      background-repeat: no-repeat;
                                      background-size: stretch;
                                      height: 100vh !important;
                                      width: 100vw !important;
                                      ">
        <div class="container-fluid">
            <div class="row h-100">
                <div class="col-8">
                    <div class="row pb-4"
                        style="background: rgba(250,250,250, 0.4); border-bottom-right-radius: 300px;">
                        <div class="col-2 d-flex align-items-center">
                            <a class="navbar-brand">
                                <img src="/assets/img/logo-labuan.png" class="mt-3 ml-3 navbar-brand-img"
                                    style="max-height: 5rem;">
                            </a>
                        </div>

                        <div class="col-10">
                            <div class="mt-4">
                                <h1 class="text-dark" style="font-size: 30px;">SISTEM PENGURUSAN ASET DAN STOR</h1>
                                <h1 class="text-dark" style="font-size: 30px;">PERBADANAN LABUAN</h1>
                            </div>
                        </div>

                    </div>

                    <div class="mt-6 ml-4">
                        <h1 style="font-size: 50px; color: white;">Pengumuman<br>Terkini</h1>
                        <h2 style="color: white;">{{ $pengumuman->tajuk }}</h3>
                            <h3 style="color: white;">{{ $pengumuman->info_pengumuman }}</h3>
                    </div>
                </div>
                <div class="col-4 w-100">

                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <div class="p-5" style="border-radius: 250px; background: rgba(255, 255, 255, 0.2)">
                        <h1 class="text-center text-white" style="font-size: 40px;">Log Masuk</h1>
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-outline mb-4">

                                <label class="form-label text-white" for="form3Example3">Alamat E-mel</label>
                                <input type="email" name="email" id="form3Example3" class="form-control" placeholder="" />
                            </div>

                            <!-- Password input -->
                            <div class="form-outline mb-3">

                                <label class="form-label text-white" for="form3Example4">Kata Laluan</label>
                                <input type="password" name="password" id="form3Example4" class="form-control"
                                    placeholder="" />
                            </div>

                            <div class="d-flex justify-content-between align-items-center">
                                <!-- Checkbox -->
                                <div class="form-check mb-0">
                                    <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3" />
                                    <label class="form-check-label text-white" for="form2Example3">
                                        Ingati Saya
                                    </label>
                                </div>
                            </div>

                            <div class="text-center text-lg-start">
                                <button type="submit" class="btn btn-secondary btn-lg">Login</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop
