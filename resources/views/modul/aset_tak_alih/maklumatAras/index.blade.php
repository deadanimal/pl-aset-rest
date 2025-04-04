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
                                <li class="breadcrumb-item"><a href="/maklumat-aras-ruang">Maklumat Aras & Ruang</a></li>
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
                        <h2 class="mb-0">Maklumat Aras</h2>
                    </div>
                    <div class="text-end mr-2">
                        <a href="/maklumataras/create"><button class="align-self-end btn btn-sm btn-primary"
                                id="tambah">Tambah</button></a>
                    </div>
                </div>
            </div>

            <div class="table-responsive py-4">
                <table class="table table-custom-simplified table-flush" id="table">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Senarai Ruang Aras</th>
                            <th scope="col">Nama Ruang</th>
                            <th scope="col">Luas Ruang</th>
                            <th scope="col">Fungsi Ruang</th>
                            <th scope="col">ID Data Aset Khusus</th>
                            <th scope="col">Tindakan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($maklumatAras as $ma)
                            <tr>
                                <td scope="col">{{ $ma->id }}</td>
                                <td scope="col">{{ $ma->senarai_ruang_aras }}</td>
                                <td scope="col">{{ $ma->nama_ruang }}</td>
                                <td scope="col">{{ $ma->luas_ruang }}</td>
                                <td scope="col">{{ $ma->fungsi_ruang }}</td>
                                <td scope="col">{{ $ma->data_aset_khusus_id }}</td>
                                <td scope="col">
                                    <a class="btn-sm bg-white border-0" href="/maklumataras/{{ $ma->id }}"><i
                                            class="fas fa-pen"></i></a>
                                    <a class="btn-sm bg-white border-0"
                                        href="/dataasetkhususpdf/{{ $ma->data_aset_khusus_id }}"><i
                                            class="fas fa-print"></i></a>
                                    <form action="/maklumataras/{{ $ma->id }}" class="d-inline" method="POST">
                                        @method('delete')
                                        @csrf
                                        <button class="btn-sm bg-white border-0" type="submit"> <i
                                                class="fas fa-trash text-danger"></i></button>
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
