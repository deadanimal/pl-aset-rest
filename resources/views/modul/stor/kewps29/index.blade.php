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
                                <li class="breadcrumb-item"><a href="">kewps29</a></li>
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
                        <h2 class="mb-0">Kenyataan Jual Lelong</h2>
                    </div>
                    <div class="text-end mr-2">
                        <a href="/kewps29/create"><button class="align-self-end btn btn-sm btn-primary"
                                id="tambah">Tambah</button></a>
                    </div>
                </div>
            </div>

            <div class="table-responsive py-4">
                <table class="table table-custom-simplified table-flush" id="table">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Tarikh</th>
                            <th scope="col">Masa</th>
                            <th scope="col">Tempat</th>
                            <th scope="col">Tindakan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kewps29 as $k29)
                            <tr>
                                <td scope="col">{{ $k29->id }}</td>
                                <td scope="col">{{ $k29->tarikh }}</td>
                                <td scope="col">{{ $k29->masa }}</td>
                                <td scope="col">{{ $k29->tempat }}</td>
                                <td scope="col">
                                    <a href="/kewps29/{{ $k29->id }}"><i class="fas fa-pen"></i></a>
                                    <a href="/kewps29pdf/{{ $k29->id }}"><i class="fas fa-print"></i></a>
                                    <a href="">
                                        <form action="/kewps29/{{ $k29->id }}" class="d-inline" method="POST">
                                            @method('delete')
                                            @csrf
                                            <button class="btn-sm bg-white border-0" type="submit"> <i
                                                    class=" fas fa-trash"></i></button>
                                        </form>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>

@endsection
