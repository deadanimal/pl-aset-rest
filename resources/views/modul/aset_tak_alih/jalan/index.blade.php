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
                                <li class="breadcrumb-item"><a href="">Jalan</a></li>
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
                        <h2 class="mb-0">Jalan</h2>
                    </div>
                    <div class="text-end mr-2">
                        <a href="/jalan/create"><button class="align-self-end btn btn-sm btn-primary"
                                id="tambah">Tambah</button></a>
                    </div>
                </div>
            </div>

            <div class="table-responsive py-4">
                <table class="table table-custom-simplified table-flush" id="table">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">Bil</th>
                            <th scope="col">Nama Jalan</th>
                            <th scope="col">Tahun Daftar</th>
                            <th scope="col">Panjang Jalan(KM)</th>
                            <th scope="col">Tindakan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($jalan as $j)
                            <tr>
                                <td scope="col">{{ $loop->index + 1}}</td>
                                <td scope="col">{{ $j->nama_jalan }}</td>
                                <td scope="col">{{ $j->tahun_daftar }}</td>
                                <td scope="col">{{ $j->panjang_jalan }}</td>
                                <td scope="col">
                                    <a class="btn btn-sm bg-white border-0 mx-0" href="/jalan/{{ $j->id }}/edit"><i
                                            class="fas fa-pen"></i></a>
                                    
                                    <form action="/jalan/{{ $j->id }}" class="d-inline mx-0" method="POST">
                                        @method('delete')
                                        @csrf
                                        <button class="btn btn-sm bg-white border-0" type="submit"> <i
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
