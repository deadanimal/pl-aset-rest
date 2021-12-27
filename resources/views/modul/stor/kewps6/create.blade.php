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
                                <li class="breadcrumb-item"><a href="">kewps6</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid mt--6">
        <form method="POST" action="/kewps6">
            @csrf
            <div class="card mt-4">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <h2 class="mb-0">Senarai Stok Bertarikh Luput</h2>
                        </div>
                    </div>
                </div>

                </br>
                <div class="card-body pt-0">
                    <div class="row">
                        <input class="form-control form-control-sm" type="hidden" name="user_id"
                            value="{{ Auth::user()->id }}">

                        <div class="col-3">
                            <label for="">No Kod</label>
                            <select class="form-control mb-3" name="kewps3a_id" id="k6_k3a_id">
                                <option selected>Pilih</option>
                                @foreach ($kewps3a as $k3)
                                    <option value="{{ $k3->id }}">{{ $k3->no_kad }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-3">
                            <label for="">Agensi</label>
                            <input type="text" name="agensi" class="form-control mb-3" value="Perbadanan Labuan">
                        </div>
                        <div class="col-3">
                            <label for="">Kategori Stor</label>
                            <select name="kategori_stor" class="form-control mb-3" id="k6_nama_stor">
                                <option>Pilih</option>
                                <option value="Stor Alat Ganti">Stor Alat Ganti</option>
                                <option value="Stor Bekalan Pejabat">Stor Bekalan Pejabat</option>
                            </select>

                        </div>
                        <div class="col-3">
                            <label for="">Tarikh Luput</label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="date" name="tarikh_luput" value="">
                            </div>
                        </div>
                        <div class="col-4">
                            <label for="">Baki Stok 6 Bulan</label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="number" name="baki_stok_6bulan" value="">
                            </div>
                        </div>
                        <div class="col-4">
                            <label for="">Baki Stok 5 Bulan</label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="number" name="baki_stok_5bulan" value="">
                            </div>
                        </div>
                        <div class="col-4">
                            <label for="">Baki Stok 4 Bulan</label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="number" name="baki_stok_4bulan" value="">
                            </div>
                        </div>
                        <div class="col-4">
                            <label for="">Baki Stok 3 Bulan</label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="number" name="baki_stok_3bulan" value="">
                            </div>
                        </div>
                        <div class="col-4">
                            <label for="">Baki Stok 2 Bulan</label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="number" name="baki_stok_2bulan" value="">
                            </div>
                        </div>
                        <div class="col-4">
                            <label for="">Baki Stok 1 Bulan</label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="number" name="baki_stok_1bulan" value="">
                            </div>
                        </div>
                        <div class="col-12">
                            <label for="">Catatan</label>
                            <div class="input-group">
                                <textarea class="form-control mb-3" type="text" name="catatan" value=""></textarea>
                            </div>
                        </div>
                        <div class="col-12">
                            <button class="btn btn-primary" type="submit">Simpan</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <script>
        $("#k6_k3a_id").change(function() {
            var k6_k3a_id = this.value;
            $.ajax({
                type: 'get',
                url: '/kewps6_dinamic',
                data: {
                    'id': k6_k3a_id
                },
                success: function(data) {
                    $("#k6_nama_stor").val(data.nama_stor);
                },
                error: function() {
                    console.log('success');
                },
            });
        });
    </script>
@endsection
