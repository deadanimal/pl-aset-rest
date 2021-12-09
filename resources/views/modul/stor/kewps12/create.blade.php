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
                                <li class="breadcrumb-item"><a href="">kewps12</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid mt--6">
        <form method="POST" action="/kewps12">
            @csrf
            <div class="card mt-4">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <h2 class="mb-0">Sijil Verifikasi</h2>
                        </div>
                    </div>
                </div>

                </br>
                <div class="card-body pt-0">
                    <div class="row">
                        <div class="col-6 mt-3">
                            <label for="">Kew.PS-10</label>
                            <select class="form-control mb-3" name="kewps10_id" id="k12_k10">
                                <option selected>Pilih</option>
                                @foreach ($kewps10 as $k10)
                                    <option value="{{ $k10->id }}">{{ $k10->id }} -
                                        {{ $k10->kementerian }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-6 mt-3">
                            <label for="">Kategori Stor</label>
                            <select name="kategori_stor" class="form-control" id="k12_kategori_stor">
                                <option selected>Pilih</option>
                                <option value="Stor Alat Ganti">Stor Alat Ganti</option>
                                <option value="Stor Bekalan Pejabat">Stor Bekalan Pejabat</option>
                            </select>
                        </div>
                        <div class="col-4 mt-3">
                            <label for="">Jabatan</label>
                            <div class="input-group">
                                <input class="form-control" type="text" name="jabatan" value="" id="k12_jabatan">
                            </div>
                        </div>
                        <div class="col-4 mt-3">
                            <label for="">Pelaksanaan Verifikasi</label>
                            <div class="input-group">
                                <input class="form-control" type="number" step="0.01" name="pelaksanaan_verifikasi"
                                    value="{{ old('pelaksanaan_verifikasi') }}">
                            </div>
                        </div>
                        <div class="col-4 mt-3">
                            <label for="">Prestasi Penilaian</label>
                            <div class="input-group">
                                <input class="form-control" type="number" step="0.01" name="prestasi_penilaian"
                                    value="{{ old('pelaksanaan_verifikasi') }}">
                            </div>
                        </div>

                        <input class="form-control" type="hidden" name="ketua_jabatan" value="{{ Auth::user()->id }}">

                    </div>
                    <div class=" mt-3">
                        <button class="btn btn-primary" type="submit">Simpan</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <script>
        $(document).ready(function() {
            $("#k12_k10").change(function() {
                var k12_k10 = this.value;
                $.ajax({
                    type: 'get',
                    url: '{!! URL::to('/kewps12_dinamic') !!}',
                    data: {
                        'id': k12_k10
                    },
                    success: function(data) {
                        $("#k12_jabatan").val(data.kementerian);
                        $("#k12_kategori_stor").val(data.kategori_stor);
                    },
                    error: function() {
                        console.log('success');
                    },
                });
            });
        });
    </script>
@endsection
