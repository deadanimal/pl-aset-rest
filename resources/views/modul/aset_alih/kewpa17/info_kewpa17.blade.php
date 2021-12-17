@extends('layouts.base_pa') @section('content')
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-white d-inline-block mb-0">Perbadanan Labuan</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="/kewpa17">Kewpa17</a></li>
                                <li class="breadcrumb-item"><a href="/kewpa17/{{ $kewpa17->id }}">Info Kewpa17</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid mt--6">

        <div id="show">
            <form id="create_form" method="POST" action="/kewpa17/{{ $kewpa17->id }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card mt-4" id="basic-info">
                    <div class="card-header">
                        <div class="row">
                            <div class="col">
                                <h2 class="mb-0">Kewpa17</h2>
                            </div>
                        </div>
                    </div>

                    </br>
                    <div class="card-body pt-0">

                        <button id="create_submit" class="btn-sm btn btn-primary" type="submit">Simpan</button>
                    </div>
                </div>

                <div id="info_kewpa17_create"></div>
            </form>

            <div class="card mt-4">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <h2 class="mb-0">Info Kewpa17</h2>
                        </div>
                        <div class="text-end mr-2">
                            <button class="align-self-end btn btn-sm btn-primary" id="tambah">Tambah</button>
                        </div>
                    </div>
                </div>


                <div class="table-responsive py-4">

                    <table class="table table-custom-simplified table-flush" id="table">
                        <thead class="thead-light">
                            <tr>

                                <th scope="col">#</th>
                                <th scope="col">ID</th>
                                <th scope="col">No Siri Pendaftaran</th>
                                <th scope="col">Catatan</th>
                                <th scope="col">Tindakan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kewpa17->infokewpa17 as $info_kewpa17)
                                <tr>

                                    <td scope="col">{{ $loop->iteration }}</td>
                                    <td scope="col">{{ $info_kewpa17->id }}</td>
                                    <td scope="col">{{ $info_kewpa17->no_siri_pendaftaran }}</td>
                                    <td scope="col">{{ $info_kewpa17->catatan }}</td>
                                    <td scope="col">
                                        <a href="#" onclick="updateData({{ $info_kewpa17 }})"><i
                                                class="fas fa-pen"></i></a>
                                        <a href="/kewpa17/{{ $info_kewpa17->id }}"
                                            onclick="deleteData({{ $info_kewpa17 }})"><i class="fas fa-trash"></i></a>
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div id="create" style="display: none;">
            <form method="POST" action="/info_kewpa17" enctype="multipart/form-data">
                @csrf
                <div class="card mt-4" id="basic-info">

                    <div class="card-header">
                        <div class="row">
                            <div class="col">
                                <h2 class="mb-0">Info Pindahan Aset Alih</h2>
                            </div>
                            <div class="text-end mr-2">
                            </div>
                        </div>
                    </div>

                    </br>
                    <div class="card-body pt-0">
                        <div class="row">
                            <input type="hidden" name="no_permohonan_kewpa17" value="{{ $kewpa17->id }}">
                            <div class="col-4">
                                <label for="">Catatan</label>
                                <div class="input-group">
                                    <input class="form-control mb-3" type="text" name="catatan" value="" required>
                                </div>
                            </div>
                            <div class="col-4">
                                <label for="">No Siri Pendaftaran</label>
                                <div class="input-group">
                                    <select name="no_siri_pendaftaran" class="form-control mb-3" required>
                                        <option selected>Pilih</option>
                                        @foreach ($kewpa3a as $k3a)
                                            <option value="{{ $k3a->no_siri_pendaftaran }}">
                                                {{ $k3a->no_siri_pendaftaran }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-sm btn-primary" type="submit">Simpan</button>
                    </div>
                </div>
            </form>
        </div>

        <div id="updateDiv" style="display: none;">
            <form id="updateForm" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card mt-4" id="basic-info">
                    <div class="card-header">
                        <div class="row">
                            <div class="col">
                                <h2 class="mb-0">Info Pindahan Aset</h2>
                            </div>
                        </div>
                    </div>

                    </br>
                    <div class="card-body pt-0">
                        <div class="row">
                            <div class="col-4">
                                <label for="">Catatan</label>
                                <div class="input-group">
                                    <input class="form-control mb-3" type="text" name="catatan" value="" required>
                                </div>
                            </div>
                            <div class="col-4">
                                <label for="">No Siri Pendaftaran</label>
                                <div class="input-group">
                                    <select name="no_siri_pendaftaran" class="form-control mb-3" required>
                                        <option selected>Pilih</option>
                                        @foreach ($kewpa3a as $k3a)
                                            <option value="{{ $k3a->no_siri_pendaftaran }}">
                                                {{ $k3a->no_siri_pendaftaran }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-sm btn-primary" type="submit">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>



    <script type="text/javascript">
        $(document).ready(function() {
            initiateDatatable();
        })

        $("#tambah").click(function() {
            $("#show").hide();
            $("#create").show();
        });

        function updateData(obj) {

            $("#show").hide();

            $("#updateForm select[name=no_siri_pendaftaran]").val(obj.no_siri_pendaftaran);
            $("#updateForm input[name=catatan]").val(obj.catatan);
            $("#updateForm action").val("/info_kewpa17/" + obj.id);

            $("#updateForm").attr('action', "/info_kewpa17/" + obj.id);
            $("#updateDiv").show();

        }

        function deleteData(obj) {
            var id = obj.id;
            var k17id = obj.no_permohonan_kewpa17;
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "/info_kewpa17/" + id,
                type: "DELETE",
                success: function() {
                    location.replace = '"/kewpa17/" . k17id';
                }
            });
        }





        function initiateDatatable() {
            const dataTableBasic = new simpleDatatables.DataTable("#table", {
                searchable: true,
                ddfixedHeight: true,
                sortable: false
            });
        }
    </script>

@endsection
