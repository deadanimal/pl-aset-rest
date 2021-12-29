@extends('layouts.base_stor') @section('content')
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-white d-inline-block mb-0">Perbadanan Labuan</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="/kewps2">Kewps2</a></li>
                                <li class="breadcrumb-item"><a href="/kewps2/{{ $kewps2->id }}">Info kewps2</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid mt--6">
        <div class="card">
            <form method="POST" action="/kewps2/{{ $kewps2->id }}">
                @method('put')
                @csrf
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <h2 class="mb-0">Borang Penolakan Barang Barang (BPB)</h2>
                        </div>
                    </div>
                </div>

                <div class="card-body pt-0">
                    <div class="row mt-3">
                        <div class="col-4">
                            <label for="">ID Borang BTB</label>
                            <input type="text" name="kewps1_id" class="form-control" value="{{ $kewps2->kewps1_id }}"
                                readonly>
                        </div>
                        <div class="col-4">
                            <label for="">Nama Pembekal</label>
                            <input class="form-control mb-3" type="text" name="kewps1_id"
                                value="{{ $kewps2->kewps1->nama_pembekal }}" readonly>
                        </div>
                        <div class="col-4">
                            <label for="">Tindakan</label>
                            <select name="tindakan" class="form-control mb-3">
                                <option {{ $kewps2->tindakan == 'Kuantiti Ditolak' ? 'selected' : '' }}
                                    value="Kuantiti Ditolak">
                                    Kuantiti Ditolak</option>
                                <option {{ $kewps2->tindakan == 'Kuantiti Kurang' ? 'selected' : '' }}
                                    value="Kuantiti Kurang">Kuantiti Kurang</option>
                                <option {{ $kewps2->tindakan == 'Kuantiti Lebih' ? 'selected' : '' }}
                                    value="Kuantiti Lebih">Kuantiti Lebih</option>
                            </select>
                        </div>
                        <input type="hidden" name="status" value="DERAF">

                    </div>
                    <button class="btn btn-sm btn-primary" type="submit">Simpan</button>
                </div>
            </form>


        </div>

        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col">
                        <h2 class="mb-0 d-inline">Aset Kewps2</h2>
                        <button type="button" class=" ml-4 d-inline btn btn-primary btn-sm" data-toggle="modal"
                            data-target="#tambah_infokewps2Modal">
                            <span class="fas fa-plus"></span> Tambah
                        </button>

                    </div>
                </div>
            </div>
            <div class="card-body ">
                <table class="table">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">ID</th>
                            <th scope="col">Kuantiti Kurang Lebih</th>
                            <th scope="col">Kuantiti Ditolak</th>
                            <th scope="col">No Kod</th>
                            <th scope="col">Sebab Penolakan</th>
                            <th scope="col">Tindakan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kewps2->infokewps2 as $ik2)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $ik2->id }}</td>
                                <td>{{ $ik2->kuantiti_kurang_lebih }}</td>
                                <td>{{ $ik2->kuantiti_ditolak }}</td>
                                <td>{{ $ik2->infokewps1->no_kod }}</td>
                                <td>{{ $ik2->sebab_penolakan }}</td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-secondary m-0 border-0" data-toggle="modal"
                                        data-target="#Modal_infokewps2{{ $ik2->id }}">
                                        <span class="fas fa-pen"></span>
                                    </button>

                                    <form action="/infokewps2/{{ $ik2->id }}" class="d-inline" method="POST">
                                        @method('delete')
                                        @csrf
                                        <button class="btn-sm btn btn-secondary" type="submit"> <span
                                                class=" fas fa-trash"></span></button>
                                    </form>

                                </td>
                            </tr>

                            <div class="modal fade" id="Modal_infokewps2{{ $ik2->id }}" tabindex="-1"
                                role="dialog" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Info {{ $ik2->id }}
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="/infokewps2/{{ $ik2->id }}" method="POST">
                                                @method('put')
                                                @csrf
                                                <label for="">No Kod</label>
                                                <select class="form-control mb-4" name="infokewps1_id" id="k2editinfok1">
                                                    @foreach ($kewps2->kewps1->infokewps1 as $ik1)
                                                        <option {{ $ik1->id == $ik2->infokewps1_id ? 'selected' : '' }}
                                                            value="{{ $ik1->id }}"> {{ $ik1->no_kod }} </option>
                                                    @endforeach
                                                </select>
                                                <label for="">Kuantiti Ditolak</label>
                                                <div class="input-group">
                                                    <input class="form-control mb-3" type="number" name="kuantiti_ditolak"
                                                        value="{{ $ik2->kuantiti_ditolak }}">
                                                </div>
                                                <label for="">Kuantiti Kurang Lebih</label>
                                                <div class="input-group">
                                                    <input class="form-control mb-3" type="number"
                                                        name="kuantiti_kurang_lebih"
                                                        value="{{ $ik2->kuantiti_kurang_lebih }}" readonly>
                                                </div>
                                                <label for="">Sebab Penolakan</label>
                                                <div class="input-group">
                                                    <input class="form-control mb-3" type="text" name="sebab_penolakan"
                                                        value="{{ $ik2->sebab_penolakan }}">
                                                </div>

                                                <input class="form-control mb-3" type="hidden" name="kewps2_id"
                                                    value="{{ $ik2->kewps2_id }}">
                                        </div>
                                        <div class="modal-footer">
                                            <a class="btn btn-secondary" data-dismiss="modal">Tutup</a>
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>



        <div class="modal fade" id="tambah_infokewps2Modal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Infokewps2</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="/infokewps2" method="POST">
                        @csrf
                        <div class="modal-body">
                            <label for="">No Kod</label>
                            <select class="form-control mb-4" name="infokewps1_id">
                                @foreach ($kewps2->kewps1->infokewps1 as $ik1)
                                    @if (!in_array($ik1->id, $checkinfo1))
                                        <option value="{{ $ik1->id }}"> {{ $ik1->no_kod }} </option>
                                    @endif
                                @endforeach
                            </select>
                            <label for="">Kuantiti Ditolak</label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="number" name="kuantiti_ditolak" value="">
                            </div>
                            <label for="">Sebab Penolakan</label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="text" name="sebab_penolakan" value="">
                            </div>
                            <input class="form-control mb-3" type="hidden" name="kewps2_id" value="{{ $kewps2->id }}">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


    </div>


@endsection
