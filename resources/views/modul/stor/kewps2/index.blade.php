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
                                <li class="breadcrumb-item"><a href="">Kewps2</a></li>
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
                        <h2 class="mb-0">BORANG PENOLAKAN BARANG-BARANG (BPB)</h2>
                    </div>
                    <div class="text-end mr-2">
                        <a href="/kewps2/create"><button class="align-self-end btn btn-sm btn-primary">Tambah</button></a>
                    </div>
                </div>
            </div>


            <div class="table-responsive py-4">
                <table class="table table-custom-simplified table-flush" id="table">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">No Rujukan BPB</th>
                            <th scope="col">Nama Pembekal</th>
                            <th scope="col">Tindakan</th>
                            <th scope="col">Status</th>
                            <th scope="col">Tindakan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kewps2 as $k2)
                            <tr>
                                <td scope="col"> BPB/{{ sprintf("%'.07d", $k2->id) }}</td>
                                <td scope="col">{{ $k2->kewps1->nama_pembekal }}</td>
                                <td scope="col">{{ $k2->tindakan }}</td>

                                @if ($k2->status == 'DERAF')
                                    <td scope="col"><span class="badge bg-warning">{{ $k2->status }}</span></th>
                                    @elseif ($k2->status == 'HANTAR')
                                    <td scope="col"><span class="badge bg-primary">{{ $k2->status }}</span></th>
                                    @elseif ($k2->status == 'SOKONG')
                                    <td scope="col"><span class="badge bg-warning">{{ $k2->status }}</span></th>
                                    @elseif ($k2->status == 'LULUS')
                                    <td scope="col"><span class="badge bg-success">{{ $k2->status }}</span></th>
                                    @elseif ($k2->status == 'DITOLAK')
                                    <td scope="col"><span class="badge bg-danger">{{ $k2->status }}</span></th>
                                @endif

                                <td scope="col">
                                    @if ($k2->status == 'DERAF')
                                        <a href="/kewps2/{{ $k2->id }}/edit" class="btn btn-primary btn-sm"><span
                                                class="fas fa-arrow-up"></span></a>
                                        <a href="/kewps2/{{ $k2->id }}" class="btn btn-primary btn-sm"><i
                                                class="fas fa-pen"></i></a>
                                        <a href="">
                                            <form action="/kewps2/{{ $k2->id }}" class="d-inline"
                                                method="POST">
                                                @method('delete')
                                                @csrf
                                                <button class="btn btn-danger btn-sm" type="submit"> <i
                                                        class=" fas fa-trash"></i></button>
                                            </form>
                                        </a>
                                    @elseif($k2->status == 'LULUS')
                                        <a href="/kewps2pdf/{{ $k2->id }}" class="btn btn-success btn-sm"><i
                                                class="fas fa-print"></i></a>
                                        <a href="">
                                            <form action="/kewps2/{{ $k2->id }}" class="d-inline"
                                                method="POST">
                                                @method('delete')
                                                @csrf
                                                <button class="btn btn-danger btn-sm" type="submit"> <i
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
