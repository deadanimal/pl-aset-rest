@extends('layouts.base_stor') @section('content')
    <div class="container">
        <table class="table mt-4">
            <thead class="thead-light">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Kuantiti Ditolak</th>
                    <th scope="col">Aset</th>
                    <th scope="col">Sebab Penolakan</th>
                    <th scope="col">Tindakan</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($infokewps2 as $ik2)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $ik2->kuantiti_kurang_lebih }}</td>
                        <td>{{ $ik2->infokewps1->perihal_barang }}</td>
                        <td>{{ $ik2->sebab_penolakan }}</td>
                        <td>
                            <button id="infok2modalbtn{{ $loop->iteration }}" type="button"
                                class="d-inline btn btn-sm m-0 bg-white border-0" data-bs-toggle="modal"
                                data-bs-target="#infok2Modal{{ $loop->iteration }}"><span class="fas fa-pen"></span>
                            </button>
                            <form action="/infokewps2/{{ $ik2->id }}" class="d-inline" method="POST">
                                @method('delete')
                                @csrf
                                <button class="btn-sm bg-white border-0" type="submit"> <span
                                        class=" fas fa-trash"></span></button>
                            </form>

                        </td>
                    </tr>
                    <div class="modal fade" id="infok2Modal{{ $loop->iteration }}" tabindex="-1" role="dialog"
                        aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="asetModalLabel">Aset</h5>
                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form method="POST" action="/infokewps2/{{ $ik2->id }}" enctype="multipart/form-data">
                                    @method('PUT')
                                    @csrf
                                    <div class="modal-body">

                                        <div class="card mt-4" id="basic-info">
                                            <div class="card-header"
                                                style="background-color: #2a2a72; background-image: linear-gradient(315deg, #2a2a72 0%, #009ffd 74%)                                                                                                                                                               ">
                                                <h6 class="text-white">Aset untuk KEW.PS-2</h6>
                                            </div>
                                            </br>
                                            <div class="card-body pt-0">

                                                <label for="">Aset</label>
                                                <select class="form-select mb-4" name="infokewps1_id" id="k2editinfok1">
                                                    <option selected value="{{ $ik2->infokewps1->id }}">
                                                        {{ $ik2->infokewps1->perihal_barang }}
                                                    </option>
                                                    @foreach ($infokewps1 as $k1)
                                                        @if ($k1->id != $ik2->infokewps1->id)
                                                            <option value="{{ $k1->id }}">
                                                                {{ $k1->perihal_barang }}
                                                            </option>
                                                        @endif
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
                                                        value="{{ $ik2->kuantiti_kurang_lebih }}">
                                                </div>
                                                <label for="">Sebab Penolakan</label>
                                                <div class="input-group">
                                                    <input class="form-control mb-3" type="text" name="sebab_penolakan"
                                                        value="{{ $ik2->sebab_penolakan }}">
                                                </div>

                                                <input class="form-control mb-3" type="hidden" name="kewps2_id"
                                                    value="{{ $ik2->kewps2_id }}">
                                            </div>
                                        </div>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </tbody>
        </table>



        <form method="POST" action="/kewps2/{{ $kewps2->id }}" enctype="multipart/form-data">
            @method('put')
            @csrf
            <div class="card mt-4" id="basic-info">
                <div class="card-header"
                    style="background-color: #2a2a72; background-image: linear-gradient(315deg, #2a2a72 0%, #009ffd 74%)                                                                                                                                                               ">
                    <h6 class="text-white">KEW.PS-2</h6>
                </div>
                </br>
                <div class="card-body pt-0">
                    <label for="">Borang BTB</label>
                    {{-- <select class="form-select mb-4" name="kewps1_id" id="k2editk1">
                        <option selected value="{{ $kewps2->kewps1->id }}">
                            {{ $kewps2->kewps1->nama_pembekal }}
                        </option>
                        @foreach ($kewps1 as $k1)
                            @if ($k1->id != $kewps2->kewps1->id)
                                <option value="{{ $k1->id }}">{{ $k1->nama_pembekal }}
                                </option>
                            @endif
                        @endforeach
                    </select> --}}

                    <div class="input-group">
                        <input class="form-control mb-3" type="text" name="kewps1_id"
                            value="{{ $kewps2->kewps1->nama_pembekal }}" readonly>
                    </div>

                    <label for="">Tindakan</label>
                    <div class="input-group">
                        <input class="form-control mb-3" type="text" name="tindakan"
                            value="{{ old('tindakan', $kewps2->tindakan) }}">
                    </div>

                    <button class="btn btn-sm btn-primary" type="submit">Simpan</button>
                </div>
            </div>
        </form>
    </div>

    <script>
        $(document).ready(function() {

            $("#k2editk1").change(function() {
                var info1 = @json($infokewps1->toArray());

                $('#k2editinfok1')
                    .find('option')
                    .remove()
                    .end();

                info1.forEach(element => {
                    if (element.kewps1_id == this.value) {
                        $('#k2editinfok1').append($('<option>', {
                            value: element.id,
                            text: element.perihal_barang,
                        }));
                    }
                });

            });
        });
    </script>
@endsection
