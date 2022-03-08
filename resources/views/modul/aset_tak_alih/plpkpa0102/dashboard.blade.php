@extends('layouts.base_ata') @section('content')
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-white d-inline-block mb-0">Perbadanan Labuan</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="/dashboard-jalan"><i class="fas fa-file"></i></a></li>
                                <li class="breadcrumb-item"><a href="/dashboard-jalan">Dashboard Aduan</a></li>
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
                        <h2 class="mb-0">Dashboard Aduan</h2>
                    </div>
                    <div class="text-end mr-2">
                        <a href="/jalan/create"><button class="align-self-end btn btn-sm btn-primary"
                                id="tambah">Cetak</button></a>
                    </div>
                </div>
            </div>

            <div class="table-responsive py-4">
                <table class="table table-custom-simplified table-flush" id="table">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">Bil</th>
                            <th scope="col">No Arahan Kerja</th>
                            <th scope="col">Tarikh Arahan Kerja</th>
                            <th scope="col">Lokasi</th>
                            <th scope="col">Nama Kontraktor</th>
                            <th scope="col">Jumlah Aduan Semasa</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($plpkpa0102 as $pk)
                            <tr>
                                <td scope="col">{{ $loop->index + 1}}</td>
                                <td scope="col">{{ $pk->no_arahan_kerja }}</td>
                                <td scope="col">{{ $pk->tarikh_pengesahan }}</td>
                                <td scope="col">{{ $pk->lokasi }}</td>
                                <td scope="col">{{ $pk->nama_penerima }}</td>
                                <td scope="col">{{ $total_count}}</td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
