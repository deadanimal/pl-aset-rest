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
                                <li class="breadcrumb-item"><a href="/kategori-stor">Kategori Stor</a></li>
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
                <ul class="nav nav-pills nav-fill">
                    <li class="nav-item">
                        <a class="nav-link {{ $r == 'atp' ? 'bg-primary' : '' }}" href="{{ route('atp.index') }}">
                            <p class="h3 mb-0 {{ $r == 'atp' ? 'text-white' : '' }}">
                                Alat Tulis Pejabat</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ $r == 'bap' ? 'bg-primary' : '' }}" href="{{ route('bap.index') }}">
                            <p class="h3 mb-0 {{ $r == 'bap' ? 'text-white' : '' }}">Bekalan Am Pejabat</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ $r == 'kss' ? 'bg-primary' : '' }}" href="{{ route('kss.index') }}">
                            <p class="h3 mb-0 {{ $r == 'kss' ? 'text-white' : '' }}">Kod Stor Sepusat</p>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="d-flex justify-content-end">
                <button class="btn btn-sm btn-primary mr-4 mt-3" onclick="tambah({{ json_encode($r) }})"> <i
                        class="fas fa-plus"></i>
                    Tambah</button>
            </div>

            <div class="card-body" id="show">
                <div class="table-responsive pb-4">
                    <table class="table table-custom-simplified table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">BIL</th>
                                <th scope="col">KATEGORI STOK</th>
                                <th scope="col">KO KOD</th>
                                <th scope="col">Tindakan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kategori as $k)
                                <tr>
                                    <td scope="col">{{ $loop->iteration }}</td>
                                    <td scope="col">{{ $k->nama_kategori }}</td>
                                    <td scope="col">{{ $k->ko_kod }}</td>
                                    <td scope="col">
                                        <button onclick="update({{ $k }})" class="btn btn-sm btn-primary"><i
                                                class="fas fa-pen"></i></button>
                                        <form action="{{ route($r . '.destroy', $k->id) }}" method="post"
                                            class="d-inline-flex">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-sm btn-danger">
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
            <div class="card-body" id="create" style="display: none;">
                <form action="{{ route($r . '.store') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-6">
                            <label for="">Kategori Stok</label>
                            <input type="text" class="form-control mb-3" name="nama_kategori">
                        </div>
                        <div class="col-6">
                            <label for="">No Kod</label>
                            <input type="number" class="form-control mb-3" name="ko_kod">
                        </div>
                        <input type="hidden" name="kategori_stok" id="kategori_stok">
                        <div class="col-12">
                            <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
                        </div>
                    </div>

                </form>
            </div>
            <div class="card-body" id="update" style="display: none;">
                <form action="" method="post">
                    {{-- {{ route($r . '.update') }} --}}
                    @method('put')
                    @csrf
                    <div class="row">
                        <div class="col-6">
                            <label for="">Kategori Stok</label>
                            <input type="text" class="form-control mb-3" name="nama_kategori">
                        </div>
                        <div class="col-6">
                            <label for="">No Kod</label>
                            <input type="number" class="form-control mb-3" name="ko_kod">
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>


    </div>

    <script>
        function tambah(data) {
            $("#show").hide();
            switch (data) {
                case "atp":
                    $("#kategori_stok").val("Alat Tulis Pejabat");
                    break;
                case "bap":
                    $("#kategori_stok").val("Bekalan Am Pejabat");
                    break;
                case "kss":
                    $("#kategori_stok").val("Kod Stor Sepusat");
                    break;
            }
            $("#create").show();
        }

        function update(data) {
            $("#show").hide();

            $("#update form input[name=nama_kategori]").val(data.nama_kategori);
            $("#update form input[name=ko_kod]").val(data.ko_kod);

            switch (data.kategori_stok) {
                case "Alat Tulis Pejabat":
                    $("#update form").attr('action', "/kategori-stor/alat-tulis-pejabat/" + data.id)
                    break;
                case "Bekalan Am Pejabat":
                    $("#update form").attr('action', "/kategori-stor/bekalan-am-pejabat/" + data.id)
                    break;
                case "Kod Stor Sepusat":
                    $("#update form").attr('action', "/kategori-stor/kod-stor-sepusat/" + data.id)
                    break;
            }

            $("#update").show();
        }
    </script>
@endsection
