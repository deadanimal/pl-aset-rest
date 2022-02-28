@extends('layouts.base_stor') @section('content')
    <style>
        #kewps13-table td {
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
                                <li class="breadcrumb-item"><a href="">kewps13</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid mt--6">
        <form method="POST" action="/kewps13">
            @csrf
            <div class="card mt-4">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <h2 class="mb-0">Laporan Verifikasi</h2>
                        </div>
                    </div>
                </div>

                </br>
                <div class="card-body pt-0">
                    <table class="table table-bordered text-center table-responsive mt-5" id="kewps13-table">
                        <thead>
                            <tr>
                                <th scope="col" rowspan="2">Select All
                                    <div>
                                        <input type="checkbox" id="check">
                                    </div>
                                </th>
                                <th scope="col" rowspan="2">KEMENTERIAN/ <br> JABATAN</th>
                                <th scope="col" rowspan="2">KATEGORI STOR</th>
                                <th scope="col" colspan="3">JUMLAH KUANTITI STOK</th>
                                <th scope="col" rowspan="2">PERATUSAN DIVERIFIKASI (%) (c) = [(b)/(a)]x100</th>
                                <th scope="col" colspan="6">JUMLAH STOK</th>
                            </tr>
                            <tr>
                                <th scope="col">KESELURUHAN (a)</th>
                                <th scope="col">DIVERIFIKASI (b)</th>
                                <th scope="col">TIDAK DIVERIFIKASI</th>
                                <th scope="col">A</th>
                                <th scope="col">B</th>
                                <th scope="col">C</th>
                                <th scope="col">D</th>
                                <th scope="col">E</th>
                                <th scope="col">F</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($infokewps10 as $ik10)
                                <input type="hidden" name="tahun[]" value="{{ $ik10->kewps10->tahun }}">
                                <input type="hidden" name="infokewps10_id[]" value="{{ $ik10->id }}">
                                <input type="hidden" name="kewps3a_id[]" value="{{ $ik10->kewps3a_id }}">
                                <tr>
                                    <td>
                                        <input type="checkbox" class="check-all" name="selected[]"
                                            value="{{ $loop->index }}">
                                    </td>
                                    <td>
                                        {{ $ik10->kewps10->kementerian }}
                                    </td>
                                    <td>
                                        {{ $ik10->kewps10->kategori_stor }}
                                    </td>
                                    <td>
                                        {{ $ik10->kewps3a->parasstok->first()->maksimum_stok }}
                                        <input type="hidden" name="jumlah_keseluruhan[]" class="form-control"
                                            value="{{ $ik10->kewps3a->parasstok->first()->maksimum_stok }}">
                                    </td>
                                    <td>
                                        {{ $ik10->kuantiti_fizikal_stok }}
                                        <input type="hidden" name="diverifikasi[]"
                                            value="{{ $ik10->kuantiti_fizikal_stok }}">
                                    </td>
                                    <td>
                                        {{ $ik10->kewps3a->parasstok->first()->maksimum_stok - $ik10->kuantiti_fizikal_stok }}
                                        <input type="hidden" name="stok_tidak_diverifikasi[]"
                                            value="{{ $ik10->kewps3a->parasstok->first()->maksimum_stok - $ik10->kuantiti_fizikal_stok }}">
                                    </td>
                                    <td>
                                        {{ number_format(($ik10->kuantiti_fizikal_stok / $ik10->kewps3a->parasstok->first()->maksimum_stok) * 100, 2) }}
                                        <input type="hidden" name="peratusan_diverifikasi[]"
                                            value="{{ ($ik10->kuantiti_fizikal_stok / $ik10->kewps3a->parasstok->first()->maksimum_stok) * 100 }}"
                                            class="form-control" step="0.01">
                                    </td>
                                    <td>
                                        <input type="number" name="jumlah_stok_A[]" value="" class=" form-control">
                                    </td>
                                    <td>
                                        <input type="number" name="jumlah_stok_B[]" value="" class=" form-control">
                                    </td>
                                    <td>
                                        <input type="number" name="jumlah_stok_C[]" value="" class=" form-control">
                                    </td>
                                    <td>
                                        <input type="number" name="jumlah_stok_D[]" value="" class=" form-control">
                                    </td>
                                    <td>
                                        <input type="number" name="jumlah_stok_E[]" value="" class=" form-control">
                                    </td>
                                    <td>
                                        <input type="number" name="jumlah_stok_F[]" value="" class=" form-control">
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                    <div class="text-right mt-3">
                        <button class="btn btn-primary" type="submit">Simpan</button>
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

        function status(index) {
            let status = $(".status-" + index);
            let approve = true;
            jQuery.each(status, function(key, val) {
                if (val.value == "") {
                    approve = false;
                }
            });

            if (approve) {
                let total = 0;
                jQuery.each(status, function(key, val) {
                    total += parseInt(val.value);
                });
                $("#keseluruhan-" + index).val(total);

                let verifikasi = $("#diverifikasi-" + index).val();

                console.log(verifikasi);
                let result = (parseInt(verifikasi) / total) * 100;

                $("#peratusan-" + index).val(result);

            }
        }
    </script>
@endsection
