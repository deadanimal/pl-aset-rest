@extends('layouts.base') @section('content')
    <div id="show">

        <div class="card mt-4">
            <div class="card-header text-end"
                style="background-color: #2a2a72; background-image: linear-gradient(315deg, #2a2a72 0%, #009ffd 74%)">
                <div class="row">
                    <div class="col text-start">
                        <h6 class="text-white">KEW.PS-1</h6>
                    </div>
                    <div class="col text-end">
                        <a href="/kewps1/create"> <button class="btn btn-sm btn-primary"><i
                                    class="fas fa-plus"></i></button>
                        </a>
                    </div>
                </div>
            </div>
            </br>

            <div class="card-body pt-0">

                <table class="table" id="table">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">Nama Pembekal</th>
                            <th scope="col">Maklumat Pengankutan</th>
                            <th scope="col">Jenis Penerimaan</th>
                            <th scope="col">Status</th>
                            <th scope="col">Tindakan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kewps1 as $k1)
                            <tr>
                                <td scope="col">{{ $k1->nama_pembekal }}</td>
                                <td scope="col">{{ $k1->jenis_penerimaan }}</td>
                                <td scope="col">{{ $k1->maklumat_pengangkutan }}</td>

                                @if ($k1->status == 'DERAF')
                                    <td scope="col"><span class="badge bg-warning">{{ $k1->status }}</span></th>
                                    @elseif ($k1->status=="HANTAR")
                                    <td scope="col"><span class="badge bg-primary">{{ $k1->status }}</span></th>
                                    @elseif ($k1->status=="SOKONG")
                                    <td scope="col"><span class="badge bg-warning">{{ $k1->status }}</span></th>
                                    @elseif ($k1->status=="LULUS")
                                    <td scope="col"><span class="badge bg-success">{{ $k1->status }}</span></th>
                                    @elseif ($k1->status=="DITOLAK")
                                    <td scope="col"><span class="badge bg-danger">{{ $k1->status }}</span></th>
                                @endif

                                @if ($k1->status == 'DERAF')
                                    <td scope="col">
                                        @if (Auth::user()->jawatan == 'superadmin')
                                            <a href="/kewps1" onclick="updateStatus({{ $k1 }}, 'LULUS')"><i
                                                    class="fas fa-check-circle"></i></a>
                                            <a href="/kewps1" onclick="updateStatus({{ $k1 }}, 'DITOLAK')"><i
                                                    class="fas fa-times-circle"></i></a>
                                            <a href="" onclick="cetakPdf()"><i class="fas fa-print"></i></a>

                                        @else
                                            <a href="">
                                                <form action="/kewps1/{{ $k1->id }}/edit" class="d-inline"
                                                    method="GET">
                                                    @csrf
                                                    <button class="btn-sm bg-white border-0" type="submit">
                                                        <i class="fas fa-arrow-up"></i>
                                                    </button>
                                                </form>
                                            </a>
                                            <a href="/kewps1/{{ $k1->id }}"><i class="fas fa-pen"></i></a>
                                            <a href="/kewps1pdf/{{ $k1->id }}"><i class="fas fa-print"></i></a>
                                            <a href="">
                                                <form action="/kewps1/{{ $k1->id }}" class="d-inline"
                                                    method="POST">
                                                    @method('delete')
                                                    @csrf
                                                    <button class="btn-sm bg-white border-0" type="submit"> <i
                                                            class=" fas fa-trash"></i></button>
                                                </form>
                                            </a>
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
