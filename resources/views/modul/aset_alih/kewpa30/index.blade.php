@extends('layouts.base_pa') @section('content')
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-white d-inline-block mb-0">Perbadanan Labuan</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="#"><i class="fas fa-file"></i></a></li>
                                <li class="breadcrumb-item"><a href="/kewpa30">Kewpa30</a></li>
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
                        <h2 class="mb-0">Kenyataan Jualan Lelong Aset Alih</h2>
                    </div>
                    <div class="text-end mr-2">
                        <a href="/kewpa30/create"><button class="align-self-end btn btn-sm btn-primary">Tambah</button></a>
                    </div>
                </div>
            </div>

            <div class="table-responsive py-4">

                <table class="table table-custom-simplified table-flush" id="table">
                    <thead class="thead-light">
                        <tr>

                            <th scope="col">#</th>
                            <th scope="col">ID</th>
                            <th scope="col">Agensi</th>
                            <th scope="col">Tarikh</th>
                            <th scope="col">Masa</th>
                            <th scope="col">Tempat</th>
                            <th scope="col">Tarikh Mula</th>
                            <th scope="col">Tarikh Tamat</th>
                            <th scope="col">Tindakan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kewpa30 as $k30)
                            <tr>

                                <td scope="col">{{ $loop->iteration }}</td>
                                <td scope="col">{{ $k30->id }}</td>
                                <td scope="col">{{ $k30->agensi }}</td>
                                <td scope="col">{{ $k30->tarikh }}</td>
                                <td scope="col">{{ $k30->masa }}</td>
                                <td scope="col">{{ $k30->tempat }}</td>
                                <td scope="col">{{ $k30->tarikh_mula }}</td>
                                <td scope="col">{{ $k30->tarikh_tamat }}</td>
                                <td scope="col">
                                    <a href="/kewpa30/{{ $k30->id }}"><i class="fas fa-pen"></i></a>
                                    <a href="/kewpa30pdf/{{ $k30->id }}"><i class="fas fa-print"></i></a>
                                    <form action="/kewpa30/{{ $k30->id }}" method="post" class="d-inline-flex"
                                        id="delkewpa30">
                                        @csrf
                                        @method('DELETE')
                                        <a href="javascript:$('#delkewpa30').submit();"><i class="fas fa-trash"></i></a>
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
