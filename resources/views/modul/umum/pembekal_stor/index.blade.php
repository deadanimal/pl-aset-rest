@extends('layouts.base_umum') @section('content')
    <style>
        a.nav-link.active>p.h3 {
            color: white;
        }

        a.nav-link.active.pill {
            background-color: rgb(0, 0, 98);
        }

    </style>

    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-white d-inline-block mb-0">Perbadanan Labuan</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="#"><i class="fas fa-file"></i></a></li>
                                <li class="breadcrumb-item"><a href="/pembekal-aset-stor">Pembekal Stor</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="container-fluid mt--6">
        <div class="card">
            <div class="card-header">
                <p class="h3">Pembekal Aset & Stor</p>
            </div>
            <div class="card-body">
                <div class="container">
                    <div class="row justify-content-center">
                        <ul class="nav nav-pills nav-fill mb-3 " id="pills-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active pill" id="pills-home-tab" data-toggle="pill" href="#pills-home"
                                    role="tab" aria-controls="pills-home" aria-selected="true">
                                    <p class="h3 mb-0">Pembekal Stor</p>
                                </a>
                            </li>
                            <li class=" nav-item">
                                <a class="nav-link pill" id="pills-profile-tab" data-toggle="pill" href="#pills-profile"
                                    role="tab" aria-controls="pills-profile" aria-selected="false">
                                    <p class="h3 mb-0">Pembekal Aset</p>
                                </a>
                            </li>
                        </ul>
                    </div>

                </div>
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade {{ $active == 'stor' ? 'show active' : '' }}" id="pills-home"
                        role="tabpanel" aria-labelledby="pills-home-tab">
                        <div id="show">
                            <div class="card mt-4">
                                <div class="card-header">
                                    <div class="row">
                                        <div class="col">
                                        </div>
                                        <div class="text-end mr-2">
                                            <button class="align-self-end btn btn-sm btn-primary"
                                                id="tambah">Tambah</button>
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
                                                        <a class="btn btn-sm btn-primary text-lighter"
                                                            onclick="updateData({{ $ps }})"><i
                                                                class="fas fa-pen"></i></a>
                                                        <a href="/pembekal_stor" class="btn btn-sm btn-danger text-lighter"
                                                            onclick="deleteData({{ $ps }})"><i
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
                            </form>
                        </div>
                    </div>
                    <div class="tab-pane fade {{ $active == 'aset' ? 'show active' : '' }}" id="pills-profile"
                        role="tabpanel" aria-labelledby="pills-profile-tab">
                        <div id="show2">
                            <div class="card mt-4">
                                <div class="card-header">
                                    <div class="row d-flex flex-row-reverse">
                                        <div class="col-1">
                                            <a class="btn btn-primary btn-sm text-white" id="tambah2">Tambah</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="table-responsive py-4">

                                    <table class="table table-custom-simplified table-flush" id="table">
                                        <thead class="thead-light">
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">ID Pembekal</th>
                                                <th scope="col">Syarikat</th>
                                                <th scope="col">E-mel</th>
                                                <th scope="col">Nama Pembekal</th>
                                                <th scope="col">Tindakan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($pembekalaset as $pa)
                                                <tr>
                                                    <td scope="col">{{ $loop->iteration }}</td>
                                                    <td scope="col">{{ $pa->id_pembekal }}</td>
                                                    <td scope="col">{{ $pa->syarikat }}</td>
                                                    <td scope="col">{{ $pa->emel }}</td>
                                                    <td scope="col">{{ $pa->nama_pembekal }}</td>
                                                    <td scope="col">
                                                        <a onclick="updateData2({{ $pa }})"
                                                            class="btn btn-sm btn-primary mr=0">
                                                            <i style="color: white" class="fas fa-pen"></i>
                                                        </a>
                                                        <form action="/pembekal-aset/{{ $pa->id }}" method="post"
                                                            class="d-inline-flex">
                                                            <button class="btn btn-danger btn-sm" type="submit">
                                                                <i class="fas fa-trash"></i>
                                                            </button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div id="create2" style="display: none;">
                            <form method="POST" action="/pembekal-aset">
                                @csrf
                                <div class="card mt-4" id="basic-info">
                                    <div class="card-header">
                                        <div class="row">
                                            <div class="col">
                                                <h2 class="mb-0">Tambah Pembekal Aset</h2>
                                            </div>
                                        </div>
                                    </div>

                                    </br>
                                    <div class="card-body pt-0">
                                        <div class="row">
                                            <div class="col-2">
                                                <p class="h3 fw-bold mb-0" for="">Syarikat</p>
                                            </div>
                                            <div class="col-4">
                                                <div class="custom-control custom-radio custom-control-inline">
                                                    <input type="radio" id="r_syarikat_create1" name="syarikat"
                                                        class="custom-control-input" value="KWP">
                                                    <label class="custom-control-label"
                                                        for="r_syarikat_create1">KWP</label>
                                                </div>
                                                <div class="custom-control custom-radio custom-control-inline">
                                                    <input type="radio" id="r_syarikat_create2" name="syarikat"
                                                        class="custom-control-input" value="KWM">
                                                    <label class="custom-control-label"
                                                        for="r_syarikat_create2">KWM</label>
                                                </div>
                                            </div>
                                            <div class="col-2">
                                                <p class="h3 fw-bold mb-0">Status</p>
                                            </div>
                                            <div class="col-4">
                                                <div class="custom-control custom-radio custom-control-inline">
                                                    <input type="radio" name="status" class="custom-control-input"
                                                        value="Aktif" id="aktif1">
                                                    <label class="custom-control-label" for="aktif1">Aktif</label>
                                                </div>
                                                <div class="custom-control custom-radio custom-control-inline">
                                                    <input type="radio" name="status" class="custom-control-input"
                                                        value="Tak Aktif" id="takaktif1">
                                                    <label class="custom-control-label" for="takaktif1">Tak Aktif</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mt-4">
                                            <div class="col-2">
                                                <p class="h3 fw-bold mt-2">ID Pembekal</p>
                                            </div>
                                            <div class="col-4">
                                                <input type="text" class="form-control mb-3" name="id_pembekal" value="">
                                            </div>
                                            <div class="col-2">
                                                <p class="h3 fw-bold mt-2">E-mel</p>
                                            </div>
                                            <div class="col-4">
                                                <input type="text" class="form-control mb-3" name="emel" value="">
                                            </div>

                                            <div class="col-2">
                                                <p class="h3 fw-bold mb-0 mt-2">Nama Pembekal</p>
                                            </div>
                                            <div class="col-10">
                                                <input type="text" class="form-control mb-3" name="nama_pembekal" value="">
                                            </div>

                                            <div class="col-2">
                                                <p class="h3 fw-bold mb-0 mt-2">Alamat Pembekal</p>
                                            </div>
                                            <div class="col-10">
                                                <input type="text" class="form-control mb-3" name="alamat_pembekal"
                                                    value="">
                                            </div>

                                            <div class="col-2">
                                                <p class="h3 fw-bold mb-0 mt-2">Bandar</p>
                                            </div>
                                            <div class="col-4">
                                                <input type="text" class="form-control mb-3" name="bandar" value="">
                                            </div>

                                            <div class="col-2">
                                                <p class="h3 fw-bold mb-0 mt-2">Negeri</p>
                                            </div>
                                            <div class="col-4">
                                                <input type="text" class="form-control mb-3" name="negeri" value="">
                                            </div>

                                            <div class="col-2">
                                                <p class="h3 fw-bold mb-0 mt-2">Poskod</p>
                                            </div>
                                            <div class="col-4">
                                                <input type="text" class="form-control mb-3" name="poskod" value="">
                                            </div>

                                            <div class="col-2">
                                                <p class="h3 fw-bold mb-0 mt-2">Negara</p>
                                            </div>
                                            <div class="col-4">
                                                <input type="text" class="form-control mb-3" name="negara" value="">
                                            </div>

                                            <div class="col-2">
                                                <p class="h3 fw-bold mb-0 ">No Telefon Pembekal</p>
                                            </div>
                                            <div class="col-4">
                                                <input type="text" class="form-control mb-3" name="no_telefon_pembekal"
                                                    value="">
                                            </div>

                                            <div class="col-2">
                                                <p class="h3 fw-bold mb-0 ">No Faks Pembekal</p>
                                            </div>
                                            <div class="col-4">
                                                <input type="text" class="form-control mb-3" name="no_faks_pembekal"
                                                    value="">
                                            </div>
                                        </div>

                                        <div class="col d-flex justify-content-end">
                                            <button class="btn btn-primary" type="submit">Simpan</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div id="updateDiv2" style="display: none;">
                            <form id="updateForm2" method="POST" action="/pembekal-aset">
                                @csrf
                                @method('PUT')
                                <div class="card mt-4" id="basic-info">
                                    <div class="card-header">
                                        <div class="row">
                                            <div class="col">
                                                <h2 class="mb-0">Kemaskini Pembekal Aset</h2>
                                            </div>
                                        </div>
                                    </div>

                                    </br>
                                    <div class="card-body pt-0">
                                        <div class="row">
                                            <div class="col-2">
                                                <p class="h3 fw-bold mb-0" for="">Syarikat</p>
                                            </div>
                                            <div class="col-4">
                                                <div class="custom-control custom-radio custom-control-inline">
                                                    <input type="radio" id="kwp" name="syarikat"
                                                        class="custom-control-input" value="KWP">
                                                    <label class="custom-control-label" for="kwp">KWP</label>
                                                </div>
                                                <div class="custom-control custom-radio custom-control-inline">
                                                    <input type="radio" id="kwm" name="syarikat"
                                                        class="custom-control-input" value="KWM">
                                                    <label class="custom-control-label" for="kwm">KWM</label>
                                                </div>
                                            </div>
                                            <div class="col-2">
                                                <p class="h3 fw-bold mb-0">Status</p>
                                            </div>
                                            <div class="col-4">
                                                <div class="custom-control custom-radio custom-control-inline">
                                                    <input type="radio" id="aktif" name="status"
                                                        class="custom-control-input" value="Aktif">
                                                    <label class="custom-control-label" for="aktif">Aktif</label>
                                                </div>
                                                <div class="custom-control custom-radio custom-control-inline">
                                                    <input type="radio" id="takaktif" name="status"
                                                        class="custom-control-input" value="Tak Aktif">
                                                    <label class="custom-control-label" for="takaktif">Tak Aktif</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mt-4">
                                            <div class="col-2">
                                                <p class="h3 fw-bold mt-2">ID Pembekal</p>
                                            </div>
                                            <div class="col-4">
                                                <input type="text" class="form-control mb-3" name="id_pembekal" value="">
                                            </div>
                                            <div class="col-2">
                                                <p class="h3 fw-bold mt-2">E-mel</p>
                                            </div>
                                            <div class="col-4">
                                                <input type="text" class="form-control mb-3" name="emel" value="">
                                            </div>

                                            <div class="col-2">
                                                <p class="h3 fw-bold mb-0 mt-2">Nama Pembekal</p>
                                            </div>
                                            <div class="col-10">
                                                <input type="text" class="form-control mb-3" name="nama_pembekal" value="">
                                            </div>

                                            <div class="col-2">
                                                <p class="h3 fw-bold mb-0 mt-2">Alamat Pembekal</p>
                                            </div>
                                            <div class="col-10">
                                                <input type="text" class="form-control mb-3" name="alamat_pembekal"
                                                    value="">
                                            </div>

                                            <div class="col-2">
                                                <p class="h3 fw-bold mb-0 mt-2">Bandar</p>
                                            </div>
                                            <div class="col-4">
                                                <input type="text" class="form-control mb-3" name="bandar" value="">
                                            </div>

                                            <div class="col-2">
                                                <p class="h3 fw-bold mb-0 mt-2">Negeri</p>
                                            </div>
                                            <div class="col-4">
                                                <input type="text" class="form-control mb-3" name="negeri" value="">
                                            </div>

                                            <div class="col-2">
                                                <p class="h3 fw-bold mb-0 mt-2">Poskod</p>
                                            </div>
                                            <div class="col-4">
                                                <input type="text" class="form-control mb-3" name="poskod" value="">
                                            </div>

                                            <div class="col-2">
                                                <p class="h3 fw-bold mb-0 mt-2">Negara</p>
                                            </div>
                                            <div class="col-4">
                                                <input type="text" class="form-control mb-3" name="negara" value="">
                                            </div>

                                            <div class="col-2">
                                                <p class="h3 fw-bold mb-0 ">No Telefon Pembekal</p>
                                            </div>
                                            <div class="col-4">
                                                <input type="text" class="form-control mb-3" name="no_telefon_pembekal"
                                                    value="">
                                            </div>

                                            <div class="col-2">
                                                <p class="h3 fw-bold mb-0 ">No Faks Pembekal</p>
                                            </div>
                                            <div class="col-4">
                                                <input type="text" class="form-control mb-3" name="no_faks_pembekal"
                                                    value="">
                                            </div>
                                        </div>

                                        <div class="col d-flex justify-content-end">
                                            <button class="btn btn-primary" type="submit">Simpan</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
    </div>



    <script type="text/javascript">
        var no_kod = [];


        $("#tambah").click(function() {
            $("#show").hide();
            $("#create").show();
        });

        $("#tambah2").click(function() {
            $("#show2").hide();
            $("#create2").show();
        });


        function updateData(obj) {
            $("#show2").hide();

            $("#updateForm2 input[name=nama]").val(obj.nama);
            $("#updateForm2 input[name=alamat]").val(obj.alamat);
            $("#updateForm2 input[name=no_fon]").val(obj.no_fon);
            $("#updateForm2 input[name=no_fax]").val(obj.no_fax);
            $("#updateForm2 input[name=emel]").val(obj.emel);

            $("#updateForm2 action").val("/pembekal-aset/" + obj.id);
            $("#updateForm2").attr('action', "/pembekal-aset/" + obj.id)

            $("#updateDiv").show();

        }

        function updateData2(obj) {
            $("#show2").hide();

            if (obj.syarikat == "KWP") {
                $("#kwp").prop("checked", true);
            } else if (obj.syarikat == "KWM") {
                $("#kwm").prop("checked", true);
            }

            if (obj.status == "Aktif") {
                $("#aktif").prop("checked", true);
            } else if (obj.status == "Tak Aktif") {
                $("#takaktif").prop("checked", true);
            }

            $("#updateForm2 input[name=id_pembekal]").val(obj.id_pembekal);
            $("#updateForm2 input[name=emel]").val(obj.emel);
            $("#updateForm2 input[name=nama_pembekal]").val(obj.nama_pembekal);
            $("#updateForm2 input[name=alamat_pembekal]").val(obj.alamat_pembekal);
            $("#updateForm2 input[name=bandar]").val(obj.bandar);
            $("#updateForm2 input[name=negeri]").val(obj.negeri);
            $("#updateForm2 input[name=poskod]").val(obj.poskod);
            $("#updateForm2 input[name=negara]").val(obj.negara);
            $("#updateForm2 input[name=no_telefon_pembekal]").val(obj.no_telefon_pembekal);
            $("#updateForm2 input[name=no_faks_pembekal]").val(obj.no_faks_pembekal);

            // $("#updateForm2 action").val("/pembekal-aset/" + obj.id);
            $("#updateForm2").attr('action', "/pembekal-aset/" + obj.id)

            $("#updateDiv2").show();


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
