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
                style="display: flex; justify-content: flex-end; border-bottom-left-radius: 300px; background: rgba(24,79,121)">
                <div class="mx-auto my-auto">
                    <h1 class="text-white text-center" style="font-size: 30px;">SISTEM PENGURUSAN ASET DAN STOR</h1>
                    <h1 class="text-white text-center" style="font-size: 30px;">PERBADANAN LABUAN</h1>
                </div>
            </div>
        </div>


        <div class="container-fluid">
            <div class="text-center p-4">
                <h1 class="" style="font-size: 40px; color: rgba(24,79,121)">PENGUMUMAN TERKINI</h1>
            </div>
            <div class="row" style="width: 90%; margin: auto">
                <div class="col-6">

                    <div class="accordion" id="accordionExample">
                        @foreach ($pengumumans as $pengumuman)
                            <div class="card">
                                <div class="card-header m-0 p-0" style="background: rgb(157, 175, 193); border-radius: 2px;"
                                    id="headingOne" onclick="updatePicture({{ $pengumuman }})">
                                    <h2 class="mb-0">
                                        <button class="btn btn-link btn-block text-left text-dark" type="button"
                                            data-toggle="collapse" data-target="#collapseOne{{ $pengumuman->id }}"
                                            aria-expanded="true" aria-controls="collapseOne{{ $pengumuman->id }}">
                                            <i style="font-size: 15px;" class="text-dark fa fa-comments">&nbsp;</i>
                                            {{ $pengumuman->tajuk }}
                                        </button>
                                    </h2>
                                </div>

                                <div id="collapseOne{{ $pengumuman->id }}" class="collapse"
                                    aria-labelledby="headingOne" data-parent="#accordionExample">
                                    <div class="card-body ">
                                        {{ $pengumuman->info_pengumuman }}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-6 p-3">
                    <div class="ml-3">
                        <img width="100%" height="400" id="imageviewer" src="/assets/img/pengumuman_img_placeholder.svg"
                            alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script type="text/javascript">
        $(document).ready(function() {
            $("#utama").css("border-left", "5px solid rgba(24,79,121)");
        });

        function updatePicture(pengumuman) {
            console.log(pengumuman);
            $("#imageviewer").attr("src", `/storage/${pengumuman.gambar_pengumuman}`);
        }
    </script>
@endsection
