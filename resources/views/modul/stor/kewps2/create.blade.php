@extends('layouts.base_stor') @section('content')
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-white d-inline-block mb-0">Perbadanan Labuan</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="#"><i class="fas fa-file"></i></a></li>
                                <li class="breadcrumb-item"><a href="">kewps1</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid mt--6">
        <form method="POST" action="/kewps2">
            @csrf
            <div class="card mt-4">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <h2 class="mb-0">Penentuan Kumpulan Stok</h2>
                        </div>
                    </div>
                </div>

                </br>
                <div class="card-body pt-0">

                    <div class="row">
                        <div class="col-6">
                            <label for="">Tindakan</label>
                            <div class="input-group">
                                <select name="tindakan" class="form-control mb-3">
                                    <option selected>Pilih...</option>
                                    <option value="Kuantiti Ditolak">Kuantiti Ditolak</option>
                                    <option value="Kuantiti Kurang">Kuantiti Kurang</option>
                                    <option value="Kuantiti Lebih">Kuantiti Lebih</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <label for="">Borang BTB</label>
                            <select class="form-control mb-4" name="kewps1_id" id="kewps2_select">
                                <option selected>Pilih</option>
                                @foreach ($kewps1 as $k1)
                                    <option value="{{ $k1->id }}">{{ $k1->id }} - {{ $k1->nama_pembekal }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div id="info_kewps2_create" class="row"></div>

                    <a id="button_aset_diperiksa" class="btn btn-sm btn-primary text-white"
                        onclick="tambahAsetDiperiksa()">Tambah Aset</a>

                    <hr>

                    <button class="btn btn-sm btn-primary" type="submit">Simpan</button>

                </div>
            </div>



        </form>
    </div>

    <script>
        function tambahAsetDiperiksa() {


            var str = `<div class="col-4">
                <label for="">Aset</label>
                <div class="input-group">
                    <select class="form-control infok1 mb-4" name="infokewps1_id[]" id="k2_infok1">
                        <option selected>Pilih</option>
                          
                    </select>
                </div>
            </div>
            <div class="col-4">
                <label for="">Kuantiti Ditolak</label>
                <div class="input-group">
                    <input class="form-control mb-3" type="text" name="kuantiti_ditolak[]" value="">
                </div>
            </div>
           
            <div class="col-4">
                <label for="">Sebab penolakan</label>
                <div class="input-group">
                    <input class="form-control mb-3" type="text" name="sebab_penolakan[]" value="">
                </div>
            </div>   `;

            $("#info_kewps2_create").append(str);

            var kps1_id = $("#kewps2_select").val();
            var op = " ";
            $.ajax({
                type: 'get',
                url: '{!! URL::to('/kewps2_dinamic') !!}',
                data: {
                    'id': kps1_id
                },
                success: function(data) {
                    for (var i = 0; i < data.length; i++) {
                        op += '<option value="' + data[i].id + '">' + data[i].no_kod + '</option>';
                    }
                    $('.infok1').html(" ");
                    $('.infok1').append(op);
                },
                error: function() {
                    console.log('success');
                },
            });
        }


        $("#kewps2_select").change(function() {
            var kps1_id = $("#kewps2_select").val();
            var op = " ";
            $.ajax({
                type: 'get',
                url: '{!! URL::to('/kewps2_dinamic') !!}',
                data: {
                    'id': kps1_id
                },
                success: function(data) {
                    for (var i = 0; i < data.length; i++) {
                        op += '<option value="' + data[i].id + '">' + data[i].no_kod + '</option>';
                    }
                    $('.infok1').html(" ");
                    $('.infok1').append(op);
                },
                error: function() {
                    console.log('success');
                },
            });

        });
    </script>


@endsection
