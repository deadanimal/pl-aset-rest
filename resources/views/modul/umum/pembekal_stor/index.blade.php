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
                                <li class="breadcrumb-item"><a href="/pembekal_stor">Pembekal Stor</a></li>
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
                            <h2 class="mb-0">Pembekal Stor</h2>
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
                                <th scope="col">Nama</th>
                                <th scope="col">Alamat</th>
                                <th scope="col">No Fon</th>
                                <th scope="col">No Fax</th>
                                <th scope="col">Email</th>
                                <th scope="col">Tindakan</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pembekalstor as $ps)
                                <tr>

                                    <td scope="col">{{ $loop->iteration }}</td>
                                    <td scope="col">{{ $ps->nama }}</td>
                                    <td scope="col">{{ $ps->alamat }}</td>
                                    <td scope="col">{{ $ps->no_fon }}</td>
                                    <td scope="col">{{ $ps->no_fax }}</td>
                                    <td scope="col">{{ $ps->email }}</td>
                                    <td scope="col">
                                        <a onclick="updateData({{ $ps }})"><i class="fas fa-pen"></i></a>
                                        <a href="/pembekal_stor" onclick="deleteData({{ $ps }})"><i
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
            <form method="POST" action="/pembekal_stor" enctype="multipart/form-data">
                @csrf
                <div class="card mt-4" id="basic-info">
                    <div class="card-header">
                        <div class="row">
                            <div class="col">
                                <h2 class="mb-0">Tambah Pembekal Stor</h2>
                            </div>
                        </div>
                    </div>

                    </br>
                    <div class="card-body pt-0">
                        <div class="row">
                            <div class="col-4">
                                <label for="">Nama</label>
                                <div class="input-group">
                                    <input class="form-control mb-3" type="text" name="nama" value="">
                                </div>
                            </div>
                            <div class="col-4">
                                <label for="">Alamat</label>
                                <div class="input-group">
                                    <input class="form-control mb-3" type="text" name="alamat" value="">
                                </div>
                            </div>
                            <div class="col-4">
                                <label for="">No Fon</label>
                                <div class="input-group">
                                    <input class="form-control mb-3" type="text" name="no_fon" value="">
                                </div>
                            </div>
                            <div class="col-6">
                                <label for="">No Fax</label>
                                <div class="input-group">
                                    <input class="form-control mb-3" type="text" name="no_fax" value="">
                                </div>
                            </div>
                            <div class="col-6">
                                <label for="">Email</label>
                                <div class="input-group">
                                    <input class="form-control mb-3" type="text" name="email" value="">
                                </div>
                            </div>
                        </div>




                        <button class="btn-sm btn btn-primary" type="submit">Simpan</button>
                    </div>

                </div>
            </form>
        </div>

        <div id="updateDiv" style="display: none;">
            <form id="updateForm" method="POST" action="/pembekal_stor" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card mt-4" id="basic-info">
                    <div class="card-header">
                        <div class="row">
                            <div class="col">
                                <h2 class="mb-0">Kemaskini Pembekal Stor</h2>
                            </div>
                        </div>
                    </div>

                    </br>
                    <div class="card-body pt-0">
                        <div class="row">
                            <div class="col-4">
                                <label for="">Nama</label>
                                <div class="input-group">
                                    <input class="form-control mb-3" type="text" name="nama" value="">
                                </div>
                            </div>
                            <div class="col-4">
                                <label for="">Alamat</label>
                                <div class="input-group">
                                    <input class="form-control mb-3" type="text" name="alamat" value="">
                                </div>
                            </div>
                            <div class="col-4">
                                <label for="">No Fon</label>
                                <div class="input-group">
                                    <input class="form-control mb-3" type="text" name="no_fon" value="">
                                </div>
                            </div>
                            <div class="col-6">
                                <label for="">No Fax</label>
                                <div class="input-group">
                                    <input class="form-control mb-3" type="text" name="no_fax" value="">
                                </div>
                            </div>
                            <div class="col-6">
                                <label for="">Email</label>
                                <div class="input-group">
                                    <input class="form-control mb-3" type="text" name="email" value="">
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
            $("#info_pembekal_stor_form").hide();
            $("#button_tambah").hide();
        })

        $("#tambah").click(function() {
            $("#show").hide();
            $("#create").show();
        });

        function updateData(obj) {

            $("#show").hide();

            $("#updateForm input[name=nama]").val(obj.nama);
            $("#updateForm input[name=alamat]").val(obj.alamat);
            $("#updateForm input[name=no_fon]").val(obj.no_fon);
            $("#updateForm input[name=no_fax]").val(obj.no_fax);
            $("#updateForm input[name=email]").val(obj.email);

            $("#updateForm action").val("/pembekal_stor/" + obj.id);
            $("#updateForm").attr('action', "/pembekal_stor/" + obj.id)

            $("#updateDiv").show();

        }


        function deleteData(obj) {
            var id = obj.id;
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "/pembekal_stor/" + id,
                type: "DELETE",
                success: function() {
                    location.replace = "/pembekal_stor";
                }
            })

        }
    </script>

@endsection
