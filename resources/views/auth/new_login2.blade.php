@extends('layouts.base_login')
@section('content')
    <section>
        <div class="row pb-4">
            <div class="col-1"></div>
            <div class="col-2 d-flex align-items-center">
                <a class="navbar-brand">
                    <img src="/assets/img/logo-labuan.png" class="mt-3 ml-3 navbar-brand-img" style="max-height: 6rem;">
                </a>
            </div>

            <div class="col-9"
                style="display: flex; justify-content: flex-end; border-bottom-left-radius: 300px; background: rgba(24, 79,121)">
                <div class="mx-auto my-auto">
                    <h1 class="text-white text-center" style="font-size: 30px;">SISTEM PENGURUSAN ASET DAN STOR</h1>
                    <h1 class="text-white text-center" style="font-size: 30px;">PERBADANAN LABUAN</h1>
                </div>
            </div>
        </div>
    </section>
    <div class="container-fluid">
        <div class="row mt-5">
            <div class="col-xl col-lg col-sm-0"></div>
            <div class="col-xl-4 col-lg-6 col-sm-12">
                <div class="card shadow-lg" style="border-radius: 20px;">
                    <div class="card-body">
                        <div class="text-center">
                            <h1 style="color: rgba(24,79,121)"><strong>LOG MASUK</strong></h1>
                        </div>
                        <form method="POST" action="/login">
                        @csrf
                        <div class="row mt-3 px-3 mb-3" style="color: rgba(24,79,121)">
                            <div class="col-12">
                                <label for=""><strong>E-mel</strong></label>
                            </div>
                            <div class="col-12 mb-3 input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                </div>
                                <input class="form-control" name="email" type="text" value="" required>
                            </div>
                            
                            <div class="col-12">
                                <label for=""><strong>Kata Laluan</strong></label>
                            </div>
                            <div class="col-12 mb-3 input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-key"></i></span>
                                </div>
                                <input class="form-control" type="password" name="password" type="text" value="" required>
                            </div>
                            <div class="col-6">
                                <input class="" type="checkbox" value="">
                                <label for="" style="font-size: 12px;"><strong>Ingat Saya!</strong></label>
                            </div>
                            <div class="col-6"></div>
                            <div class="col-6 mt-3">
                                <input class="btn btn-md btn-primary" type="submit" value="Log Masuk"></input>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-xl col-lg col-sm-0"></div>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function() {
            $("#login").css("border-left", "5px solid rgba(24,79,121)");
        });

        function updatePicture(pengumuman) {
            $("#imageviewer").attr("src", `/storage/${pengumuman.gambar_pengumuman}`);
        }
    </script>
@endsection
