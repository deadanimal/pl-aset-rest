@extends('layouts.base_umum') @section('content')
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-white d-inline-block mb-0">Perbadanan Labuan</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="#"><i class="fas fa-file"></i></a></li>
                                <li class="breadcrumb-item"><a href="/kod-stor">Kod Stor</a></li>
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
                            <h2 class="mb-0">Kod Stor</h2>
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

                                <th scope="col">Bil</th>
                                <th scope="col">Kod Stor</th>
                                <th scope="col">Kategori Stor</th>
                                <th scope="col">Penerangan</th>
                                <th scope="col">Tindakan</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kod_stor as $kod_stor)
                                <tr>

                                    <td scope="col">{{ $loop->index + 1 }}</td>
                                    <td scope="col">{{ $kod_stor->kod_stor }}</td>
                                    <td scope="col">{{ $kod_stor->kategori_stor }}</td>
                                    <td scope="col">{{ $kod_stor->penerangan }}</td>


                                    <td scope="col">
                                        <a href="#" onclick="updateData({{ $kod_stor }})"><i
                                                class="fas fa-pen"></i></a>
                                        <a href="/kod-stor" onclick="deleteData({{ $kod_stor }})"><i
                                                class="fas fa-trash"></i></a>
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div id="create" style="display: none;">
            <form method="POST" action="/kod-stor" enctype="multipart/form-data">
                @csrf
                <div class="card mt-4" id="basic-info">
                    <div class="card-header">
                        <div class="row">
                            <div class="col">
                                <h2 class="mb-0">Tambah Kod Stor</h2>
                            </div>
                        </div>
                    </div>

                    </br>
                    <div class="card-body pt-0">
                        <div class="row">

                            <div class="col-4">
                                <label for="">Kod Stor</label>
                                <div class="input-group">
                                    <input class="form-control mb-3" type="text" name="kod_stor" value="">
                                </div>
                            </div>

                            <div class="col-4">
                                <label for="">Kategori Stor</label>
                                <div class="input-group">
                                    <input class="form-control mb-3" type="text" name="kategori_stor" value="">
                                </div>
                            </div>


                            <div class="col-4">
                                <label for="">Penerangan</label>
                                <div class="input-group">
                                    <input class="form-control mb-3" type="text" name="penerangan" value="">
                                </div>
                            </div>
                        </div>


                        <div id="info_kod-stor_create"></div>

                        <button class="btn-sm btn btn-primary" type="submit">Simpan</button>
                    </div>

                </div>
            </form>
        </div>

        <div id="updateDiv" style="display: none;">
            <form id="updateForm" method="POST" action="/kod-stor" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card mt-4" id="basic-info">
                    <div class="card-header">
                        <div class="row">
                            <div class="col">
                                <h2 class="mb-0">Tambah Kod Aset</h2>
                            </div>
                        </div>
                    </div>

                    </br>
                    <div class="card-body pt-0">
                        <div class="row">

                          <div class="col-4">
                            <label for="">Kod Stor</label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="text" name="kod_stor" value="">
                            </div>
                        </div>

                        <div class="col-4">
                            <label for="">Kategori Stor</label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="text" name="kategori_stor" value="">
                            </div>
                        </div>


                        <div class="col-4">
                            <label for="">Penerangan</label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="text" name="penerangan" value="">
                            </div>
                        </div>
                        </div>


                        <div id="info_kod-stor_create"></div>

                        <button class="btn-sm btn btn-primary" type="submit">Simpan</button>
                    </div>

                </div>
        </div>
        </form>
    </div>
    </div>


    <script type="text/javascript">
        var no_kod = [];

        $(document).ready(function() {
            initiateDatatable();
            $("#info_kod-stor_form").hide();
            $("#button_tambah").hide();
        })

        $("#tambah").click(function() {
            $("#show").hide();
            $("#create").show();
        });

        function updateData(obj) {

            $("#show").hide();

            $("#updateForm input[name=kod_stor]").val(obj.kod_stor);
            $("#updateForm input[name=kategori_stor]").val(obj.kategori_stor);
            $("#updateForm input[name=penerangan]").val(obj.penerangan);

            $("#updateForm action").val("/kod-stor/" + obj.id);
            $("#updateForm").attr('action', "/kod-stor/" + obj.id)

            $("#updateDiv").show();

        }


        function deleteData(obj) {
            var id = obj.id;
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "/kod-stor/" + id,
                type: "DELETE",
                success: function() {
                    location.replace = "/kod-stor";;
                }
            })

        }


    </script>

@endsection
