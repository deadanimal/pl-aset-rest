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
                        <h2 class="mb-0">Pilih Blok</h2>
                    </div>
                </div>
            </div>

            <div class="card-body pt-0">
                <div class="row">
                    <div class="col-12 my-3">
                        @foreach ($blok as $b)
                        <div class="">
                            <div class="row">
                                <div class="col-6">
                                    <h3><u>Blok {{$loop->index + 1 }}</u></h3>
                                    <a href="/delete-blok?id={{$b->id}}" class="btn-sm btn-danger text-white">Delete</a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6 my-3">
                                    <a href="/edit-blok?id_bahagian1={{$b->id_bahagian1}}&blok_id={{$b->id}}" class="btn btn-primary text-white">Maklumat Blok</a>
                                    <a href="/edit-blok-binaan-luar?id_bahagian1={{$b->id_bahagian1}}&blok_id={{$b->id}}" class="btn btn-primary text-white">Binaan Luar</a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
