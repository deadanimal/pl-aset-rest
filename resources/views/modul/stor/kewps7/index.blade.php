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
                                <li class="breadcrumb-item"><a href="">kewps7</a></li>
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
                        <h2 class="mb-0">Borang Permohonan Stok (Antara Stor)</h2>
                    </div>
                    <div class="text-end mr-2">
                        <a href="/kewps7/create"><button class="align-self-end btn btn-sm btn-primary"
                                id="tambah">Tambah</button></a>
                    </div>
                </div>
            </div>

            <div class="table-responsive py-4">
                <table class="table table-custom-simplified table-flush" id="table">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nama Stor Pemesan</th>
                            <th scope="col">Nama Stor Pengeluar</th>
                            <th scope="col">Bilangan Aset</th>
                            <th scope="col">Status</th>
                            <th scope="col">Tindakan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kewps7 as $k7)
                            <tr>
                                <td scope="col">{{ $k7->id }}</td>
                                <td scope="col">{{ $k7->nama_stor_pemesan }}</td>
                                <td scope="col">{{ $k7->nama_stor_pengeluar }}</td>
                                <td scope="col">{{ count($k7->infokewps7) }}</td>
                                @if ($k7->status == 'DIPOHON')
                                    <td scope="col"><span class="badge bg-warning">{{ $k7->status }}</span></th>
                                    @elseif ($k7->status == 'DITERIMA')
                                    <td scope="col"><span class="badge bg-primary">{{ $k7->status }}</span></th>
                                    @elseif ($k7->status == 'DILULUS')
                                    <td scope="col"><span class="badge bg-success">{{ $k7->status }}</span></th>
                                    @elseif ($k7->status == 'SELESAI')
                                    <td scope="col"><span class="badge bg-success">{{ $k7->status }}</span></th>
                                    @elseif ($k7->status == 'DITOLAK')
                                    <td scope="col"><span class="badge bg-danger">{{ $k7->status }}</span></th>
                                @endif
                                <td scope="col">
                                    @if ($k7->status == 'DIPOHON')
                                        <a href="/kewps7/{{ $k7->id }}/edit" class="btn btn-sm btn-primary"><i
                                                class="fas fa-check-circle"></i></a>
                                        <a href="#" class="btn btn-sm btn-danger"><i class="fas fa-times-circle"></i></a>
                                    @endif

                                    @if ($k7->status == 'DILULUS')
                                        <a href="/kewps7/{{ $k7->id }}/edit" class="btn btn-sm btn-success"><i
                                                class="fas fa-check-circle"></i></a>
                                        <a href="#" class="btn btn-sm btn-danger"><i class="fas fa-times-circle"></i></a>
                                    @endif
                                    @if ($k7->status == 'DITERIMA')
                                        <a href="/kewps7/{{ $k7->id }}/edit" class="btn btn-sm btn-success"><i
                                                class="fas fa-check-circle"></i></a>
                                        <a href="#" class="btn btn-sm btn-danger"><i class="fas fa-times-circle"></i></a>
                                    @endif
                                    @if ($k7->status == 'SELESAI')
                                        <a href="/kewps7/{{ $k7->id }}" class="btn btn-sm btn-primary"><i
                                                class="fas fa-pen"></i></a>
                                        <a href="/kewps7pdf/{{ $k7->id }}" class="btn btn-sm btn-success"><i
                                                class="fas fa-print"></i></a>
                                        <a href="">
                                            <form action="/kewps7/{{ $k7->id }}" class="d-inline"
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

            </div>
        </div>
    </div>

@endsection
