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
                                <li class="breadcrumb-item"><a href="">kewps16</a></li>
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
                        <h2 class="mb-0">Perakuan Ambil Alih</h2>
                    </div>
                    <div class="text-end mr-2">
                        <a href="/kewps16/create"><button class="align-self-end btn btn-sm btn-primary"
                                id="tambah">Tambah</button></a>
                    </div>
                </div>
            </div>

            <div class="table-responsive py-4">
                <table class="table table-custom-simplified table-flush" id="table">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama Stor</th>
                            <th scope="col">Ulasan Ketua Jabatan</th>
                            <th scope="col">Tindakan Ketua Jabatan</th>
                            <th scope="col">Bilangan Aset</th>
                            <th scope="col">Tindakan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kewps16 as $k16)
                            <tr>
                                <td scope="col">{{ $loop->iteration }}</td>
                                <td scope="col">{{ $k16->infokewps16[0]->kewps3a->nama_stor ?? 'Telah Dipadam' }}</td>
                                <td scope="col">{{ $k16->ulasan }}</td>
                                <td scope="col">{{ $k16->tindakan }}</td>
                                <td scope="col">{{ count($k16->infokewps16) }}</td>
                                <td scope="col">
                                    <a href="/kewps16/{{ $k16->id }}"><i class="fas fa-pen"></i></a>
                                    <a href="">
                                        <form action="/kewps16/{{ $k16->id }}" class="d-inline" method="POST">
                                            @method('delete')
                                            @csrf
                                            <button class="btn-sm bg-white border-0" type="submit"> <i
                                                    class=" fas fa-trash"></i></button>
                                        </form>
                                    </a>
                                    <a href="/kewps16pdf/{{ $k16->id }}"><i class="fas fa-print"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
@endsection
