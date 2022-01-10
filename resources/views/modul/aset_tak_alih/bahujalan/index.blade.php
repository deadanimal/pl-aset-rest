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
                                <li class="breadcrumb-item"><a href="">BahuJalan</a></li>
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
                        <h2 class="mb-0">BahuJalan</h2>
                    </div>
                    <div class="text-end mr-2">
                        <a href="/bahujalan/create"><button class="align-self-end btn btn-sm btn-primary"
                                id="tambah">Tambah</button></a>
                    </div>
                </div>
            </div>

            <div class="table-responsive py-4">
                <table class="table table-custom-simplified table-flush" id="table">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Lebar Bahu</th>
                            <th scope="col">Jenis Bahu</th>
                            <th scope="col">Jenis Longkang</th>
                            <th scope="col">Lebar Laluan</th>
                            <th scope="col">ID Jalan</th>
                            <th scope="col">Tindakan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($bahujalan as $j)
                            <tr>
                                <td scope="col">{{ $j->id }}</td>
                                <td scope="col">{{ $j->lebar_bahu }}</td>
                                <td scope="col">{{ $j->jenis_bahu }}</td>
                                <td scope="col">{{ $j->jenis_longkang }}</td>
                                <td scope="col">{{ $j->lebar_laluan }}</td>
                                <td scope="col">{{ $j->jalan_id }}</td>
                                <td scope="col">
                                    <a class="btn btn-sm bg-white border-0 mx-0"
                                        href="/bahujalan/{{ $j->id }}/edit"><i class="fas fa-pen"></i></a>
                                    <a class="btn btn-sm bg-white border-0 mx-0" href="/bahujalanpdf/{{ $j->id }}"><i
                                            class="fas fa-print"></i></a>
                                    <form action="/bahujalan/{{ $j->id }}" class="d-inline mx-0" method="POST">
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
