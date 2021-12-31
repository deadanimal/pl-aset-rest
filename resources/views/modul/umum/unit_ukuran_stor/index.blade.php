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
                                <li class="breadcrumb-item"><a href="/unit_ukuran">Unit Ukuran Stor</a></li>
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
                            <h2 class="mb-0">Unit Ukuran Stor</h2>
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
                                <th scope="col">Unit Ukuran</th>
                                <th scope="col">Penerangan</th>
                                <th scope="col">Tindakan</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($unit as $u)
                                <tr>

                                    <td scope="col">{{ $loop->iteration }}</td>
                                    <td scope="col">{{ $u->unit_ukuran }}</td>
                                    <td scope="col">{{ $u->penerangan }}</td>
                                    <td scope="col">
                                        <a href="#" onclick="updateData({{ $u }})"><i
                                                class="fas fa-pen"></i></a>
                                        <a href="/unit_ukuran" onclick="deleteData({{ $u }})"><i
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
            <form method="POST" action="/unit_ukuran" enctype="multipart/form-data">
                @csrf
                <div class="card mt-4" id="basic-info">
                    <div class="card-header">
                        <div class="row">
                            <div class="col">
                                <h2 class="mb-0">Tambah Unit Ukuran Stor</h2>
                            </div>
                        </div>
                    </div>

                    </br>
                    <div class="card-body pt-0">
                        <div class="row">
                            <div class="col-6">
                                <label for="">Unit Ukuran</label>
                                <div class="input-group">
                                    <input class="form-control mb-3" type="text" name="unit_ukuran" value="">
                                </div>
                            </div>

                            <div class="col-6">
                                <label for="">Penerangan</label>
                                <div class="input-group">
                                    <input class="form-control mb-3" type="text" name="penerangan" value="">
                                </div>
                            </div>

                        </div>




                        <button class="btn-sm btn btn-primary" type="submit">Simpan</button>
                    </div>

                </div>
            </form>
        </div>

        <div id="updateDiv" style="display: none;">
            <form id="updateForm" method="POST" action="/unit_ukuran" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card mt-4" id="basic-info">
                    <div class="card-header">
                        <div class="row">
                            <div class="col">
                                <h2 class="mb-0">Kemaskini Unit Ukuran Stor</h2>
                            </div>
                        </div>
                    </div>

                    </br>
                    <div class="card-body pt-0">
                        <div class="row">
                            <div class="col-6">
                                <label for="">Unit Ukuran</label>
                                <div class="input-group">
                                    <input class="form-control mb-3" type="text" name="unit_ukuran" value="">
                                </div>
                            </div>

                            <div class="col-6">
                                <label for="">Penerangan</label>
                                <div class="input-group">
                                    <input class="form-control mb-3" type="text" name="penerangan" value="">
                                </div>
                            </div>
                            <div class="col-12">
                                <button class="btn-sm btn btn-primary" type="submit">Simpan</button>
                            </div>
                        </div>
                    </div>
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
            $("#info_unit_ukuran_form").hide();
            $("#button_tambah").hide();
        })

        $("#tambah").click(function() {
            $("#show").hide();
            $("#create").show();
        });

        function updateData(obj) {

            $("#show").hide();

            $("#updateForm input[name=unit_ukuran]").val(obj.unit_ukuran);
            $("#updateForm input[name=penerangan]").val(obj.penerangan);

            $("#updateForm action").val("/unit_ukuran/" + obj.id);
            $("#updateForm").attr('action', "/unit_ukuran/" + obj.id)

            $("#updateDiv").show();

        }


        function deleteData(obj) {
            var id = obj.id;
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "/unit_ukuran/" + id,
                type: "DELETE",
                success: function() {
                    location.replace = "/unit_ukuran";
                }
            })

        }
    </script>

@endsection
