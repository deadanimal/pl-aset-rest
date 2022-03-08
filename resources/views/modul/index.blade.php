@extends('layouts.base_module')
@section('content')
    <div class="position-relative">
        <section>
            <div class="row pb-4">
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
        <section class="section section-sm section-shaped" style="padding-bottom: 50px;">
            <div class="shape shape-style-1 shape-default">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
            </div>
            <div class="container py-lg-md d-flex">
                <div class="col px-0 mt-5">
                    <div class="row">
                        <div class="col-lg-12">
                            <h4 class="display-3  text-dark text-center">PENGURUSAN ASET DAN STOR <span><b>(Perbadanan
                                        Labuan)</b></span>
                            </h4>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="section section-lg pt-lg-0 ">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="row row-grid w-100">

                            <div class="col-lg-2">
                                <div id="umum" class="bg-secondary card hand card-lift--hover shadow border-0">
                                    <div class="card-body mx-auto">
                                        <div class="text-center mb-4">
                                            <img src="/assets/img/gear.png" style="height:100px;">
                                        </div>
                                        <h3 class="text-uppercase text-center text-white">Umum</h3>
                                        <br>
                                        <div class="text-center">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div id="aset_alih" class="bg-secondary card hand card-lift--hover shadow border-0">
                                    <div class="card-body mx-auto">
                                        <div class="text-center mb-4">
                                            <img src="/assets/img/freight.png" style="height:100px">
                                        </div>
                                        <h3 class="text-uppercase text-center text-white">Aset Alih</h3>
                                        <br>
                                        <div class="text-center">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div id="aset_tak_alih" class="card bg-secondary hand card-lift--hover shadow border-0">
                                    <div class="card-body mx-auto">
                                        <div class="text-center mb-4">
                                            <img src="/assets/img/factory.png" style="height:100px;">
                                        </div>
                                        <h3 class="text-uppercase text-center text-white">Aset Tak Alih</h3>
                                        <div class="text-center">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-2">
                                <div id="aset_tak_ketara" class="card bg-secondary hand card-lift--hover shadow border-0">
                                    <div class="card-body mx-auto">
                                        <div class="text-center mb-4">
                                            <img src="/assets/img/website.png" style="height:100px">
                                        </div>
                                        <h3 class="text-uppercase text-center text-white">Aset Tak Ketara</h3>
                                        <div class="text-center">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-2">
                                <div id="susut_nilai" class="card bg-secondary hand card-lift--hover shadow border-0">
                                    <div class="card-body mx-auto">
                                        <div class="text-center mb-4">
                                            <img src="/assets/img/salary.png" style="height:100px">
                                        </div>
                                        <br>
                                        <h3 class="text-uppercase text-center text-white">Susut Nilai</h3>
                                        <div class="text-center">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-2">
                                <div id="stor" class="card bg-secondary hand card-lift--hover shadow border-0">
                                    <div class="card-body mx-auto">
                                        <div class="text-center mb-4">
                                            <img src="/assets/img/storage.png" style="height:100px;">
                                        </div>
                                        <h3 class="text-uppercase text-center text-white">Pengurusan Stor</h3>
                                        <div class="text-center">
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
        </section>
        </main>

        <script type="text/javascript">
            $("#umum").click(function() {
                window.location.href = "/pengguna/"
            });

            $("#aset_alih").click(function() {
                window.location.href = "/kewpa1/"
            });

            $("#aset_tak_alih").click(function() {
                window.location.href = "/jkrpataf68"
            });

            $("#aset_tak_ketara").click(function() {
                window.location.href = "/kewatk1/"
            });

            $("#stor").click(function() {
                window.location.href = "/homestor/"
            });

            $("#susut_nilai").click(function() {
                window.location.href = ""
            });

            $("#menu").css("border-left", "5px solid rgba(24,79,121)");
        </script>
    @endsection
