@extends('layouts.base_ata') @section('content')
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-white d-inline-block mb-0">Perbadanan Labuan</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="#"><i class="fas fa-file"></i></a></li>
                                <li class="breadcrumb-item"><a href="">Jkr.Pata.f6/12 (3)</a></li>
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
                        <h2 class="mb-0">Data Aset Khusus Binaan Luar</h2>
                    </div>
                    <div class="text-end mr-2">
                        <a href="/dakbinaanluar/create"><button class="align-self-end btn btn-sm btn-primary"
                                id="tambah">Tambah</button></a>
                    </div>
                </div>
            </div>

            <div class="table-responsive py-4">
                <table class="table table-custom-simplified table-flush" id="table">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">ID Blok Bangunan</th>
                            <th scope="col">Nama Premis</th>
                            <th scope="col">Nama Binaan Luar</th>
                            <th scope="col">Bil. Kontraktor</th>
                            <th scope="col">Bil. Perunding</th>
                            <th scope="col">Tindakan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dataasetkhususbl as $dakbl)
                            <tr>

                                <td scope="col">{{ $dakbl->id }}</td>
                                <td scope="col">{{ $dakbl->senarai_binaan_luar_id }}</td>
                                <td scope="col">{{ $dakbl->nama_premis }}</td>
                                <td scope="col">{{ $dakbl->nama_binaan_luar }}</td>
                                <td scope="col">{{ count($dakbl->kontraktor) }}</td>
                                <td scope="col">{{ count($dakbl->perunding) }}</td>

                                <td scope="col">
                                    <a class="btn-sm bg-white border-0" href="/dakbinaanluar/{{ $dakbl->id }}"><i
                                            class="fas fa-pen"></i></a>
                                    <a class="btn-sm bg-white border-0" href="/dakbinaanluarpdf/{{ $dakbl->id }}"><i
                                            class="fas fa-print"></i></a>
                                    <form action="/dakbinaanluar/{{ $dakbl->id }}" class="d-inline" method="POST">
                                        @method('delete')
                                        @csrf
                                        <button class="btn-sm bg-white border-0" type="submit"> <i
                                                class=" fas fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
