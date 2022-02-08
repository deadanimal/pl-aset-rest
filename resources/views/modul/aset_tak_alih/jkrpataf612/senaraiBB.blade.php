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
                                <li class="breadcrumb-item"><a href="">Jkr.Pata.f6/12</a></li>
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
                        <h2 class="mb-0">Senarai Blok Bangunan</h2>
                    </div>
                </div>
            </div>

            <div class="table-responsive py-4">
                <table class="table table-custom-simplified table-flush" id="table">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nama Blok</th>
                            <th scope="col">Luas Tapak</th>
                            <th scope="col">Catatan</th>
                            <th scope="col">Jkrpataf612 ID</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($senaraiBB as $bb)
                            <tr>
                                <td scope="col">{{ $bb->id }}</td>
                                <td scope="col">{{ $bb->nama_blok }}</td>
                                <td scope="col">{{ $bb->luas_tapak }}</td>
                                <td scope="col">{{ $bb->catatan }}</td>
                                <td scope="col">{{ $bb->jkrpataf612_id }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
