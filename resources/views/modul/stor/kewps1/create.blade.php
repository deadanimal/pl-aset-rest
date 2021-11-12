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

        <form method="POST" action="/kewps1" enctype="multipart/form-data">
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
                            value="@isset($m_nama_pembekal) {{ $m_nama_pembekal }} @endisset">
                    </div>
                    <label for="">Alamat Pembekal</label>
                    <div class="input-group">
                        <input class="form-control mb-3" type="text" name="alamat_pembekal"
                            value="@isset($m_alamat_pembekal) {{ $m_alamat_pembekal }} @endisset">
                    </div>
                    <label for="">Jenis Penerimaan*</label>
                    <div class="input-group">
                        <input class="form-control mb-3" type="text" name="jenis_penerimaan"
                            value="@isset($m_jenis_penerimaan) {{ $m_jenis_penerimaan }} @endisset">
                    </div>
                    <label for="">No Rujukan PK</label>
                    <div class="input-group">
                        <input class="form-control mb-3" type="text" name="nombor_rujukan_pk"
                            value="@isset($m_nombor_rujukan_pk) {{ $m_nombor_rujukan_pk }} @endisset">
                    </div>
                    <label for="">Tarikh PK</label>
                    <div class="input-group">
                        <input class="form-control mb-3" type="date" name="tarikh_pk"
                            value="@isset($m_tarikh_pk) {{ $m_tarikh_pk }} @endisset">
                    </div>
                    <label for="">No Rujukan DO</label>
                    <div class="input-group">
                        <input class="form-control mb-3" type="text" name="nombor_do"
                            value="@isset($m_nombor_do) {{ $m_nombor_do }} @endisset">
                    </div>
                    <label for="">Tarikh DO</label>
                    <div class="input-group">
                        <input class="form-control mb-3" type="date" name="tarikh_do"
                            value="@isset($m_tarikh_do) {{ $m_tarikh_do }} @endisset">
                    </div>
                    <label for="">Maklumat Pengangkutan</label>
                    <div class="input-group">
                        <input class="form-control mb-3" type="text" name="maklumat_pengangkutan"
                            value="@isset($m_maklumat_pengangkutan) {{ $m_maklumat_pengangkutan }} @endisset">
                    </div>
                    <button class="btn btn-sm btn-primary" type="submit">Simpan</button>
                    <button id="modalbtn" type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal"
                        data-bs-target="#AssetModal">
                        Tambah Aset
                    </button>
                </div>
            </div>
        </form>

        <div class="modal fade" id="AssetModal" tabindex="-1" role="dialog" aria-labelledby="asetModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="asetModalLabel">Aset</h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="POST" action="/infokewps1" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">

                            <div class="card mt-4" id="basic-info">
                                <div class="card-header"
                                    style="background-color: #2a2a72; background-image: linear-gradient(315deg, #2a2a72 0%, #009ffd 74%)                                                                                                                                                               ">
                                    <h6 class="text-white">Aset untuk KEW.PS-1</h6>
                                </div>
                                </br>
                                <div class="card-body pt-0">

                                    <label for="">Perihal Barang</label>
                                    <div class="input-group">
                                        <input class="form-control mb-3" type="text" name="perihal_barang"
                                            value="{{ old('perihal_barang') }}">
                                    </div>
                                    <label for="">Unit Pengukuran</label>
                                    <div class="input-group">
                                        <input class="form-control mb-3" type="text" name="unit_pengukuran" value="">
                                    </div>
                                    <label for="">Kuantiti Dipesan</label>
                                    <div class="input-group">
                                        <input class="form-control mb-3" type="integer" name="kuantiti_dipesan" value="">
                                    </div>
                                    <label for="">Kuantiti DO</label>
                                    <div class="input-group">
                                        <input class="form-control mb-3" type="integer" name="kuantiti_do" value="">
                                    </div>
                                    <label for="">Kuantiti Diterima</label>
                                    <div class="input-group">
                                        <input class="form-control mb-3" type="integer" name="kuantiti_diterima" value="">
                                    </div>
                                    <label for="">Harga Seunit</label>
                                    <div class="input-group">
                                        <input class="form-control mb-3" type="text" name="harga_seunit" value="">
                                    </div>
                                    <label for="">Jumlah Harga</label>
                                    <div class="input-group">
                                        <input class="form-control mb-3" type="text" name="jumlah_harga" value="">
                                    </div>
                                    <label for="">Catatan</label>
                                    <div class="input-group">
                                        <input class="form-control mb-3" type="text" name="catatan" value="">
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                        <input class="form-control mb-3" type="hidden" name="m_nama_pembekal" value="">
                        <input class="form-control mb-3" type="hidden" name="m_alamat_pembekal" value="">
                        <input class="form-control mb-3" type="hidden" name="m_jenis_penerimaan" value="">
                        <input class="form-control mb-3" type="hidden" name="m_nombor_rujukan_pk" value="">
                        <input class="form-control mb-3" type="hidden" name="m_tarikh_pk" value="">
                        <input class="form-control mb-3" type="hidden" name="m_nombor_do" value="">
                        <input class="form-control mb-3" type="hidden" name="m_tarikh_do" value="">
                        <input class="form-control mb-3" type="hidden" name="m_maklumat_pengangkutan" value="">
                    </form>
                </div>
            </div>
        </div>

        <script>

        </script>

    </div>

    <script>
        $(document).ready(function() {
            $('#modalbtn').click(function() {
                $("input[name=m_nama_pembekal]").val($("input[name=nama_pembekal]").val());
                $("input[name=m_alamat_pembekal]").val($("input[name=alamat_pembekal]").val());
                $("input[name=m_jenis_penerimaan]").val($("input[name=jenis_penerimaan]").val());
                $("input[name=m_nombor_rujukan_pk]").val($("input[name=nombor_rujukan_pk]").val());
                $("input[name=m_tarikh_pk]").val($("input[name=tarikh_pk]").val());
                $("input[name=m_nombor_do]").val($("input[name=nombor_do]").val());
                $("input[name=m_tarikh_do]").val($("input[name=tarikh_do]").val());
                $("input[name=m_maklumat_pengangkutan]").val($("input[name=maklumat_pengangkutan]").val());
            });
        });
    </script>


@endsection
