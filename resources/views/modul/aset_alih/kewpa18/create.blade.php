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
                                <li class="breadcrumb-item"><a href="/kewpa18">Kewpa18</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <form method="POST" action="/kewpa18">
        @csrf
        <div class="card mt-4">
            <div class="card-header">
                <div class="row">
                    <div class="col">
                        <h2 class="mb-0">Tambah Laporan Pindahan Aset Alih</h2>
                    </div>
                </div>
            </div>

            </br>
            <div class="card-body pt-0">
                <div class="row">
                    <div class="col-6">
                        <label for="">Tahun</label>
                        <input class="form-control mb-3" type="text" name="tahun" value="" required id="k18_tahun"
                            autocomplete="off">
                    </div>
                </div>

                <a class="btn-sm btn btn-primary text-white" onclick="tambahAsetLaporanPindahan()">Tambah Aset</a>
                <button id="create_submit" class="btn-sm btn btn-primary" type="submit">Simpan</button>
            </div>
        </div>

        <div id="info_kewpa17_create">
            <div class="card mt-4">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <h2 class="mb-0">Tambah Info Laporan Pindahan</h2>
                        </div>
                        <div class="text-end mr-2">
                            <a class="align-self-end btn btn-sm btn-primary text-white"
                                onclick="$(this).closest('.card').remove()">Buang</a>
                        </div>
                    </div>
                </div>

                <div class="card-body pt-0">
                    <br>
                    <div class="row">
                        <div class="col-6">
                            <label for="">No Pindahan Aset Alih</label>
                            <div class="input-group">
                                <select name="kewpa17_id[]" class="form-control mb-3" required>
                                    <option selected>Pilih</option>
                                    @foreach ($kewpa17 as $k17)
                                        <option value="{{ $k17->id }}">{{ $k17->id }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <label for="">Agensi</label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="text" name="agensi[]" value="Perbadanan Aset Labuan"
                                    required>
                            </div>
                        </div>
                        <div class="col-4">
                            <label for="">Kuantiti Terimaan</label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="number" name="kuantiti_terimaan[]" value="" required>
                            </div>
                        </div>
                        <div class="col-4">
                            <label for="">Jumlah Perolehan Terimaan</label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="number" name="jumlah_perolehan_terimaan[]" value=""
                                    required>
                            </div>
                        </div>
                        <div class="col-4">
                            <label for="">Jumlah Nilai Semasa Terimaan</label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="text" name="jumlah_nilai_semasa_terimaan[]" value=""
                                    required>
                            </div>
                        </div>
                        <div class="col-4">
                            <label for="">Kuantiti Pengeluaran</label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="text" name="kuantiti_pengeluaran[]" value=""
                                    required>
                            </div>
                        </div>
                        <div class="col-4">
                            <label for="">Jumlah Perolehan Pengeluaran</label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="text" name="jumlah_perolehan_pengeluaran[]" value=""
                                    required>
                            </div>
                        </div>
                        <div class="col-4">
                            <label for="">Jumlah Nilai Semasa Pengeluaran</label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="text" name="jumlah_nilai_semasa_pengeluaran[]"
                                    value="" required>
                            </div>
                        </div>


                    </div>
                </div>

            </div>
        </div>
        </div>
    </form>

    </div>

    <script type="text/javascript">
        $("#k18_tahun").datepicker({
            format: "yyyy",
            viewMode: "years",
            minViewMode: "years",
            autoclose: true
        });

        function tambahAsetLaporanPindahan() {

            $("#info_kewpa17_create").append(`
            <div class="card mt-4">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <h2 class="mb-0">Tambah Info Laporan Pindahan</h2>
                        </div>
                        <div class="text-end mr-2">
                            <a class="align-self-end btn btn-sm btn-primary text-white"
                                onclick="$(this).closest('.card').remove()">Buang</a>
                        </div>
                    </div>
                </div>

                <div class="card-body pt-0">
                    <br>
                    <div class="row">
                        <div class="col-6">
                            <label for="">No Pindahan Aset Alih</label>
                            <div class="input-group">
                                <select name="kewpa17_id[]" class="form-control mb-3" required>
                                    <option selected>Pilih</option>
                                    @foreach ($kewpa17 as $k17)
                                        <option value="{{ $k17->id }}">{{ $k17->id }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <label for="">Agensi</label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="text" name="agensi[]" value="Perbadanan Aset Labuan"
                                    required>
                            </div>
                        </div>
                        <div class="col-4">
                            <label for="">Kuantiti Terimaan</label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="number" name="kuantiti_terimaan[]" value="" required>
                            </div>
                        </div>
                        <div class="col-4">
                            <label for="">Jumlah Perolehan Terimaan</label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="number" name="jumlah_perolehan_terimaan[]" value=""
                                    required>
                            </div>
                        </div>
                        <div class="col-4">
                            <label for="">Jumlah Nilai Semasa Terimaan</label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="text" name="jumlah_nilai_semasa_terimaan[]" value=""
                                    required>
                            </div>
                        </div>
                        <div class="col-4">
                            <label for="">Kuantiti Pengeluaran</label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="text" name="kuantiti_pengeluaran[]" value=""
                                    required>
                            </div>
                        </div>
                        <div class="col-4">
                            <label for="">Jumlah Perolehan Pengeluaran</label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="text" name="jumlah_perolehan_pengeluaran[]" value=""
                                    required>
                            </div>
                        </div>
                        <div class="col-4">
                            <label for="">Jumlah Nilai Semasa Pengeluaran</label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="text" name="jumlah_nilai_semasa_pengeluaran[]"
                                    value="" required>
                            </div>
                        </div>


                    </div>
                </div>

            </div>
            `);

            $("html, body").animate({
                scrollTop: $(document).height() - $(window).height()
            });
        }


        function deleteData(obj) {
            var id = obj.id;
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "/kewpa17/" + id,
                type: "DELETE",
                success: function() {
                    location.replace = "/kewpa17";;
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
