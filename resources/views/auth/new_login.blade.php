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

            <div class="col-9 bg-primary"
                style="display: flex; justify-content: flex-end; border-bottom-left-radius: 300px;">
                <div class="mx-auto my-auto">
                    <h1 class="text-white text-center" style="font-size: 30px;">SISTEM PENGURUSAN ASET DAN STOR</h1>
                    <h1 class="text-white text-center" style="font-size: 30px;">PERBADANAN LABUAN</h1>
                </div>
            </div>
        </div>


        <div class="container-fluid">
            <div class="text-center p-4">
                <h1 class="text-primary" style="font-size: 50px;">PENGUMUMAN TERKINI</h1>
            </div>
            <div class="row">
                <div class="col-6">

                    <div class="accordion" id="accordionExample">
                        @foreach ($pengumumans as $pengumuman)
                            <div class="card">
                                <div class="card-header" id="headingOne" onclick="updatePicture({{$pengumuman}})">
                                  <h2 class="mb-0">
                                    <button  class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne{{$pengumuman->id}}" aria-expanded="true" aria-controls="collapseOne{{$pengumuman->id}}">
                                        <i class="fa fa-comments">&nbsp;</i> {{ $pengumuman->tajuk }}
                                    </button>
                                  </h2>
                                </div>
                            
                                <div id="collapseOne{{$pengumuman->id}}" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                                  <div class="card-body">
                                    {{ $pengumuman->info_pengumuman }}
                                  </div>
                                </div>
                              </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-6">
                    <div class="card">
                        <div class="card-header">
                            <h2 class="mb-0">
                                Gambar Pengumuman
                            </h2>
                        </div>
                        <div class="card-body">
                            <img width="100%" height="400" id="imageviewer" src="https://upload.wikimedia.org/wikipedia/commons/thumb/d/d1/Tiada_gambar_tersedia.svg/1200px-Tiada_gambar_tersedia.svg.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script type="text/javascript">

        function updatePicture(pengumuman) {
            console.log(pengumuman);
            $("#imageviewer").attr("src", `/storage/${pengumuman.gambar_pengumuman}`);
        }

    </script>
@endsection
