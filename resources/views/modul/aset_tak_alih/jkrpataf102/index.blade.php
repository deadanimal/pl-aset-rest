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
                                <li class="breadcrumb-item"><a href="">Jkr.Pata.F10/2</a></li>
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
                        <h2 class="mb-0">Laporan Verifikasi Dan Perakuan Pelupusan</h2>
                    </div>
                    <div class="text-end mr-2">
                        <a href="/jkrpataf102/create"><button class="align-self-end btn btn-sm btn-primary"
                                id="tambah">Tambah</button></a>
                    </div>
                </div>
            </div>

            <div class="table-responsive py-4">
                <table class="table table-custom-simplified table-flush" id="table">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">No Rujukan</th>
                            <th scope="col">No Rujukan Laporan</th>
                            <th scope="col">Tahun Rujukan</th>
                            <th scope="col">Nama Aset</th>
                            <th scope="col">No Rujukan Kelulusan</th>
                            <th scope="col">Tindakan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($jkrpataf102 as $p102)
                            <tr>
                                <td scope="col">{{ $p102->id }}</td>
                                <td scope="col">{{ $p102->no_rujukan_laporan }}</td>
                                <td scope="col">{{ $p102->tahun_rujukan_laporan }}</td>
                                <td scope="col">{{ $p102->nama_aset }}</td>
                                <td scope="col">{{ $p102->no_rujukan_kelulusan }}</td>
                                <td scope="col">
                                    <a class="btn-sm bg-white border-0" href="/jkrpataf102/{{ $p102->id }}"><i
                                            class="fas fa-pen"></i></a>
                                    <a class="btn-sm bg-white border-0" href="/jkrpataf102pdf/{{ $p102->id }}"><i
                                            class="fas fa-print"></i></a>
                                    <form action="/jkrpataf102/{{ $p102->id }}" class="d-inline" method="POST">
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
