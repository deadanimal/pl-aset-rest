@extends('layouts.base') @section('content')
    <div class="container">
        <table class="table mt-4">
            <thead class="thead-light">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Perihal Barang</th>
                    <th scope="col">Unit Pengukuran</th>
                    <th scope="col">Kuantiti Dipesan</th>
                    <th scope="col">Kuantity do</th>
                    <th scope="col">Kuantity diterima</th>
                    <th scope="col">Harga Seunit</th>
                    <th scope="col">Jumlah Harga</th>
                    <th scope="col">Catatan</th>
                    <th scope="col">Tindakan</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($infokewps1 as $ik1)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $ik1->perihal_barang }}</td>
                        <td>{{ $ik1->unit_pengukuran }}</td>
                        <td>{{ $ik1->kuantiti_dipesan }}</td>
                        <td>{{ $ik1->kuantiti_do }}</td>
                        <td>{{ $ik1->kuantiti_diterima }}</td>
                        <td>{{ $ik1->harga_seunit }}</td>
                        <td>{{ $ik1->jumlah_harga }}</td>
                        <td>{{ $ik1->catatan }}</td>
                        <td>
                            <a href="/infokewps1/{{ $ik1->id }}"><i class="fas fa-pen"></i></a>
                            <a href=""><i class="fas fa-print"></i></a>
                            <a href="">
                                <form action="/infokewps1/{{ $ik1->id }}" class="d-inline" method="POST">
                                    @method('delete')
                                    @csrf
                                    <button class="btn-sm bg-white border-0" type="submit"> <span
                                            class=" fas fa-trash"></span></button>
                                </form>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <form method="POST" action="/kewps1/{{ $kewps1->id }}" enctype="multipart/form-data">
            @method('put')
            @csrf
            <div class="card mt-4" id="basic-info">
                <div class="card-header"
                    style="background-color: #2a2a72; background-image: linear-gradient(315deg, #2a2a72 0%, #009ffd 74%)                                                                                                                                                               ">
                    <h6 class="text-white">KEW.PS-1</h6>
                </div>
                </br>
                <div class="card-body pt-0">

                    <label for="">Nama Pembekal</label>
                    <div class="input-group">
                        <input class="form-control mb-3" type="text" name="nama_pembekal"
                            value="{{ old('nama_pembekal', $kewps1->nama_pembekal) }}">
                    </div>
                    <label for="">Alamat Pembekal</label>
                    <div class="input-group">
                        <input class="form-control mb-3" type="text" name="alamat_pembekal"
                            value="{{ old('alamat_pembekal', $kewps1->alamat_pembekal) }}">
                    </div>
                    <label for="">Jenis Penerimaan*</label>
                    <div class="input-group">
                        <input class="form-control mb-3" type="text" name="jenis_penerimaan"
                            value="{{ old('jenis_penerimaan', $kewps1->jenis_penerimaan) }}">
                    </div>
                    <label for="">No Rujukan PK</label>
                    <div class="input-group">
                        <input class="form-control mb-3" type="text" name="no_rujukan_pk"
                            value="{{ old('no_rujukan_pk', $kewps1->nombor_rujukan_pk) }}">
                    </div>
                    <label for="">Tarikh PK</label>
                    <div class="input-group">
                        <input class="form-control mb-3" type="date" name="tarikh_pk"
                            value="{{ old('tarikh_pk', $kewps1->tarikh_pk) }}">
                    </div>
                    <label for="">No Rujukan DO</label>
                    <div class="input-group">
                        <input class="form-control mb-3" type="text" name="no_rujukan_do"
                            value="{{ old('no_rujukan_do', $kewps1->nombor_do) }}">
                    </div>
                    <label for="">Tarikh DO</label>
                    <div class="input-group">
                        <input class="form-control mb-3" type="date" name="tarikh_do"
                            value="{{ old('tarikh_do', $kewps1->tarikh_do) }}">
                    </div>
                    <label for="">Maklumat Pengangkutan</label>
                    <div class="input-group">
                        <input class="form-control mb-3" type="text" name="maklumat_pengangkutan"
                            value="{{ old('maklumat_pengangkutan', $kewps1->maklumat_pengangkutan) }}">
                    </div>
                    <button class="btn btn-sm btn-primary" type="submit">Simpan</button>
                </div>
            </div>
        </form>
    </div>

@endsection
