@extends('layouts.base_stor') @section('content')
    <style>
        #kewps10-table td {
            min-width: 150px;
            vertical-align: middle;
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
                                <li class="breadcrumb-item"><a href="/kewps10">kewps10</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid mt--6">
        <form method="POST" action="/kewps10">
            @csrf
            <div class="card mt-4">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <h2 class="mb-0">Verifikasi Stor</h2>
                        </div>
                    </div>
                </div>

                </br>
                <div class="card-body pt-0">
                    <div class="row">
                        <div class="col-3">
                            <label for="">Tahun</label>
                            <input type="number" name="tahun" class="form-control tahun" autocomplete="off"
                                value="{{ old('tahun') }}">
                        </div>
                        <div class="col-3">
                            <label for="">KEMENTERIAN</label>
                            <input type="text" name="kementerian" class="form-control"
                                value="{{ old('kementerian') ?? 'Perbadanan Aset Labuan' }}">
                        </div>
                        <div class="col-3">
                            <label for="">BAHAGIAN</label>
                            <select name="bahagian" class="form-control">
                                <option selected disabled hidden>Pilih</option>
                                @foreach ($bahagian as $b)
                                    <option {{ old('bahagian') == $b->nama_jabatan ? 'selected' : '' }}
                                        value="{{ $b->nama_jabatan }}">{{ $b->singkatan }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-3">
                            <label for="">KATEGORI STOR</label>
                            <select name="kategori_stor" class="form-control">
                                <option selected disabled hidden>Pilih</option>
                                <option {{ old('kategori_stor') == 'Stor Alat Ganti' ? 'selected' : '' }}
                                    value="Stor Alat Ganti">Stor Alat Ganti</option>
                                <option {{ old('kategori_stor') == 'Stor Bekalan Pejabat' ? 'selected' : '' }}
                                    value="Stor Bekalan Pejabat">
                                    Stor Bekalan Pejabat</option>
                            </select>
                        </div>
                        <input type="hidden" name="pegawai_verifikasi1" value="1">
                        <input type="hidden" name="pegawai_verifikasi2" value="1">
                        <input type="hidden" name="pegawai_aset" value="1">
                    </div>

                    <table class="table table-bordered text-center table-responsive mt-5" id="kewps10-table">
                        <thead>
                            <tr>
                                <th scope="col" rowspan="2">
                                    <label for="">Select all</label>
                                    <div>
                                        <input type="checkbox" id="check">
                                    </div>
                                </th>
                                <th scope="col" colspan="3">MAKLUMAT STOK DI KEWPS-3</th>
                                <th scope="col" colspan="2">KUANTITI STOK</th>
                                <th scope="col" colspan="6">STATUS STOK</th>
                                <th scope="col" rowspan="2">CATATAN</th>
                            </tr>
                            <tr>
                                <th scope="col">No. Kod</th>
                                <th scope="col">Perihal Stok</th>
                                <th scope="col">Kuantiti Stok</th>
                                <th scope="col">Fizikal Stok</th>
                                <th scope="col">Perbezaan <br> (+/-)</th>
                                <th scope="col">A <br> Usang</th>
                                <th scope="col">B <br> Rosak</th>
                                <th scope="col">C <br> Tidak Aktif</th>
                                <th scope="col">D <br> Tidak Diperlukan</th>
                                <th scope="col">E <br> Luput Tempoh</th>
                                <th scope="col">F <br> Hilang</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kewps4 as $kps4)
                                <tr>
                                    <td scope="row"><input type="checkbox" class="check-all" name="selected[]"
                                            value="{{ $loop->index }}">
                                    </td>
                                    <td>{{ $kps4->kewps3a->no_kad }}
                                        <input type="hidden" name="kewps3a_id[]" value="{{ $kps4->kewps3a->id }}">
                                        <input type="hidden" name="no_kad[]" value="{{ $kps4->kewps3a->no_kad }}">
                                    </td>
                                    <td>{{ $kps4->kewps3a->perihal_stok }}</td>
                                    <td>{{ $kps4->kewps3a->parasstok->first()->maksimum_stok }}
                                        <input type="hidden" name="maksimum_stok[]"
                                            value="{{ $kps4->kewps3a->parasstok->first()->maksimum_stok }}">
                                    </td>
                                    <td><input type="number" name="kuantiti_fizikal_stok[]" class="form-control"
                                            value="{{ old('kuantiti_fizikal_stok')[$loop->index] ?? '' }}"
                                            onkeyup="kf(this,{{ $kps4->kewps3a->parasstok->first()->maksimum_stok }},{{ $kps4->id }})"
                                            required>
                                    </td>
                                    <td><input type="number" name="kuantiti_perbezaan[]" class="form-control"
                                            id="kp-{{ $kps4->id }}"
                                            value="{{ old('kuantiti_perbezaan')[$loop->index] ?? '' }}" readonly
                                            required></td>
                                    <td>
                                        <input type="number" name="statusA[]" class="form-control"
                                            value="{{ old('statusA')[$loop->index] ?? '' }}" required>
                                    </td>
                                    <td>
                                        <input type="number" name="statusB[]" class="form-control"
                                            value="{{ old('statusB')[$loop->index] ?? '' }}" required>
                                    </td>
                                    <td>
                                        <input type="number" name="statusC[]" class="form-control"
                                            value="{{ old('statusC')[$loop->index] ?? '' }}" required>
                                    </td>
                                    <td>
                                        <input type="number" name="statusD[]" class="form-control"
                                            value="{{ old('statusD')[$loop->index] ?? '' }}" required>
                                    </td>
                                    <td>
                                        <input type="number" name="statusE[]" class="form-control"
                                            value="{{ old('statusE')[$loop->index] ?? '' }}" required>
                                    </td>
                                    <td>
                                        <input type="number" name="statusF[]" class="form-control"
                                            value="{{ old('statusF')[$loop->index] ?? '' }}" required>
                                    </td>
                                    <td>
                                        <input type="text" name="catatan[]"
                                            value="{{ old('catatan')[$loop->index] ?? '' }}" class="form-control">
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                    <div class="row">
                        <div class="col text-right mt-3">
                            <button class="btn btn-primary" type="submit">Simpan</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <script>
        $("#check").change(function() {
            if (this.checked) {
                $(".check-all").prop('checked', true);;
            } else {
                $(".check-all").prop('checked', false);;

            }
        });

        $(document).ready(function() {
            $("#k10_tahun").datepicker({
                format: "yyyy",
                viewMode: "years",
                minViewMode: "years",
                autoclose: true
            });
        });

        function kf(el, stok, id) {
            let val = el.value;
            let perbezaan = stok - val;
            let newid = "#kp-" + id
            $(newid).val(perbezaan);
        }
    </script>
@endsection
