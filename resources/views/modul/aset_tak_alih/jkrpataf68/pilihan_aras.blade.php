@extends('layouts.base_ata') @section('content')
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-white d-inline-block mb-0">Perbadanan Labuan</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="/jkrpataf68"><i class="fas fa-file"></i></a></li>
                                <li class="breadcrumb-item"><a href="/jkrpataf68">Pl.Pata.f6/8</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid mt--6">
        <div class="card mt-4">
            <div class="card-header">
                <div class="row">
                    <div class="col">
                        <h2 class="mb-0">Pilih Aras</h2>
                    </div>
                </div>
            </div>

            <div class="card-body pt-0">
                <div class="row">
                    <div class="col-12 my-3">
                        @foreach ($aras as $a)
                            <a href="/edit-aras?aras_id={{$a->id}}" class="btn btn-primary text-white">Aras {{ $loop->index + 1 }}</a>
                        @endforeach

                    </div>
                    <hr style="width: 100%; color: black;">
                    <div class="col-12">
                        <a href="{{$link}}" class="btn btn-primary text-white">Kembali</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
