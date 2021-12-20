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
                                <li class="breadcrumb-item"><a href="/kewpa15">kewpa15</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid mt--6">
        <div id="updateDiv">
            <form id="updateForm" action="/kewpa15/{{ $kewpa15->id }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card mt-4" id="basic-info">
                    <div class="card-header">
                        <div class="row">
                            <div class="col">
                                <h2 class="mb-0">Sunting Rekod Penyelenggaraan</h2>
                            </div>
                        </div>
                    </div>

                    <br>
                    <div class="card-body pt-0">
                        <div class="row">
                            <div class="col-4">
                                <label for="">No Siri Pendaftaran</label>
                                <div class="input-group">
                                    <select class="form-control mb-3" name="no_siri_pendaftaran" required>
                                        <option value="{{$kewpa15->no_siri_pendaftaran}}" selected disabled hidden>{{$kewpa15->no_siri_pendaftaran}}</option>
                                        @foreach ($kewpa3a as $k3)
                                        <option value="{{$k3->no_siri_pendaftaran}}">{{$k3->no_siri_pendaftaran}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-primary btn-sm" type="submit">Simpan</button>
                    </div>
            </form>
        </div>

        <div class="card mt-4">

            <div class="card-header">
                <div class="row">
                    <div class="col">
                        <h2 class="mb-0">Info Permohonan Pergerakan</h2>
                    </div>
                    <div class="text-end mr-2">
                        <a href="/info_kewpa15/create" class="align-self-end btn btn-sm btn-primary" id="tambah">Tambah</a>
                    </div>
                </div>
            </div>

            <div class="table-responsive py-4">

                <table class="table table-custom-simplified table-flush" id="table">
                    <thead class="thead-light">
                        <tr>

                            <th scope="col">Bil</th>
                            <th scope="col">Tarikh</th>
                            <th scope="col">Jenis Penyelenggaraan</th>
                            <th scope="col">Butir Kerja</th>
                            <th scope="col">Nama Syarikat</th>
                            <th scope="col">Kos</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kewpa15->info_kewpa15 as $kp15)
                            <tr>

                                <td scope="col">{{ $loop->index + 1 }}</td>
                                <td scope="col">{{ $kp15->tarikh }}</td>
                                <td scope="col">{{ $kp15->jenis_penyelenggaraan }}</td>
                                <td scope="col">{{ $kp15->butir_kerja }}</td>
                                <td scope="col">{{ $kp15->nama_syarikat }}</td>
                                <td scope="col">
                                    <a href="/info_kewpa15/{{ $kp15->id }}/edit"><i class="fas fa-pen"></i></a>

                                    <a href="" onclick="deleteData({{$kp15}})"><i class="fas fa-trash"></i></a>
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        function deleteData(obj) {
            var id = obj.id;
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "/info_kewpa15/" + id,
                type: "DELETE",
                success: function() {
                }
            })
        }
    </script>
@endsection
