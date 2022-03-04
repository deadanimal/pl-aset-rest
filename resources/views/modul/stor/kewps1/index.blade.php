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
                                <li class="breadcrumb-item"><a href="">Kewps1</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid mt--6">
        <div id="show">
            <div class="card mt-4">

                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <h2 class="mb-0">Penerimaan Stok</h2>
                        </div>
                        <div class="text-end mr-2">
                            <a href="/kewps1/create"><button class="align-self-end btn btn-sm btn-primary"
                                    id="tambah">Tambah</button></a>
                        </div>
                    </div>
                </div>

                <div class="table-responsive py-4">
                    <table class="table table-custom-simplified table-flush" id="table">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">No Rujukan BTB</th>
                                <th scope="col">Nama Pembekal</th>
                                <th scope="col">Jenis Penerimaan</th>
                                <th scope="col">No Kod Dalam Aset</th>
                                <th scope="col">Status</th>
                                <th scope="col">Tindakan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kewps1 as $k1)
                                <tr>
                                    <td scope="col">{{ 'BTB/' . sprintf("%'.07d\n", $k1->id) }}</td>
                                    <td scope="col">{{ $k1->nama_pembekal }}</td>
                                    <td scope="col">{{ $k1->jenis_penerimaan }}</td>
                                    <td scope="col">
                                        @foreach ($k1->infokewps1 as $ik1)
                                            {{ $ik1->no_kod }}<br>
                                        @endforeach
                                    </td>

                                    @if ($k1->status == 'DERAF')
                                        <td scope="col"><span class="badge bg-warning">{{ $k1->status }}</span></th>
                                        @elseif ($k1->status == 'HANTAR')
                                        <td scope="col"><span class="badge bg-primary">{{ $k1->status }}</span></th>
                                        @elseif ($k1->status == 'SOKONG')
                                        <td scope="col"><span class="badge bg-warning">{{ $k1->status }}</span></th>
                                        @elseif ($k1->status == 'LULUS')
                                        <td scope="col"><span class="badge bg-success">{{ $k1->status }}</span></th>
                                        @elseif ($k1->status == 'DITOLAK')
                                        <td scope="col"><span class="badge bg-danger">{{ $k1->status }}</span></th>
                                        @elseif ($k1->status == 'DIBUANG')
                                        <td scope="col"><span class="badge bg-danger">{{ $k1->status }}</span></th>
                                    @endif

                                    @if ($k1->status == 'HANTAR')
                                        <td scope="col">
                                            <a href="/kewps1pdf/{{ $k1->id }}" class="btn btn-sm btn-success "><span
                                                    class="fas fa-print"></span></a>
                                            <a href="/kewps2fromk1/{{ $k1->id }}" class="btn btn-warning btn-sm">
                                                <span class="fas fa-minus"></span></a>
                                            <form action="/kewps1/{{ $k1->id }}" class="d-inline"
                                                method="POST">
                                                @method('delete')
                                                @csrf
                                                <button onclick="confirmDel(event,this)" class="btn btn-danger btn-sm"
                                                    type="submit"> <i class=" fas fa-trash"></i></button>
                                            </form>
                                        </td>
                                    @endif

                                    @if ($k1->status == 'DERAF')
                                        <td scope="col">
                                            @if (Auth::user()->jawatan == 'superadmin')
                                                <a href="/kewps1" onclick="updateStatus({{ $k1 }}, 'LULUS')"
                                                    class="btn btn-primary btn-sm"><i class="fas fa-check-circle"></i></a>
                                                <a href="/kewps1" onclick="updateStatus({{ $k1 }}, 'DITOLAK')"
                                                    class="btn btn-primary btn-sm"><i class="fas fa-times-circle"></i></a>
                                                <a href="" onclick="cetakPdf()" class="btn btn-success btn-sm"><i
                                                        class="fas fa-print"></i></a>
                                            @else
                                                <form action="/kewps1/{{ $k1->id }}/edit" class="d-inline mr-2"
                                                    method="GET">
                                                    @csrf
                                                    <button onclick="confirmSimpan(event,this)"
                                                        class="btn btn-primary btn-sm" type="submit">
                                                        <i class="fas fa-arrow-up"></i>
                                                    </button>
                                                </form>
                                                <a href="/kewps1/{{ $k1->id }}" class="btn btn-primary btn-sm "><i
                                                        class="fas fa-pen"></i></a>
                                                <form action="/kewps1/{{ $k1->id }}" class="d-inline"
                                                    method="POST" id="del">
                                                    @method('delete')
                                                    @csrf
                                                    <button onclick="confirmDel(event,this)" class="btn btn-danger btn-sm"
                                                        type="submit"> <i class=" fas fa-trash"></i></button>
                                                </form>
                                            @endif
                                        </td>
                                    @endif

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endsection
