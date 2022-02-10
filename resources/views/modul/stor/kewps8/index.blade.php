@extends('layouts.base_stor') @section('content')
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-white d-inline-block mb-0">Perbadanan Labuan</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="#"><i class="fas fa-file"></i></a></li>
                                <li class="breadcrumb-item"><a href="">kewps8</a></li>
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
                        <h2 class="mb-0">Borang Permohonan Stok (Individu Kepada Stor)</h2>
                    </div>
                    <div class="text-end mr-2">
                        <a href="/kewps8/create"><button class="align-self-end btn btn-sm btn-primary"
                                id="tambah">Tambah</button></a>
                    </div>
                </div>
            </div>

            <div class="table-responsive py-4">
                <table class="table table-custom-simplified table-flush" id="table">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Pemohon</th>
                            <th scope="col">Kuantiti Dipohon</th>
                            <th scope="col">Pelulus</th>
                            <th scope="col">Kuantiti Diluluskan</th>
                            <th scope="col">Status</th>
                            <th scope="col">Tindakan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kewps8 as $k8)
                            <tr>
                                <td scope="col">{{ $loop->iteration }}</td>
                                <td scope="col">{{ $k8->pemohon_id }}</td>
                                <td scope="col">{{ $k8->kuantiti_dimohon }}</td>
                                <td scope="col">{{ $k8->pelulus_id }}</td>
                                <td scope="col">{{ $k8->kuantiti_diluluskan }}</td>
                                @if ($k8->status == 'DIPOHON')
                                    <td scope="col"><span class="badge bg-warning">{{ $k8->status }}</span></th>
                                    @elseif ($k8->status == 'DITERIMA')
                                    <td scope="col"><span class="badge bg-primary">{{ $k8->status }}</span></th>
                                    @elseif ($k8->status == 'DILULUS')
                                    <td scope="col"><span class="badge bg-success">{{ $k8->status }}</span></th>
                                    @elseif ($k8->status == 'DITOLAK')
                                    <td scope="col"><span class="badge bg-danger">{{ $k8->status }}</span></th>
                                @endif
                                <td scope="col">
                                    @if ($k8->status == 'DIPOHON')
                                        <a href="/kewps8/{{ $k8->id }}/edit" class="btn btn-success btn-sm"><i
                                                class="fas fa-check-circle"></i></a>
                                        <a href="#" class="btn btn-danger btn-sm"><i class="fas fa-times-circle"></i></a>
                                    @endif
                                    @if ($k8->status == 'DILULUS')
                                        <a href="/kewps8/{{ $k8->id }}/edit" class="btn btn-success btn-sm"><i
                                                class="fas fa-check-circle"></i></a>
                                        <a href="#" class="btn btn-danger btn-sm"><i class="fas fa-times-circle"></i></a>
                                    @endif
                                    @if ($k8->status == 'DITERIMA')
                                        <a href="/kewps8/{{ $k8->id }}" class="btn btn-primary btn-sm"><i
                                                class="fas fa-pen"></i></a>
                                        <a href="">
                                            <form action="/kewps8/{{ $k8->id }}" class="d-inline"
                                                method="POST">
                                                @method('delete')
                                                @csrf
                                                <button class="btn btn-sm btn-danger" type="submit"> <i
                                                        class=" fas fa-trash"></i></button>
                                            </form>
                                        </a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <a class="btn btn-primary ml-3" href="/kewps8pdf">
                    Print <span class=" fas fa-print"></span></a>


            </div>
        </div>
    </div>
@endsection
