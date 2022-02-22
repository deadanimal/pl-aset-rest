@extends('layouts.base_pa') @section('content')
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-white d-inline-block mb-0">Perbadanan Labuan</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="#"><i class="fas fa-file"></i></a></li>
                                <li class="breadcrumb-item"><a href="/plpk_pa_0201">plpk_pa 0201</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid mt--6">
        <div id="create">
            <form method="POST" action="/plpk_pa_0201" enctype="multipart/form-data">
                @csrf
                <div class="card mt-4" id="basic-info">
                    <div class="card-header">
                        <div class="row">
                            <div class="col">
                                <h2 class="mb-0">Tambah PLPK PA 0201</h2>
                            </div>
                        </div>
                    </div>

                    <br>
                    <div class="card-body pt-0">
                        <div class="row">
                            <div class="col-4">
                                <label for="">No Wo</label>
                                <div class="input-group">
                                    <input class="form-control mb-3" type="text" name="no_wo" value="" required>
                                </div>
                            </div>

                            <div class="col-4">
                                <label for="">Jabatan</label>
                                <select class="form-control mb-3" name="jabatan" required>
                                    <option value="" required required selected disabled hidden>Pilih No. Jabatan
                                    </option required>
                                    @foreach ($kod_jabatans as $jabatan)
                                        <option value="{{ $jabatan->nama_jabatan }}">
                                            {{ $jabatan->nama_jabatan }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-4">
                                <label for="">No Plet/Jenis Kenderaan</label>
                                <div class="input-group">
                                    <input class="form-control mb-3" type="text" name="plet_no_jenis_kenderaan" value=""
                                        required>
                                </div>
                            </div>

                            <div class="col-4">
                                <label for="">Pengguna Terakhir</label>
                                <div class="input-group">
                                    <select class="form-control mb-3" name="pengguna_terakhir" required>
                                        <option value="" required required selected disabled hidden>Pilih Pengguna Terakhir
                                        </option required>
                                        @foreach ($users as $user)
                                            <option value="{{ $user->id }}">
                                                {{ $user->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-4">
                                <label for="">Tarikh Rosak</label>
                                <div class="input-group">
                                    <input class="form-control mb-3" type="date" name="tarikh_rosak" value="" required>
                                </div>
                            </div>
                            <div class="col-4">
                                <label for="">Bil</label>
                                <div class="input-group">
                                    <input class="form-control mb-3" type="text" name="bil" value="" required>
                                </div>
                            </div>
                            <div class="col-4">
                                <label for="">Perihal Kerosakan</label>
                                <div class="input-group">
                                    <input class="form-control mb-3" type="text" name="perihal_rosak" value="" required>
                                </div>
                            </div>

                            @if (auth()->user()->role == "superadmin") 

                            <div class="col-4">
                                <label for="">Kos Penyelenggaraan Dahulu</label>
                                <div class="input-group">
                                    <input class="form-control mb-3" type="text" name="kos_penyelenggaraan_dulu" value=""
                                        required>
                                </div>
                            </div>
                            <div class="col-4">
                                <label for="">Anggaran Kos Penyelenggaraan</label>
                                <div class="input-group">
                                    <input class="form-control mb-3" type="text" name="anggaran_kos_penyelenggaraan"
                                        value="" required>
                                </div>
                            </div>
                            <div class="col-4">
                                <label for="">Syor Ulasan</label>
                                <div class="input-group">
                                    <input class="form-control mb-3" type="text" name="syor_ulasan" value="" required>
                                </div>
                            </div>
                            @endif
                            {{-- <div class="col-4">
                                <label for="">Tarikh Lulus Tak</label>
                                <div class="input-group">
                                    <input class="form-control mb-3" type="date" name="tarikh_lulus_tak" value="" required>
                                </div>
                            </div> --}}
                            @if (auth()->user()->role == "pemeriksa") 

                            <div class="col-4">
                                <label for="">Pembaikan Dalaman Luar</label>
                                <div class="input-group">
                                    <input class="form-control mb-3" type="text" name="pembaikan_dalaman_luar" value=""
                                        required>
                                </div>
                            </div>
                            <div class="col-4">
                                <label for="">Alat Ganti</label>
                                <div class="input-group">
                                    <input class="form-control mb-3" type="text" name="alatganti" value="" required>
                                </div>
                            </div>
                            @endif
                        </div>

                        <button class="btn btn-sm btn-primary" type="submit">Simpan</button>
                    </div>



                </div>
        </div>
        </form>
    </div>

    </div>


    <script type="text/javascript">
        $(document).ready(function() {
            initiateDatatable();

        })

        document.addEventListener("DOMContentLoaded", function() {
            tambahInfo();
        });

        function deleteData(obj) {
            var id = obj.id;
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "/plpk_pa_0201/" + id,
                type: "DELETE",
                success: function() {
                    location.replace = "/plpk_pa_0201";;
                }
            })
        }


        function initiateDatatable() {
            const dataTableBasic = new simpleDatatables.DataTable("#table", {
                searchable: true,
                fixedHeight: true,
                sortable: false
            });
        }
    </script>

@endsection
